<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
class Permission extends Model
{
    protected $fillable = [
        'title'
    ];

    public static function boot()
    {
        parent::boot();
    }

    public static function rules($id = '') 
    {
      $rules =  [
          'title' => [
            'required', 
            Rule::unique('permissions')->where(function ($query) {
                return $query->where('deleted', false);
            })->ignore($id)
          ]
      ];
      return $rules;
    }

    public static function messages($id = '') 
    {
      return [
          'title.required' => 'You must enter title.',
          'title.unique' => 'The title is already exists.'
      ];
    }

    public function admins()
    {
        return $this->belongsToMany('App\Admin', 'permission_admins');
    }
}
