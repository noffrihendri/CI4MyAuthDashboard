<?php

namespace App\Libraries;

class Sendmail
{
    function __construct()
    {
    }
    private function sendEmail($title, $message, $to, $attachment=false)
    {

        $this->email->setFrom('deavenditama@gmail.com', 'deavenditama');
        $this->email->setTo($to);

        $this->email->attach($attachment);

        $this->email->setSubject($title);
        $this->email->setMessage($message);

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }
    }
}
