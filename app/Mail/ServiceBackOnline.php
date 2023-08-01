<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceBackOnline extends Mailable{
    use Queueable, SerializesModels;

    public $message;

    public function __construct($message){
        $this->message = $message;
    }

    public function build(){
        return $this->subject("بازگشت سرویس")->from('info@negahbane.site')->view('mail.service')->with('data', [
            "message" => $this->message
        ]);
    }
}
