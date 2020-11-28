<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventBookingOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $ticket_no, $message,$mobile,$email,$payment_status,$payment_amount,$event_name,$event_image,$id)
    {
        $this->name = $name;
        $this->ticket_no = $ticket_no;
        $this->message = $message; 
		$this->mobile = $mobile; 
		$this->email = $email;
		$this->payment_status = $payment_status;
		$this->payment_amount = $payment_amount;
		$this->event_name = $event_name;
		$this->event_image = $event_image;
		$this->id = $id;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.event_order')
        ->from('noreply@28svllp.com', 'Vaibhav Stores')
        ->subject('Event Ticket Booking')
        ->with([
            'name' => $this->name,
			 'mobile' => $this->mobile,
			 'email' => $this->email,
			'payment_amount' => $this->payment_amount,
			'payment_status' => $this->payment_status,
			'message' => $this->message,
			'event_name' => $this->event_name,
			'event_image' => $this->event_image,
			'id' => $this->id
			
			
        ]);
    }
}
