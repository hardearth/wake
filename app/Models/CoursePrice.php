<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CoursePrice
 *
 * @property int $id
 * @property float $amount
 * @property int $courses_id Id del curso
 * @property string $status Indica si el precio esta A= Activo o I= Inactivo
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice active()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice newQuery()
 * @method static \Illuminate\Database\Query\Builder|CoursePrice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereCoursesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePrice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|CoursePrice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CoursePrice withoutTrashed()
 * @mixin \Eloquent
 */
class CoursePrice extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'amount',
        'courses_id'
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
    public function scopeActive($query)
    {
        $query->where('status', 'A');
    }

    public function getCreatedUserAttribute($value)
    {

        return User::find($value);
    }
}
