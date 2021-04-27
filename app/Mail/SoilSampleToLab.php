<?php

namespace App\Mail;

use App\Models\Comunidad;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Region;
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
        $soil['region']=Region::find($soil['region'])->name;
        $soil['departamento']=Departamento::find($soil['departamento'])->name;
        $soil['municipio']=Municipio::find($soil['municipio'])->name;
        $soil['comunidad']=Comunidad::find($soil['comunidad'])->name;

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
            ->markdown('emails.sample_to_lab');
    }
}
