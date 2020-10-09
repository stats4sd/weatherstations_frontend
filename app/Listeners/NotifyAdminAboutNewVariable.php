<?php

namespace App\Listeners;

use App\Mail\NewVariableSpottedEmail;
use App\Events\NewDataVariableSpotted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminAboutNewVariable
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
     * @param  object  $event
     * @return void
     */
    public function handle(NewDataVariableSpotted $event)
    {
        \Log::info("listener listening");
        \Mail::to(config('app.admin_email'))->send(
            new NewVariableSpottedEmail($event->variable, $event->dataMap)
        );
    }
}
