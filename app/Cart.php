<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'product_id','user_id','quantity'
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
