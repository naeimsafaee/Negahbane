<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    private  $code;

    public function __construct($code){
        $this->code = $code;
    }

    public function build(){
        $code = $this->code;
        return $this->subject("کد تایید ایمیل نگهبانه")->from('info@negahbane.site')->view('mail.VerifyEmail' , compact('code'));
    }
}
