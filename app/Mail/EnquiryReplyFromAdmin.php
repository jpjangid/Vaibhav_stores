<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryReplyFromAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $ticket_no, $message)
    {
        $this->name = $name;
        $this->ticket_no = $ticket_no;
        $this->messages = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.enquiry_reply_from_admin')
        ->from('noreply@28svllp.com', 'Vaibhav Stores')
        ->subject('Enquiry Ticket ['.$this->ticket_no.']')
        ->with([
            'messages' => $this->messages
        ]);
    }
}
