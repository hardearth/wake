<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\CourseModule
 *
 * @property int $id
 * @property string $name Nombre del modulo
 * @property string $description Descripcion breve del contenido del modulo
 * @property int $courses_id Id del usuario que creo el registro
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Course $course
 * @property-read mixed $duration
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseLesson[] $lessons
 * @property-read int|null $lessons_count
 * @method static \Database\Factories\CourseModuleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule newQuery()
 * @method static \Illuminate\Database\Query\Builder|CourseModule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereCoursesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseModule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|CourseModule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CourseModule withoutTrashed()
 * @property-read mixed $duration_label
 * @mixin \Eloquent
 */
class CourseModule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "courses_id"
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

    public function lessons()
    {
        return $this->hasMany(CourseLesson::class, 'course_modules_id');
    }

    protected function getTotalLessonsAttribute()
    {
        return $this->lessons()->count();
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function getDurationLabelAttribute()
    {
        $duration = $this->lessons->sum('duration');

        return sprintf('%dh %dm', $duration / 3600, floor($duration / 60) % 60);
    }
//    protected function getEncodeImgAttribute()
//    {
//        /* ruta de images: /course/{id del curso}/{id del modulo}/img/file.jpg */
//        if ($this->image) {
//            $path = '/course/' . $this->course->id . '/' . $this->id . '/img/';
//            $mime = Storage::mimeType($path . $this->image);
//            $file=Storage::get($path . $this->image);
//            return "data:$mime;base64," . base64_encode($file);
//        }
//
//        return null;
//    }
}
