<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Blog;

class EnquiryDetail extends Model
{
    protected $fillable = [
        'enquiry_id','message','user_id','admin_id'
    ];

    public static function rules($id = '')
    {
      $rules =  [
          'enquiry_id' => [
            'required',
            'exists:enquiries,id'
          ],
          'message' => 'required'
      ];


      return $rules;
    }

    public static function messages($id = '')
    {
      return [
          'enquiry_id.required' => 'enquiry_id is required.',
          'enquiry_id.exists' => 'enquiry_id is not valid.',
          'message.required' => 'Message is required.',
      ];
    }

    public function Enquiry()
    {
        return $this->belongsTo('App\Enquiry');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
