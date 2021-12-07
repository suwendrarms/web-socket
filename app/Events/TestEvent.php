<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
class TestEvent implements ShouldBroadcast
{
use Dispatchable, InteractsWithSockets, SerializesModels;
public $message;
public $count;
/**
* Create a new event instance.
*
* @return void
*/
public function __construct($message)
{
$this->message =  $message;
$this->count = 1;
}

public function broadcastAs()
    {
        return 'created';
    }
/**
* Get the channels the event should broadcast on.
*
* @return \Illuminate\Broadcasting\Channel|array
*/
public function broadcastOn(){
    return new Channel('test');
}
public function broadcastWith(){
    return ['message' => str_random(15)];
}
}