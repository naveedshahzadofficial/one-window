<?php

namespace App\Jobs;

use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use JazzCMS;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $phone_number = null;
    private $sms_text = null;
    private $language = null;

    /**
     * Create a new job instance.
     *
     * @param $phone_number
     * @param $sms_text
     * @param string $language
     */
    public function __construct($phone_number,$sms_text,$language='english')
    {
        $this->phone_number = $phone_number;
        $this->sms_text = $sms_text;
        $this->language = $language;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        JazzCMS::sendSMS($this->phone_number,$this->sms_text);
       // (new SmsService())->sendSms($this->phone_number, $this->sms_text,$this->language);
    }
}
