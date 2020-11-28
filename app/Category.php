<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Category;

class Category extends Model
{
    protected $fillable = [
        'name', 'image','slug','sequence','template_type','banner_image_mobile','banner_image_desktop','meta_title','meta_description','meta_keyword'
    ];

    public function notHavingImageInDb(){
        return (empty($this->image))?true:false;
    }

    public function notHavingBannerImageMobileInDb(){
        return (empty($this->banner_image_mobile))?true:false;
    }

    public function notHavingBannerImageDesktopInDb(){
        return (empty($this->banner_image_desktop))?true:false;
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (isset($model->template_type) && $model->template_type=='on') $model->template_type = 'list';
            else $model->template_type = 'grid';
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
          'slug' => [
            'required','regex:/^\S*$/u',
            Rule::unique('categories')->where(function ($query) {
                return $query->where('deleted', false);
            })->ignore($id)
          ],
          'sequence' => 'required|numeric',
          'image_add' => 'mimes:jpeg,jpg,png|max:5120',
          'banner_image_mobile_add' => 'mimes:jpeg,jpg,png|max:5120',
          'banner_image_desktop_add' => 'mimes:jpeg,jpg,png|max:5120',
      ];

      if(!empty($id))
      {
        $category = Category::find($id);

        if ($category->notHavingImageInDb()){
            $rules['image_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
        }
        if ($category->notHavingBannerImageMobileInDb()){
            $rules['banner_image_mobile_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
        }
        if ($category->notHavingBannerImageDesktopInDb()){
            $rules['banner_image_desktop_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
        }
      }
      else
      {
        $rules['image_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
        $rules['banner_image_mobile_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
        $rules['banner_image_desktop_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
      }

      return $rules;
    }

    public static function messages($id = '')
    {
      return [
          'name.required' => 'You must enter category name.',
          'name.unique' => 'The category name is already exists.',
          'slug.required' => 'You must enter slug.',
          'slug.unique' => 'The slug is already exists.',
          'sequence.required' => 'You must enter sequence.',
          'sequence.numeric' => 'You must enter numeric value.',
          'image_add.required' => 'You must select image.',
          'image_add.mimes' => 'Only allowed image type jpeg,jpg,png.',
          'image_add.max' => 'Image size is big from 5MB.',
          'banner_image_mobile_add.required' => 'You must select image.',
          'banner_image_mobile_add.mimes' => 'Only allowed image type jpeg,jpg,png.',
          'banner_image_mobile_add.max' => 'Image size is big from 5MB.',
          'banner_image_desktop_add.required' => 'You must select image.',
          'banner_image_desktop_add.mimes' => 'Only allowed image type jpeg,jpg,png.',
          'banner_image_desktop_add.max' => 'Image size is big from 5MB.'
      ];
    }

    public function subCategories(){
        return $this->hasMany('App\SubCategory');
    }
    public function subcategory_available_orderBy(){
        return $this->hasMany('App\SubCategory')->where('deleted', '=', 0)->orderBy('sequence', 'asc');
    }
    public function subCategoryFirst(){
        return $this->hasOne('App\SubCategory')->where('deleted', '=', 0)->orderBy('sequence', 'asc');
    }

}
