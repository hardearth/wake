<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCommission extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'payment_contract_id',
        'amount'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentContract()
    {
        return $this->belongsTo(PaymentContract::class);
    }
}
