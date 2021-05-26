<?php
namespace App\Services;
/**
 * Created by Naveed Shahzad.
 * User: naveed
 * Date: 26/05/2021
 * Time: 11:22 AM
 */
class SmsService{

    public function sendSmsAsp($number, $sms_text,$language='en')
    {
        $url = "http://sms.punjab.gov.pk/api/cmpservice.svc/smssend/NDAy/MQ==/$language";
        $fields = array(
            'PhoneNo' => $number,
            'SMSMessage' => $sms_text
        );

        $headers = array(
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

}
