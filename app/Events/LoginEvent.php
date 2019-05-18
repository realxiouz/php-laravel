<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LoginEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
        // dd($this->$user->name);
    }

    public function broadcastOn()
    {
        return new Channel('login');
    }

    public function broadcastWith()
    {
        return [
          'title' => $this->user->name.'已上线',
          'desc' => "登录时间: ".now()
        ];
    }
}
