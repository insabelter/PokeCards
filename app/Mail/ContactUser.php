<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pokecards.site@gmail.com','PokéCards')
                    ->replyTo($this->usermail, $this->username)
                    ->markdown('emails.contact-user');
    }
}
