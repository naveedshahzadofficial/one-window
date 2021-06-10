<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
      $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.default',compact(['data'=>$this->data]))
            ->from(env('MAIL_FROM_ADDRESS', 'muhammad.khalid@pitb.gov.pk'),env('MAIL_FROM_NAME', 'Muhammad Khalid'))->subject($this->data->subject);

    }
}
