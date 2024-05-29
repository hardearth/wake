<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $name Nombre del curso
 * @property string $description Descripción breve del curso
 * @property string $slug Texto con el cual se accedera públicamente al detalle del curso
 * @property string|null $image Imagen de portada del curso
 * @property string|null $video Imagen de portada del curso
 * @property string|null $language Idioma del curso es : español / en : ingles
 * @property string|null $level Nivel requerido B: Basico / I: Intermedio / A: Avanzado
 * @property mixed|null $categories Categorias del curso
 * @property int|null $free Es un curso gratuito
 * @property int $teacher_id Id del que hara de profesor
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $duration
 * @property-read mixed $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseModule[] $modules
 * @property-read int|null $modules_count
 * @property-read \App\Models\User $teacher
 * @method static \Database\Factories\CourseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static Builder|Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereVideo($value)
 * @method static Builder|Course withTrashed()
 * @method static Builder|Course withoutTrashed()
 * @property-read mixed $duration_label
 * @property-read mixed $course_src_image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseComment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseComment> $comments
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseComment> $comments
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseComment> $comments
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseComment> $comments
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseComment> $comments
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseFeedback> $course_feedback
 * @property-read int|null $course_feedback_count
 * @property-read mixed $list_categories
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseComment> $comments
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseFeedback> $course_feedback
 * @mixin \Eloquent
 */
class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'video',
        'language',
        'level',
        'categories',
        'free',
        'teacher_id',
        'slug',
        //        'start_date',
        //        'end_date'
    ];

    protected $casts = ['categories' => 'json'];


    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            if (Auth::check()) {
                $item->created_user = Auth::id();
                $item->slug = substr(md5(uniqid()), 0, 10);
            }
        });
    }

    public function lessons()
    {
        return Course::join('course_modules', 'course_modules.courses_id', 'courses.id')
            ->join('course_lessons', 'course_modules.id', 'course_lessons.course_modules_id')
            ->where('courses.id', $this->id)
            ->select('course_lessons.*')
            ->get();
    }

    public function getPriceAttribute()
    {
        $cp = CoursePrice::where('status', 'A')->where('courses_id', $this->id)->first();
        return $cp?->amount;
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function course_feedback()
    {
        return $this->hasMany(CourseFeedback::class);
    }

    public function modules()
    {
        return $this->hasMany(CourseModule::class, 'courses_id');
    }

    public function comments()
    {
        return $this->hasMany(CourseComment::class);
    }

    public function getCreatedUserAttribute($value)
    {

        return User::find($value);
    }

    public function getLevelAttribute($value)
    {

        $level = null;
        switch ($value) {
            case 'B':
                $level = __('Basico');
                break;

            case 'I':
                $level = __('Intermedio');
                break;

            case 'A':
                $level = __('Avanzado');
                break;
        }

        return $level;
    }

    public function getLanguageAttribute($value)
    {

        $language = null;
        switch ($value) {
            case 'ES':
                $language = __('Español');
                break;

            case 'EN':
                $language = __('Ingles');
                break;
        }

        return $language;
    }

    public function getDurationLabelAttribute()
    {
        $duration = $this->lessons()->sum('duration');
        return sprintf('%dh %dm', $duration / 3600, floor($duration / 60) % 60);
    }

    public function getCourseSrcImageAttribute()
    {
        return asset('storage/course/' . $this->id . '/' . $this->image);
    }

    public function showStatisticsRate()
    {
        $total_feedbacks = CourseFeedback::where('course_id', $this->id)->count();
        $arr = [];
        for ($i = 1; $i <= 5; $i++) {
            $count_rate = CourseFeedback::where('rate', $i)->where('course_id', $this->id)->count();
            if ($count_rate) {
                $percentage_rate = ($count_rate / $total_feedbacks) * 100;
                $arr[$i] = number_format($percentage_rate, 0);
            } else {
                $arr[$i] = 0;
            }
        }
        return $arr;
    }

    public function avgRating()
    {
        return number_format(CourseFeedback::where('course_id', $this->id)->avg('rate'), 1);
    }

    public function getListCategoriesAttribute()
    {
        return Category::whereIn('id', $this->categories)->get();
    }

    public function registered()
    {
        return $this->hasMany(CourseRegister::class, 'courses_id', 'id');
    }
}

