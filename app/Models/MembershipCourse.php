<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\MembershipCourse
 *
 * @property int $id
 * @property int $courses_id Id del curso
 * @property int $memberships_id Id de la membresia
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse newQuery()
 * @method static \Illuminate\Database\Query\Builder|MembershipCourse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse whereCoursesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse whereMembershipsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MembershipCourse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MembershipCourse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MembershipCourse withoutTrashed()
 * @mixin \Eloquent
 */
class MembershipCourse extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable=[
        'memberships_id',
        'courses_id',
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

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

}
