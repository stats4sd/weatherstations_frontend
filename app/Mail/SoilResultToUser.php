<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SoilResultToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $resultLab;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $resultLab)
    {
        $this->resultLab = $resultLab;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@stats4sd.org")
            ->subject('CCRP Agrometric Platform: ANÁLISIS FISICO QUÍMICO DE SUELOS')
            ->markdown('emails.result_lab_to_user');
    }
}
