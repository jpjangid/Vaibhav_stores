<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Review extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'rating', 'review', 'image1', 'image2'
    ];

    public static function rules($id = '')
    {
      $rules =  [
          'product_id' => 'required',
          'user_id' => 'required',
      ];


      return $rules;
    }

    public static function messages($id = '')
    {
      return [
          'rating.required' => 'You must rate the product.',
      ];
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
