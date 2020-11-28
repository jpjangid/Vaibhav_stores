<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Blog;

class Blog extends Model
{
    protected $fillable = [
        'title','slug','featured_image','excerpt','content','status','meta_title','meta_description','meta_keyword'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (isset($model->status) && $model->status=='on') $model->status = 'published';
            else $model->status = 'draft';
        });
    }

    public static function rules($id = '')
    {
      $rules =  [
          'title' => 'required',
      ];

      return $rules;
    }

    public static function messages($id = '')
    {
      return [
          'title.required' => 'You must enter blog tite.',
      ];
    }

    public function BlogCategories()
    {
        return $this->belongsToMany('App\BlogCategory', 'category_blog', 'blog_category_id', 'blog_id');
    }
}


