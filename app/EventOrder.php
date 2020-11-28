<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class EventOrder extends Model
{
    protected $guarded = [
        'id'
    ];

    public static function rules()
    {
      $rules =  [
          'name' => [
            'required'
          ],
          'email' => [
            'required'
          ],
          'mobile' => [
            'required'
          ]
      ];
    }
}
