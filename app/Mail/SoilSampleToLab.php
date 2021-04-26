<?php

namespace App\Mail;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SoilSampleToLab extends Mailable
{
    use Queueable, SerializesModels;
    
    public $soil;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $soil)
    {
        $this->soil = $soil;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@stats4sd.org")
            ->subject('CCRP Agrometric Platform: MUESTRA DE SUELO PARA ANÁLISIS')
            ->markdown('emails.simple_to_lab');
    }
}
