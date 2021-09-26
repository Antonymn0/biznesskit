<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class reportProductDestroyed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $reportProduct;
    
    /**
     * Create a new event instance.
     *
     * @param $reportProduct
     * @return void
     */
    public function __construct($reportProduct)
    {
        $this->reportProduct = $reportProduct;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
