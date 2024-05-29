<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CourseLiveRegister
 *
 * @property int $id
 * @property int $course_live_id Id curso en vivo
 * @property int $users_id Id del usuario registrado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CourseLive $course_live
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister whereCourseLiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLiveRegister withoutTrashed()
 * @mixin \Eloquent
 */
class CourseLiveRegister extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'course_live_registered';

    protected $fillable = [
        'course_live_id',
        'users_id',
        'created_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function course_live(): BelongsTo
    {
        return $this->belongsTo(CourseLive::class);
    }


}
