<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public  $title;
    public $userDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $userDetails)
    {
        $this->title = $title;
        $this->userDetails = $userDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)->view('customer_mail');
    }
}
