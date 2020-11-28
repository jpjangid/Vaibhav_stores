<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class UserRight extends Model
{
    protected $fillable = [
        'admin_id', 'module_id'
    ];

    public static function boot()
    {
        parent::boot();
    }

    // public static function rules($id = '')
    // {
    //   $rules =  [
    //       'admin_id' => [
    //         'required'
    //       ],
    //       'module_id' => [
    //         'required'
    //       ]
    //   ];
    //   return $rules;
    // }

    // public static function messages($id = '')
    // {
    //   return [
    //       'admin_id.required' => 'You must enter title.',
    //       'title.unique' => 'The title is already exists.'
    //   ];
    // }
    // public function module(){
    //     return $this->belongsTo('App\Module');
    // }
}
