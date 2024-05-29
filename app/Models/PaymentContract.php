<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PaymentContract
 *
 * @property int $id
 * @property array $wallets Wallets que deben viajar al contrato juno con su nivel
 * @property float $amount Monto
 * @property string $status Indica si ya se ejecuto o no la distribucion del contrato
 * @property int $payment_id
 * @property int $created_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\Payment $payment
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereCreatedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract whereWallets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentContract withoutTrashed()
 * @mixin \Eloquent
 */
class PaymentContract extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wallets',
        'amount',
        'status',
        'payment_id',
        'transaction_hash',
        'commissions',
        'executed_at',
        'created_user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'wallets' => 'json',
        'commissions' => 'json',
        'executed_at' => 'datetime',
    ];

    /**
     * Get the payment that owns the contract.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Get the user who created the contract.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }
}
