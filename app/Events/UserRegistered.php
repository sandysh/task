<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserRegistered extends Event
{
    use SerializesModels;

    public $name;
    public $email;
    public $activation_link;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name, $email, $activation_link)
    {
        $this->name = $name;
        $this->email = $email;
        $this->activation_link = $activation_link;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
