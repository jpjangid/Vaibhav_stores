<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function rules($id = '')
    {
      return [
          'name' => 'required',
          'email' => [
            'required',
            Rule::unique('users')->ignore($id)
          ]
      ];
    }

    public static function messages($id = '')
    {
      return [
          'name.required' => 'You must enter the name.',
          'email.required' => 'You must enter the email.',
          'email.unique' => 'This email is already registered.',
      ];
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function order()
    {
        return $this->hasOne('App\Order');
    }

}
