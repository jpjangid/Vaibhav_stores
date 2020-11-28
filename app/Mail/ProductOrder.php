<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $order_no, $message,$orders)
    {
        $this->name = $name;
        $this->order_no = $order_no;
        $this->messages = $message;
		$this->orders = $orders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.product_order')
        ->from('noreply@28svllp.com', 'Vaibhav Stores')
        ->subject('Order no. is '.$this->order_no)
        ->with([
            'messages' => $this->messages,
			'orders' => $this->orders
        ]);
    }
}
