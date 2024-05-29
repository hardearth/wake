<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * App\Models\Activity
 *
 * @property int $id
 * @property string $name Nombre evento.
 * @property string $second_name Segundo nombre evento.
 * @property string $description Descripción.
 * @property string $date Fecha del evento.
 * @property string $banner_image Imagen banner evento.
 * @property string $featured_image Imagen destacada.
 * @property int $countries_id Id del pais
 * @property int $activity_categories_id Categoría del evento.
 * @property int $users_id Presentadores del evento.
 * @property int $created_users_id Usuario que creo el evento
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\ActivityCategory|null $category
 * @property-read \App\Models\User $created_user
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereActivityCategoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereBannerImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCountriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|Activity onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|Activity withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Activity withoutTrashed()
 * @method static \Database\Factories\ActivityFactory factory(...$parameters)
 * @property int $participants Cantidad de personas que pueden participar en el evento
 * @property array $presenters_id Presentadores del evento, ids de la tabla usuario
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityRegister> $registered
 * @property-read int|null $registered_count
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity wherePresentersId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityRegister> $registered
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityRegister> $registered
 * @mixin \Eloquent
 */
class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'date' => 'datetime',
        'presenters_id' => 'array'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'second_name',
        'description',
        'date',
        'banner_image',
        'featured_image',
        'activity_categories_id',
        'presenters_id',
        'users_id',
        'participants'
    ];


    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ActivityCategory::class,'activity_categories_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function created_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_users_id');
    }

    public function presenters()
    {
        $presenters = $this->presenters_id ?? [];
        return User::whereIn('id', $presenters)->get();
    }

    public function registered(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ActivityRegister::class);
    }
}
