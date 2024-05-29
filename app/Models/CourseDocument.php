<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\CourseDocument
 *
 * @property int $id
 * @property string $name Nombre del documento
 * @property string|null $description Breve descripcion
 * @property string $path Ubicacion del archivo
 * @property string $type Tipo de archivo
 * @property int $course_lessons_id Id del modulo al que esta asociado la clase
 * @property int $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument newQuery()
 * @method static \Illuminate\Database\Query\Builder|CourseDocument onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereCourseLessonsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|CourseDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CourseDocument withoutTrashed()
 * @mixin \Eloquent
 */
class CourseDocument extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'path',
        'type',
        'course_lessons_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->created_user = \Auth::id();
        });
    }

    protected function getUrlDocumentAttribute()
    {
        return Storage::url(
            $this->path
        );
    }
}
