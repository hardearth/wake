<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ContractRole
 *
 * @property int $id
 * @property string $name Nombre del rol. Ejemplo: "Rol 1", "Rol 22", etc.
 * @property string $percentage Porcentaje asociado al rol. Ejemplo: 10.50 para 10.50%
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContractRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContractRole extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'percentage',
    ];

    // Si quieres agregar relaciones en este modelo, por ejemplo, con el modelo User, puedes hacerlo aquí.
    // Por ejemplo, si un rol puede estar asociado a muchos usuarios:

    public function users()
    {
        return $this->hasMany(User::class, 'contract_role_id', 'id');
    }
}
