<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class orderProductUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $orderProduct;
    
    /**
     * Create a new event instance.
     *
     * @param $orderProduct
     * @return void
     */
    public function __construct($orderProduct)
    {
        $this->orderProduct = $orderProduct;
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
