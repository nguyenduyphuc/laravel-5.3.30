<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contact;

class MailContact extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->data = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.pages.email-contact')->from('khoaimonchien@gmail.com', 'Shop võ thuật Việt Bắc')->replyTo($this->data->email, $this->data->name)
                ->subject("Hỏi đáp về chủ đề ".$this->data->subject)->with('data', $this->data);
    }
}
