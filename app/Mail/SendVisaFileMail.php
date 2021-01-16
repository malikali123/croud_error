<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendVisaFileMail extends Mailable
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

        $file = substr($this->visa->uploaded_visas[0]->visa_file,5,1000);

        return $this->subject(" مبروك التاشير الالكترونية")->from(\App\Models\Setting::all()->first()->MAIL_USERNAME,__('front_layout.home_name'))
            ->view('emails.send')->attach( asset('storage/app/public/'.$this->visa->uploaded_visas[0]->visa_file) ,[//storage_path('app\public\visa\\'.$file), [
                    'as' => $file,
                    'mime' => 'application/pdf',]
            );
    }
}
