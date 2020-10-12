<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConnectionRequestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $receiver;
    public $status;
    public $sent_on;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sender, $receiver, $status, $sent_on)
    {
        $this->sender = $this->formatUserData($sender);
        $this->receiver = $receiver;
        $this->status = $status;
        $this->sent_on = $sent_on;
    }

    private function formatUserData($user)
    {
        $format = [
            'username' => $user->username,
            'avatar' => $user->profile->avatar,
            'slug' => $user->profile->slug
        ];

        return json_decode(json_encode($format));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [$this->receiver->receivesBroadcastNotificationsOn()];
    }
}
