<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $visa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($visa)
    {
        $this->visa = $visa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("دفع قيمة التاشير الالكترونية")->from(\App\Models\Setting::all()->first()->MAIL_USERNAME,__('front_layout.home_name'))
        ->view('emails.payment');
    }
}
