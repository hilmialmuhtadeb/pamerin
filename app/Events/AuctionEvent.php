<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class AuctionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id,$auction_id,$bidder,$name;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($arrayMessage)
    {
        $this->user_id=$arrayMessage['user_id'];
        $this->auction_id=$arrayMessage['auction_id'];
        $this->bidder=$arrayMessage['bidder'];
        $this->name =$arrayMessage['name'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastAs()
    {
        return 'auction-submitted';
    }
}
