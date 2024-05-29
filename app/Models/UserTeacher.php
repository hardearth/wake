<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserTeacher
 *
 * @property int $id
 * @property int $users_id Id del usuario
 * @property string|null $career Carrera
 * @property string|null $about_me Acerca del profesor
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $instagram
 * @property string|null $linkedin
 * @property string|null $tiktok
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereAboutMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereCareer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereTiktok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereUsersId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|UserTeacher onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeacher whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|UserTeacher withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserTeacher withoutTrashed()
 * @mixin \Eloquent
 */
class UserTeacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'career',
        'about_me',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'tiktok',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
