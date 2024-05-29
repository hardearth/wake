<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\CourseLive
 *
 * @property int $id
 * @property int $teacher_id Id del que hara de profesor
 * @property string $title Titulo de clase en vivo
 * @property array|null $categories Categorias del curso
 * @property string $description Descripción de clase en vivo
 * @property string $url_video Url de video de introducción
 * @property string $url_meeting Url de meeting
 * @property \Illuminate\Support\Carbon $lesson_date_at Fecha de clase en vivo
 * @property string $slug Texto con el cual se accedera públicamente al detalle de la clase en vivo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $is_active
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseLiveRegister> $live_registered
 * @property-read int|null $live_registered_count
 * @property-read \App\Models\User $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereLessonDateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereUrlMeeting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive whereUrlVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseLive withoutTrashed()
 * @property-read mixed $is_register
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseLiveRegister> $live_registered
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseLiveRegister> $live_registered
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseLiveRegister> $live_registered
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseLiveRegister> $live_registered
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseLiveRegister> $live_registered
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseLiveRegister> $live_registered
 * @mixin \Eloquent
 */
class CourseLive extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'course_live';

    protected $fillable = [
        'teacher_id',
        'title',
        'description',
        'categories',
        'url_video',
        'url_meeting',
        'lesson_date_at'
    ];

    protected $casts = [
        'lesson_date_at' => 'datetime',
        'categories' => 'array'
    ];

    /**
     * Generate a new UUID for the model.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['slug'];
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function live_registered()
    {
        return $this->hasMany(CourseLiveRegister::class)->where('users_id', Auth::id());
    }

    public function getIsRegisterAttribute()
    {
        return $this->live_registered()->count();
    }

    public function in_live(): bool
    {
        $date_active_btn = $this->lesson_date_at->subHour();
        $now = Carbon::now();
        return $now >= $date_active_btn;
    }

    public function getCategories(): \Illuminate\Support\Collection
    {
        return Category::whereIn('id', $this->categories)->pluck('name');
    }

    public function course_registered_total(): int
    {
        return CourseLiveRegister::where('course_live_id',$this->id)->count();
    }


}
