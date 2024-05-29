<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CourseModule;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\CourseLesson
 *
 * @property int $id
 * @property string $name Título de la clase
 * @property string $description Breve descripcion de la clase
 * @property int $duration Duración de la clase en segundos
 * @property string|null $url_video
 * @property int $course_modules_id Id del módulo al que está asociado la clase
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseDocument[] $documents
 * @property-read int|null $documents_count
 * @property-read CourseModule $module
 * @method static \Database\Factories\CourseLessonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson newQuery()
 * @method static \Illuminate\Database\Query\Builder|CourseLesson onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereCourseModulesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLesson whereUrlVideo($value)
 * @method static \Illuminate\Database\Query\Builder|CourseLesson withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CourseLesson withoutTrashed()
 * @property-read mixed $duration_label
 * @property-read \App\Models\Course|null $course
 * @property-read Collection $lesson_notes
 * @mixin \Eloquent
 */
class CourseLesson extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'hours',
        'course_modules_id',
        'url_video',
        'duration'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            if(\Auth::check()){
                $item->created_user = \Auth::id();
            }
        });
    }

    public function module()
    {
        return $this->belongsTo(CourseModule::class, 'course_modules_id');
    }

    public function course(): HasOneThrough
    {
        return $this->hasOneThrough(Course::class, CourseModule::class, 'id','id','course_modules_id','courses_id');
    }

    public function documents()
    {
        return $this->hasMany(CourseDocument::class,'course_lessons_id');
    }

    public function getLessonNotesAttribute(): Collection
    {
        return \Auth::user()->notes()->where('course_lesson_id',$this->id)->orderByDesc('created_at')->get();
    }

    public function getDurationLabelAttribute()
    {
        return sprintf('%dh %dm', $this->duration / 3600, floor($this->duration / 60) % 60);
    }

//    protected function getEncodeImgAttribute()
//    {
//        if ($this->image) {
//            $mime = Storage::mimeType($this->image);
//            return "data:$mime;base64," . base64_encode(file_get_contents($this->image));
//        }
//
//        return null;
//    }
}
