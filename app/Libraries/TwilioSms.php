<?php
namespace App\Libraries;
use Twilio\Rest\Client;
// require_once("/var/www/html/visaTracking/vendor/autoload.php");
/**
 * Twilio Library
 */
class TwilioSms
{
	protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client($sid, $token);
    }

    public function sendSMS($to, $message)
    {
        $from = '+13213367377';
        
        try {
            $this->twilio->messages->create(
                $to,
                [
                    'from' => $from,
                    'body' => $message
                ]
            );
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
	
}