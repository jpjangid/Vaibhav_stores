<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Product extends Model
{
    protected $guarded = [
        'id', 'product_image', 'product_image_delete', 'product_image_delete'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (isset($model->is_published) && $model->is_published=='on') $model->is_published = 1;
            else $model->is_published = 0;
        });
    }

    public static function rules($id = '')
    {
      $rules =  [
          'name' => [
            'required',
            Rule::unique('products')->where(function ($query) {
                return $query->where('deleted', false);
            })->ignore($id)
          ]
      ];

      if(!empty($id))
      {
        $rules =  [
            'name' => [
                'required',
                Rule::unique('products')->where(function ($query) {
                    return $query->where('deleted', false);
                })->ignore($id)
            ],
            'slug' => [
                'required',
                Rule::unique('products')->where(function ($query) {
                    return $query->where('deleted', false);
                })->ignore($id)
            ],
            'discount' => 'numeric',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'short_description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'gst_rate' => 'required|numeric',
        ];
      }

      return $rules;
    }

    public static function messages($id = '')
    {
      return [
          'name.required' => 'You must enter product name.',
          'name.unique' => 'The product name is already exists.',
          'category_id.required' => 'You must select category.',
          'sub_category_id.required' => 'You must select sub-category.',
          'short_description.required' => 'You must enter short description.',
          'regular_price.required' => 'You must enter regular price.',
          'sale_price.required' => 'You must enter sale price.',
          'gst_rate.required' => 'You must enter gst rate.',
          'slug.required' => 'You must enter url.',
          'slug.unique' => 'The slug is already exists.',
          'discount.numeric' => 'You must enter numeric value.',
      ];
    }

    public function productImages(){
        return $this->hasMany('App\ProductImage');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function subCategory(){
        return $this->belongsTo('App\SubCategory');
    }
    public function product_image_primary(){
        return $this->hasOne('App\ProductImage')->where('product_images.is_primary', '=', 1);
    }
    public function reviews(){
        return $this->hasMany('App\Review');
    }
    public function avgRating()
    {
        return $this->hasOne('App\Review')
          ->selectRaw('avg(rating) as rating, product_id')
          ->groupBy('product_id');
    }
}
