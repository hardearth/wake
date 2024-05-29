<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\MembershipPrice
 *
 * @property int $id
 * @property float $amount Precio de la membresía
 * @property int $memberships_id Id de la membresia
 * @property string $status Indica si el precio esta A= Activo o I= Inactivo
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice active()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice newQuery()
 * @method static \Illuminate\Database\Query\Builder|MembershipPrice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice whereMembershipsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipPrice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MembershipPrice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MembershipPrice withoutTrashed()
 * @mixin \Eloquent
 */
class MembershipPrice extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'amount',
        'memberships_id'
    ];

    public function scopeActive($query)
    {
        $query->where('status', 'A');
    }
}
