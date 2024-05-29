<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserWallet
 *
 * @property int $id
 * @property int $users_id
 * @property string $wallet_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserWallet whereWalletAddress($value)
 * @mixin \Eloquent
 */
class UserWallet extends Model
{

    protected $fillable = [
        'user_id',
        'wallet_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
