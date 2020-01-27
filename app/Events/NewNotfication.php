<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NewNotfication implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification;
    public $sender;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
        $this->sender = User::find($this->notification->sender);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('user.' . $this->notification->receiver);
    }
    public function broadcastAs()
    {
        return 'notif';
    }
    public function broadcastWith()
    {
        return [
            'id' => $this->notification->id,
            'body' => $this->notification->body,
            'sender' => $this->notification->sender,
            'receiver' => $this->notification->receiver,
            'created_at' => $this->notification->created_at,
            'sender_name' => User::find($this->notification->sender)->fullName(),
        ];
    }
}
