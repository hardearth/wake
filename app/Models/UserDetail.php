<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\UserDetail
 *
 * @property int $id
 * @property string $name Nombre de la persona
 * @property string $lastname Apellido de la persona
 * @property string $birth_date Fecha de nacimiento
 * @property int|null $countries_id Id del pais
 * @property string|null $phone_prefix Prefijo del teléfono
 * @property string|null $phone_number Numero de telefono
 * @property string|null $about_me Sobre mi
 * @property string|null $career Profesión
 * @property mixed|null $languages Idiomas que habla
 * @property string|null $web Pagina web
 * @property string|null $facebook Perfil de facebook
 * @property string|null $twitter Perfil de twitter
 * @property string|null $instagram Perfil instagram
 * @property string|null $linkedin Perfil de LinkedIn
 * @property int $users_id Id del usuario
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereAboutMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereCareer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereCountriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail wherePhonePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereWeb($value)
 * @property string|null $img_profile imagen de perfil
 * @property-read mixed $profile_src_image
 * @method static \Illuminate\Database\Query\Builder|UserDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereImgProfile($value)
 * @method static \Illuminate\Database\Query\Builder|UserDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserDetail withoutTrashed()
 * @mixin \Eloquent
 */
class UserDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'birth_date',
        'countries_id',
        'phone_prefix',
        'phone_number',
        'about_me',
        'career',
        'languages',
        'web',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->created_user = \Auth::id();
        });
    }

    public function getProfileSrcImageAttribute()
    {
        return asset('storage/profile/'.$this->img_profile);
    }
}
