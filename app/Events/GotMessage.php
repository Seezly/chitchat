<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use App\Models\Conversation;
use Exception;

class GotMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Message $message)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {

        try {
            $receiver = $this->message->conversation->users()
                ->where('user_id', '!=', $this->message->sender_id)
                ->first();

            return [
                new PrivateChannel('App.Models.User.' . $receiver->id),
            ];
        } catch (\Exception $e) {
            return []; // o lanzar excepción
        }
    }

    public function broadcastWith()
    {
        $receiver = $this->message->conversation->users()
            ->where('user_id', '!=', $this->message->sender_id)
            ->first();

        return [
            'id'              => $this->message->id,
            'sender_id'       => $this->message->sender_id,
            'conversation_id' => $this->message->conversation_id,
            'body'            => $this->message->body,
            'created_at'      => $this->message->created_at->toDateTimeString(),
            'last_read_at' => $receiver->pivot->last_read_at
        ];
    }
}
