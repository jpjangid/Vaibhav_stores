<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Brand;

class Brand extends Model
{
    protected $fillable = [
        'name', 'image','logo','short_description','description','show_on_home_page','slug','meta_title','meta_description','meta_keyword'
    ];

    public function notHavingImageInDb(){
        return (empty($this->image))?true:false;
    }

    public function notHavingLogoInDb(){
        return (empty($this->logo))?true:false;
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (isset($model->show_on_home_page) && $model->show_on_home_page=='on') $model->show_on_home_page = 1;
            else $model->show_on_home_page = 0;
        });
    }

    public static function rules($id = '')
    {
      $rules =  [
          'name' => [
            'required',
            Rule::unique('categories')->where(function ($query) {
                return $query->where('deleted', false);
            })->ignore($id)
          ],
          'short_description' => 'required',
          'description' => 'required',
          'image_add' => 'mimes:jpeg,jpg,png|max:2048',
          'logo_add' => 'mimes:jpeg,jpg,png|max:2048',
      ];

      if(!empty($id))
      {
        $brand = Brand::find($id);

        if ($brand->notHavingImageInDb()){
            $rules['image_add'] = 'required|mimes:jpeg,jpg,png|max:2048';
        }
        if ($brand->notHavingLogoInDb()){
            $rules['logo_add'] = 'required|mimes:jpeg,jpg,png|max:2048';
        }
      }
      else
      {
        $rules['image_add'] = 'required|mimes:jpeg,jpg,png|max:2048';
        $rules['logo_add'] = 'required|mimes:jpeg,jpg,png|max:2048';
      }

      return $rules;
    }

    public static function messages($id = '')
    {
      return [
          'name.required' => 'You must enter category name.',
          'name.unique' => 'The category name is already exists.',
          'short_description.required' => 'You must enter short description.',
          'description.required' => 'You must enter description.',
          'image_add.required' => 'You must select image.',
          'image_add.mimes' => 'Only allowed image type jpeg,jpg,png.',
          'image_add.max' => 'Image size is big from 2MB.',
          'logo_add.required' => 'You must select image.',
          'logo_add.mimes' => 'Only allowed image type jpeg,jpg,png.',
          'logo_add.max' => 'Image size is big from 2MB.',
      ];
    }
}
