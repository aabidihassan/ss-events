<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpiredSubscription extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $email
     * 
     *
     * @return void
     */
    public function __construct($data,$subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.expiredSubscription', ['data' => $this->data])
            ->subject($this->subject);
    }
}
