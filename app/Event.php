<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Event;

class Event extends Model
{
    protected $guarded = [
        'id', 'add_image','files'
    ];

    public function notHavingImageInDb(){
        return (empty($this->image))?true:false;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (isset($model->event_date)) $model->event_date = date('Y-m-d', strtotime($model->event_date));
			 if (isset($model->is_published) && $model->is_published=='on') $model->is_published = 1;
            else $model->is_published = 0;
        });
    }

    public static function rules($id = '')
    {
      $rules =  [
          'name' => [
            'required'
          ]
      ];

      if(!empty($id))
      {
        $rules =  [
            'name' => [
              'required'
            ],
            'event_date' => 'required',
            'price' => 'required'
        ];

        $event = Event::find($id);

        if ($event->notHavingImageInDb()){
            //$rules['image_add'] = 'required|mimes:jpeg,jpg,png|max:2048';
        }
      }

      return $rules;
    }

    public static function messages($id = '')
    {
      return [
          'name.required' => 'You must enter event name.',
          'event_date.required' => 'You must select date.',
          'price.required' => 'You must enter event price.',
          'image_add.required' => 'You must select image.',
          'image_add.mimes' => 'Only allowed image type jpeg,jpg,png.',
          'image_add.max' => 'Image size is big from 2MB.'
      ];
    }

    public function EventOrders(){
        return $this->hasMany('App\EventOrder');
    }
}
