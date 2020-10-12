<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $type;
    public $target;
    public $source;
    public $entity;
    public $time;
    public $slug;
    /**
     * Create a new event instance.
     *
     *
     * @return void
     */


    public function __construct($message, $type, $target, $source, $entity, $time)
    {
        $this->message = $message;
        $this->type = $type;
        $this->target = $target;
        $this->source = $source;
        $this->entity = $entity;
        $this->time = $time;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [$this->target->receivesBroadcastNotificationsOn()];
    }
}
