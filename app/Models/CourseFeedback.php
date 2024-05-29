<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CourseFeedback
 *
 * @property int $id
 * @property int $rate
 * @property string $comments
 * @property int $course_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CourseFeedbackFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseFeedback withoutTrashed()
 * @mixin \Eloquent
 */
class CourseFeedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rate',
        'comments',
        'course_id',
        'user_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
