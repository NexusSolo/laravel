<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = false;
    public function account()
    {
        return $this->belongsTo('App\Models\Account', 'account_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\PaymentNote', 'payment_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            $payment->id = static::randString(30);
        });
    }

    public static function randString($length){
        # get random character length between minimum and maximum length
        // $length = rand($min, $max);
        $string = '';
        # character index [0-9a-zA-Z] etc
        $index = '0123456789bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ';

        for ($i=0; $i < $length; $i++) {
           # get random character index
           $index = str_shuffle($index);
           $string .= $index[mt_rand(0, strlen($index) -1)];
        }
        return $string;
    }

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_id', 'id');
    }
}
