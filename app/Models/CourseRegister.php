<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CourseRegister
 *
 * @property int $id
 * @property int $courses_id Id del usuario que creo el registro
 * @property int $users_id Id del usuario
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister newQuery()
 * @method static \Illuminate\Database\Query\Builder|CourseRegister onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereCoursesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|CourseRegister withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CourseRegister withoutTrashed()
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\User $created_by
 * @property-read \App\Models\User $user
 * @property int|null $user_bill_id Id del pago de la factura
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRegister whereUserBillId($value)
 * @mixin \Eloquent
 */
class CourseRegister extends Model
{
    protected $table='course_registered';
    use HasFactory, SoftDeletes;

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_user');
    }
}
