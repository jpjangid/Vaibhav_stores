<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\MetaData;

class MetaData extends Model
{
    protected $fillable = [
        'meta_key','meta_value'
    ];


   
}
