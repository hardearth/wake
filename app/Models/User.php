<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $roles_id Role del usuario
 * @property int|null $referred_user_id
 * @property string|null $referred_url
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Collection<int, \App\Models\UserBill> $bills
 * @property-read int|null $bills_count
 * @property-read Collection<int, \App\Models\CourseLiveRegister> $course_live_register
 * @property-read int|null $course_live_register_count
 * @property-read Collection<int, \App\Models\CourseRegister> $course_registered
 * @property-read int|null $course_registered_count
 * @property-read \App\Models\UserDetail|null $detail
 * @property-read Collection<int, \App\Models\UserNote> $notes
 * @property-read int|null $notes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, User> $referred
 * @property-read int|null $referred_count
 * @property-read User|null $referred_user
 * @property-read \App\Models\Role $role
 * @property-read \App\Models\UserTeacher|null $teacher
 * @property-read Collection<int, \App\Models\Course> $teacher_courses
 * @property-read int|null $teacher_courses_count
 * @property-read Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferredUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferredUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRolesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property int|null $contract_roles_first_id
 * @property int|null $contract_roles_second_id
 * @property int|null $contract_roles_teacher_id
 * @property-read Collection<int, \App\Models\UserBill> $bills
 * @property-read \App\Models\ContractRole|null $contractRoleFirst
 * @property-read \App\Models\ContractRole|null $contractRoleSecond
 * @property-read \App\Models\ContractRole|null $contractRoleTeacher
 * @property-read Collection<int, \App\Models\CourseLiveRegister> $course_live_register
 * @property-read Collection<int, \App\Models\CourseRegister> $course_registered
 * @property-read Collection<int, \App\Models\UserNote> $notes
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read Collection<int, User> $referred
 * @property-read Collection<int, \App\Models\Course> $teacher_courses
 * @property-read Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read \App\Models\UserWallet|null $wallet
 * @method static \Illuminate\Database\Eloquent\Builder|User whereContractRolesFirstId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereContractRolesSecondId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereContractRolesTeacherId($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_id',
        'referred_user_id',
        'referred_url',
        'contract_roles_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function referred_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referred_user_id');
    }

    protected function roleName(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->role->name, set: fn($value) => $this->role->name,);
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class, 'users_id');
    }


    protected function avatarImg(): Attribute
    {
        return Attribute::make(get: function ($value) {
            $mime = Storage::mimeType($value);
            return "data:$mime;base64," . base64_encode(file_get_contents(Storage::path($value)));
        });
    }

    public function canImpersonate()
    {
        return in_array($this->roles_id, [1]);
    }

    public function canBeImpersonated()
    {
        return in_array($this->roles_id, [
            2,
            3,
            4
        ]);
    }

    public function teacher()
    {
        return $this->hasOne(UserTeacher::class, 'users_id');
    }

    public function teacher_courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function bills()
    {
        return $this->hasMany(UserBill::class, 'users_id')->where('status', 'A');
    }

    public function notes(): HasMany
    {
        return $this->hasMany(UserNote::class);
    }

    public function getNotesByLesson($lesson_id): Collection
    {
        return $this->notes()->where('course_lesson_id', $lesson_id)->orderByDesc('created_at')->get();
    }

    public function course_registered()
    {
        return $this->hasMany(CourseRegister::class, 'users_id');
    }

    public function course_memberships()
    {
        return $this->hasMany(Membership::class, 'users_id');
    }

    public function courses()
    {
        $courses = $this->course_registered;

        return Course::whereIn('id', $courses->pluck('courses_id'))->get();
    }

    public function course_live_register(): HasMany
    {
        return $this->hasMany(CourseLiveRegister::class, 'users_id')->has('course_live');
    }

    public function getUrlReferred(): string
    {
        if (!$this->referred_url) {
            $this->referred_url = \Str::random(32);
            $this->save();
        }

        return $this->referred_url;
    }

    public function canManageBinshopsBlogPosts()
    {
        if ($this->id === 1 && $this->email === "admin@local.com") {

            // return true so this user CAN edit/post/delete
            // blog posts (and post any HTML/JS)

            return true;
        }

        // otherwise return false, so they have no access
        // to the admin panel (but can still view posts)

        return false;
    }

    public function referred()
    {
        return $this->hasMany(User::class, 'referred_user_id');
    }

    public function wallet()
    {
        return $this->hasOne(UserWallet::class, 'users_id');
    }

    public function contractRoleFirst()
    {
        return $this->belongsTo(ContractRole::class, 'contract_roles_first_id');
    }

    public function contractRoleSecond()
    {
        return $this->belongsTo(ContractRole::class, 'contract_roles_second_id');
    }

    public function contractRoleTeacher()
    {
        return $this->belongsTo(ContractRole::class, 'contract_roles_teacher_id');
    }

    public function salesCourses()
    {
        $referreds = $this->referred;
        $obj = new \stdClass();
        $obj->courses = 0;
        $obj->profits = 0;
        foreach ($referreds as $referred) {
            $obj->courses += $referred->course_registered->count();
            $obj->profits += $referred->bills->sum('price');

        }

        return $obj;
    }
}
