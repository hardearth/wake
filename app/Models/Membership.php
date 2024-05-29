<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Membership
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $reseller Indica si esta membresia permite la reventa de los cursos
 * @property string $status Indica si el precio esta A= Activo o I= Inactivo
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MembershipCourse[] $membershipCourses
 * @property-read int|null $membership_courses_count
 * @method static \Illuminate\Database\Eloquent\Builder|Membership active()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Query\Builder|Membership onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereReseller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Membership withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Membership withoutTrashed()
 * @mixin \Eloquent
 */
class Membership extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        "name",
        "description",
        "reseller",
        "status",
        "created_user",
    ];


    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            if (\Auth::check()) {
                $item->created_user = \Auth::id();
            }
        });
    }

    public function getPriceAttribute()
    {
        $mp = MembershipPrice::where('status', 'A')
            ->where('memberships_id', $this->id)
            ->first();

        return $mp?->amount;
    }

    public function membershipCourses()
    {
        return $this->hasMany(MembershipCourse::class, 'memberships_id');
    }

    public function scopeActive($query)
    {
        $query->where('status', 'A');
    }
}
