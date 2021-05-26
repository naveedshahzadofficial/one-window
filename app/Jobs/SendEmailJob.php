<?php

namespace App\Jobs;

use App\Mail\DefaultMail;
use App\Mail\UserSignUpMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $email = null;
    private $data = null;
    private $email_for = null;

    /**
     * Create a new job instance.
     *
     * @param $email
     * @param $data
     * @param string $email_for
     */
    public function __construct($email,$data,$email_for='default')
    {
        $this->email = $email;
        $this->data = $data;
        $this->email_for = $email_for;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->email_for) {
            case 'Registration':
                Mail::to($this->email)->send(new UserSignUpMail($this->data));
                break;
            default:
                Mail::to($this->email)->send(new DefaultMail($this->data));
                break;
        }
    }
}
