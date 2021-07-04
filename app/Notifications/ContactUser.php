<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUser extends Mailable
{
    use Queueable;

    /**
     * Create a new notification instance.
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
        $user = auth()->user();
        return $this->from('pokecards.site@gmail.com', 'PokéCards')
            ->replyTo($user->email, $user->name)
            ->markdown('emails.contact-user');
    }
}
