<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Hash;
class Admin extends Model
{
    // protected $guard = 'admin';
    protected $fillable = [
        'name', 'email', 'password', 'otp'
    ];

    protected $hidden = [
        'password',
    ];

    public static function rules($id = '')
    {
      return [
          'name' => 'required',
          'email' => [
            'required',
            Rule::unique('admins')->ignore($id)
          ]
      ];
    }

    public static function messages($id = '')
    {
      return [
          'name.required' => 'You must enter name.',
          'email.required' => 'You must enter email.',
          'email.unique' => 'Email is already exists.',
      ];
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function userrights()
    {
        return $this->belongsToMany('App\Module', 'user_rights');
    }
}
