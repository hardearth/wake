<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserNote
 *
 * @property int $id
 * @property int $user_id Usuario
 * @property int $course_lesson_id
 * @property string $note Nota de usuario
 * @property int $time_video Tiempo de video en el que se genero la nota
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CourseLesson $course_lesson
 * @property-read string $date_create
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereCourseLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereTimeVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserNote withoutTrashed()
 * @mixin \Eloquent
 */
class UserNote extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_lesson_id',
        'description',
        'time_video',
    ];

    public function course_lesson()
    {
        return $this->belongsTo(CourseLesson::class);
    }

    public function getDateCreateAttribute(): string
    {
        $date = new Carbon($this->created_at);
        return $date->diffForHumans();
    }

}
