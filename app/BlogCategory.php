<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class BlogCategory extends Model
{
    protected $fillable = [
        'name', 'deleted'
    ];

    public static function rules($id = '') 
    {
      $rules =  [
          'name' => [
            'required', 
            Rule::unique('blog_categories')->where(function ($query) {
                return $query->where('deleted', false);
            })->ignore($id)
          ]
      ];


      return $rules;
    }

    public static function messages($id = '') 
    {
      return [
          'name.required' => 'You must enter blog-category name.',
          'name.unique' => 'The blog-category name is already exists.',
      ];
    }

    public function Blogs()
    {
        return $this->belongsToMany('App\Blog', 'category_blog');
    }
}
