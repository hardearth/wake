<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Payment
 *
 * @property-read \App\Models\UserBill|null $userBill
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment withoutTrashed()
 * @property int $id
 * @property float $amount Monto
 * @property array|null $detail Detalles de la transacción
 * @property int|null $user_bills_id Id de la factura
 * @property string $source Fuente de pago
 * @property string $status P: Pendiente / A: Aprobado / R: Rechazado / E: Expiro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserBillsId($value)
 * @property mixed|null $response Respuesta por parte del api
 * @property mixed|null $contract datos de la ejecución del contrato
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereResponse($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'amount',
        'detail',
        'response',
        'user_bills_id',
        'source',
        'status',
    ];

    protected $casts = [
        'detail' => 'json',
    ];

    public function userBill()
    {
        return $this->belongsTo(UserBill::class, 'user_bills_id');
    }
}
