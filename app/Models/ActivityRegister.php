<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ActivityRegister
 *
 * @property int $id
 * @property int|null $activity_id Id de la actividad o evento
 * @property int|null $user_id Usuario registrado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister newQuery()
 * @method static \Illuminate\Database\Query\Builder|ActivityRegister onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityRegister whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|ActivityRegister withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ActivityRegister withoutTrashed()
 * @mixin \Eloquent
 */
class ActivityRegister extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'activity_register';

    protected $fillable = [
        'activity_id',
        'user_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

