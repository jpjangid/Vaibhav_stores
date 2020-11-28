<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgottenPasswordAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $otp, $email)
    {
        $this->name = $name;
        $this->otp = $otp;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $resetUrl = url(config('app.url').route('admin.passwordreset', ['token' => $this->otp, 'email' => $this->email], false));
        return $this->markdown('emails.reset_password_admin')
        ->from('noreply@28svllp.com', 'Vaibhav Stores')
        ->subject('Reset Password Notification')
        ->with([
            'name' =>  $this->name,
            'otp' =>  $this->otp,
            'email' =>  $this->email,
        ]);

    }
}
