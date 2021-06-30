<?php

namespace App\Jobs;

use App\Models\OtpCode;
use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use NsTechNs\JazzCMS\JazzCMS;

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
        Log::info("Phone: ".str_replace('-','',$this->phone_number)." Message {$this->sms_text} ");
        $response = (new JazzCMS)->sendSMS(str_replace('-','',$this->phone_number),$this->sms_text);
        $otp = OtpCode::where('mobile_no',$this->phone_number)->latest()->first();
        if(isset($otp->id) && !empty($otp->id)){
            $otp->update(['sms_response'=>$response]);
        }
       // (new SmsService())->sendSms($this->phone_number, $this->sms_text,$this->language);
    }
}
