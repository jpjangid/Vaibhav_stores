<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\OrderRow;

class OrderRow extends Model
{
    protected $fillable = [
        'order_id','product_id','quantity','price','amount'
    ];

    public function Order()
    {
        return $this->belongsToMany('App\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
