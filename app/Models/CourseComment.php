<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CourseComment
 *
 * @property int $id
 * @property string $title
 * @property string $comment
 * @property int $course_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Course $course
 * @property-read string $date
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CourseCommentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseComment withoutTrashed()
 * @mixin \Eloquent
 */
class CourseComment extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = [
        'title',
        'comment',
        'course_id',
        'user_id',
    ];

    /**
     * Get the course associated with the comment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the user who made the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the date the comment was made.
     *
     * @return string
     */
    public function getDateAttribute()
    {
        return $this->created_at->format('F j, Y, g:i a');
    }

    /**
     * Get the comment title.
     *
     * @return string
     */
    public function getTitleAttribute()
    {
        return ucfirst($this->attributes['title']);
    }

    /**
     * Get the comment text.
     *
     * @return string
     */
    public function getCommentAttribute()
    {
        return ucfirst($this->attributes['comment']);
    }

    /**
     * Set the comment title.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    /**
     * Set the comment text.
     *
     * @param  string  $value
     * @return void
     */
    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = ucfirst($value);
    }
}
