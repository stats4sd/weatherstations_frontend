<?php

namespace App\Listeners;

use App\Events\SoilSampleSubmitted;
use App\Mail\SoilSampleToLab;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailToLab
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SoilSampleSubmitted  $event
     * @return void
     */
    public function handle(SoilSampleSubmitted $event)
    {
        //magalygc1@yahoo.es
        //edwin.yucra@gmail.com
        // $emails = ['edwin.yucra@gmail.com', 'magalygc1@yahoo.es'];
       
        \Mail::to(config('app.admin_email'))
        ->send(
        new SoilSampleToLab($event->soil)
        );
        
    }
}
