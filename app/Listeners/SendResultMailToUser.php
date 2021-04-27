<?php

namespace App\Listeners;

use App\Mail\SoilResultToUser;
use App\Events\ResultLabSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResultMailToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  ResultLabSubmitted  $event
     * @return void
     */
    public function handle(ResultLabSubmitted $event)
    {
        \Mail::to(config('app.admin_email'))
        ->send(
        new SoilResultToUser($event->resultLab)
        );
    }
}
