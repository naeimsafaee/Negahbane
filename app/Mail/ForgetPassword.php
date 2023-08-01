<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($link) {
        $this->link = $link;
    }

    public function build() {

        return $this->subject("فراموشی رمز نگهبانه")
            ->from($address = config('mail.from.address'), $name =config('mail.from.name'))
            ->view('mail.forget_password', [
                'data' => [
                    "message" => $this->link
                ],
            ])->withSwiftMessage(function ($message) {
                $message->getHeaders()
                    ->addTextHeader('List-Unsubscribe', 'https://negahbane.site/unsubscribe');
            });
    }
}
