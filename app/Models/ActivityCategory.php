<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ActivityCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read int|null $activity_count
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActivityCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the events for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
