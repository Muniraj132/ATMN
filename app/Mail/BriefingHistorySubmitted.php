<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BriefingHistorySubmitted extends Mailable
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
        return $this->subject('Monthly Briefing History Submitted Successfully!')
            ->view('frontend.email.briefinghistorysubmitted');

    }
}