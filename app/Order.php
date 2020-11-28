<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Order;

class Order extends Model
{
    protected $fillable = [
        'order_date','user_id','order_no','order_amount','payment_mode','payment_status'
    ];

    public function OrderRows()
    {
        return $this->hasMany('App\OrderRow');
    }
}
