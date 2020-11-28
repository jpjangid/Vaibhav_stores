<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\SubCategory;
class SubCategory extends Model
{
    protected $fillable = [
        'name','image','category_id','slug','sequence','short_description','meta_title','meta_description','meta_keyword'
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function notHavingImageInDb(){
        return (empty($this->image))?true:false;
    }

    public static function rules($id = '')
    {
      $rules =  [
          'name' => [
            'required',
            Rule::unique('sub_categories')->where(function ($query) {
                return $query->where('deleted', false);
            })->ignore($id)
          ],
          'slug' => [
            'required','regex:/^\S*$/u',
            Rule::unique('sub_categories')->where(function ($query) {
                return $query->where('deleted', false);
            })->ignore($id)
          ],
          'sequence' => 'required|numeric',
          'short_description' => 'required',
          'image_add' => 'mimes:jpeg,jpg,png|max:5120',
          'category_id' => 'required'
      ];

      if(!empty($id))
      {
        $subCategory = SubCategory::find($id);

        if ($subCategory->notHavingImageInDb()){
            $rules['image_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
        }
      }
      else
      {
        $rules['image_add'] = 'required|mimes:jpeg,jpg,png|max:5120';
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
          'short_description.required' => 'You must enter short description.',
          'category_id.required' => 'You must select category.',
          'image_add.required' => 'You must select image.',
          'image_add.mimes' => 'Only allowed image type jpeg,jpg,png.',
          'image_add.max' => 'Image size is big from 5MB.'
      ];
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
