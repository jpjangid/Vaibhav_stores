<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Blog;

class Enquiry extends Model
{

    protected $guarded = [
        'id','query_category_slug'
    ];


    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
    
    public function Brand()
    {
        return $this->belongsTo('App\Brand', 'product_id');
    }
}
