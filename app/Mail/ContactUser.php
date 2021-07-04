<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ContactUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new email instance.
     *
     * @return void
     */
    public $offer_card;
    public $username;
    public $usermail;
    public $message;

    public function __construct($data)
    {
        $this->offer_card = $data->offer_card;
        $this->username = $data->username;
        $this->usermail = $data->usermail;
        $this->message = $data->message;
    }

    /**
     * Build the email.
     *
     * @return $this
     */
    public function build()
    {
        $user = auth()->user();
        return $this->from('pokecards.site@gmail.com','PokéCards')
                    ->replyTo($user->email, $user->name)
                    ->markdown('emails.contact-user');
    }
}
