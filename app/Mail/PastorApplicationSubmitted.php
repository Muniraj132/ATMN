<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PastorApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $bodyContent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bodyContent)
    {
        $this->bodyContent = $bodyContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Pastor Application Submitted Successfully!')
            ->view('frontend.email.pastorapllicationsubmitted');

    }
}