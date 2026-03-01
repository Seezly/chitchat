<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request, Conversation $conversation)
    {

        $currentUserId = auth()->id();

        $validated = $request->validate([
            'body' => 'required|string'
        ]);

        $message = Message::create([
            'sender_id' => $currentUserId,
            'conversation_id' => $conversation->id,
            'body' => $validated['body']
        ]);

        $conversation = $message->conversation;
        $conversation->last_message_at = now();
        $conversation->save();

        $conversation = $message->conversation;
        $conversation->users()->updateExistingPivot($currentUserId, ['last_read_at' => now()]);

        SendMessage::dispatch($message);

        return response()->json(['success' => true, 'data' => 'Message sent successfully'], 201);
    }

    public function search(Request $request)
    {

        $currentUserId = auth()->id();

        $validated = $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'q' => 'required|string',
        ]);

        Message::where(function ($query) use ($validated) {
            $query->where('body', 'LIKE', '%' . $validated['q'] . '%')
                ->where('conversation_id', '=', $validated['conversation_id']);
        });
    }

    public function destroyMessages(Conversation $conversation)
    {
        $conversation->messages()->delete();

        return redirect()->back()->with(['success' => 'Messages deleted successfully']);
    }
}
