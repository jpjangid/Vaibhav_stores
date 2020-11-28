<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Redirection extends Model
{
    protected $fillable = [
        'from_url', 'to_url'
    ];

    public static function rules($id = '') 
    {
      $rules =  [
          'from_url' => 'required',
          'to_url' => 'required',
      ];


      return $rules;
    }

    public static function messages($id = '') 
    {
      return [
          'from_url.required' => 'You must enter from_url.',
          'to_url.required' => 'You must enter to_url.',
      ];
    }
}
