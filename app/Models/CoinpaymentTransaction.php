<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CoinpaymentTransaction
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $txn_id
 * @property string|null $order_id
 * @property string|null $buyer_name
 * @property string|null $buyer_email
 * @property string|null $currency_code
 * @property string|null $time_expires
 * @property string|null $address
 * @property string|null $amount_total_fiat
 * @property string|null $amount
 * @property string|null $amountf
 * @property string|null $coin
 * @property int|null $confirms_needed
 * @property string|null $payment_address
 * @property string|null $qrcode_url
 * @property string|null $received
 * @property string|null $receivedf
 * @property string|null $recv_confirms
 * @property string|null $status
 * @property string|null $status_text
 * @property string|null $status_url
 * @property string|null $timeout
 * @property string|null $checkout_url
 * @property string|null $redirect_url
 * @property string|null $cancel_url
 * @property string|null $type
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereAmountTotalFiat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereAmountf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereBuyerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereBuyerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereCancelUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereCheckoutUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereCoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereConfirmsNeeded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction wherePaymentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereQrcodeUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereReceivedf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereRecvConfirms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereRedirectUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereStatusText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereStatusUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereTimeExpires($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereTimeout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereTxnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinpaymentTransaction whereUuid($value)
 * @mixin \Eloquent
 */
class CoinpaymentTransaction extends Model
{
    use HasFactory;
}
