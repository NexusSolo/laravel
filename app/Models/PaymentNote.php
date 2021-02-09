<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentNote extends Model
{
    use HasFactory;

    public $timestamps = true;
    public function payment()
    {
        return $this->belongsTo('App\Models\Payment', 'payment_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
