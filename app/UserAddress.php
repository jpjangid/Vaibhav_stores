<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\UserAddress;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id','name','mobile','address','pincode','landmark','state','city'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
