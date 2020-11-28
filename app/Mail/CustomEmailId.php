<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmailId extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket_no,$message,$name,$mobile,$email,$product_name,$brandname,$product_image,$brandimage,$enquiry_type)
    {
		$this->ticket_no = $ticket_no;
		$this->messages = $message;
		$this->mobile = $mobile;
		$this->email = $email;
		$this->name = $name;
		$this->product_name = $product_name;
		$this->brandname = $brandname;
		$this->product_image = $product_image;
		$this->brandimage = $brandimage;
		$this->enquiry_type = $enquiry_type;
		
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(!empty($this->ticket_no))
        {
            $subject = 'Enquiry Ticket ['.$this->ticket_no.']';
        }
        else{
            $subject = 'Enquiry received';
        }
		//dd($this->name);
        return $this->markdown('emails.enquiry_reply_from_admin')
        ->from('noreply@28svllp.com', 'Vaibhav Stores')
        ->subject($subject)
        ->with([
            'messages' => $this->messages,
			'name'=>$this->name,
			'mobile'=>$this->mobile,
			'email'=>$this->email,
			'product_name'=>$this->product_name,
			'brandname'=>$this->brandname,
			'product_image'=>$this->product_image,
			'brandimage'=>$this->brandimage,
			'enquiry_type'=>$this->enquiry_type
			
			
        ]);

    }
}
