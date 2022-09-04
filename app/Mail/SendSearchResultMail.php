<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSearchResultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company;

    public $start_date;

    public $end_date;

    public $path;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company, $start_date , $end_date , $path)
    {
        $this->company = $company;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->path = $path;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.report')
        ->subject($this->company->company_name)
        ->attachFromStorage($this->path);
;
    }
}
