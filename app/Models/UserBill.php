<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserBill
 *
 * @property int $id
 * @property float $amount
 * @property string $name
 * @property string $lastname
 * @property int $countries_id Id del pais
 * @property string $city
 * @property int $cellphone
 * @property string $email
 * @property mixed $courses
 * @property string $payment_method
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereCellphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereCountriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereCourses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereUpdatedAt($value)
 * @property string $uuid
 * @property int $users_id Id del usuario
 * @property string $status P: Pendiente / A: Aprobado /C: Cancelado
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBill whereUuid($value)
 * @property-read \App\Models\Country $country
 * @method static \Illuminate\Database\Query\Builder|UserBill onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserBill withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserBill withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseRegister> $course_registered
 * @property-read int|null $course_registered_count
 * @property-read mixed $status_name
 * @mixin \Eloquent
 */
class UserBill extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'uuid',
        'amount',
        'name',
        'lastname',
        'countries_id',
        'city',
        'cellphone',
        'email',
        'courses',
        'payment_method',
        'users_id',
    ];

    protected $casts = [
        'courses' => 'json',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function course_registered()
    {
        return $this->hasMany(CourseRegister::class);
    }

    public function getPaymentMethodText()
    {
        switch ($this->payment_method) {
            case 'coinpayment':
                return 'Coinpayment';
            case 'free':
                return 'Free';
            default:
                return 'Desconocido';
        }
    }

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 'A':
                return 'Activo';
            case 'P':
                return 'Pendiente';
            case 'C':
                return 'Cancelado';
            default:
                return 'Desconocido';
        }
    }

    public function getTotalCourses()
    {
        return count($this->courses);
    }

    public function getCoursesDetails()
    {
        $details = [];

        foreach ($this->courses as $course) {
            $details[] = [
                'name'     => $course['name'],
                'price'    => $course['price'],
                'quantity' => $course['quantity'],
            ];
        }

        return $details;
    }

    public function getAmountFormatted()
    {
        $formatter = new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($this->amount, config('app.currency_symbol'));
    }

    public function getCoursesAttribute($value)
    {
        return json_decode($value, false);
    }
}
