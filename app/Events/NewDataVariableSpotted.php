<?php

namespace App\Events;

use App\Models\DataMap;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewDataVariableSpotted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $variableName;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $variableName, DataMap $dataMap)
    {
        \Log::info("var spotted event constructed");
        $this->variableName = $variableName;
        $this->dataMap = $dataMap;
    }
}
