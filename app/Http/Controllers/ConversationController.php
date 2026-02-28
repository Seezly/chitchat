<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class ConversationController extends Controller
{
    public function show(Request $request, Conversation $conversation)
    {
        $currentUserId = auth()->id();

        if (!$conversation->users->contains($currentUserId)) {
            return abort(403);
        }

        $conversation->users()->updateExistingPivot($currentUserId, ['last_read_at' => now()]);

        $contact = $conversation->users->where('id', '!=', $currentUserId)->first();

        $messages = $conversation->messages()
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return view('dashboard.conversation', compact('contact', 'conversation', 'messages'));
    }

    public function conversationWith(User $contact)
    {
        $currentUserId = auth()->id();

        $isContact = Contact::where(function ($query) use ($currentUserId) {
            $query->where('sender_id', '=', $currentUserId)
                ->orWhere('receiver_id', '=', $currentUserId);
        })
            ->whereNotNull('accepted_at')
            ->exists();

        if (!$isContact) {
            return abort(403);
        }

        $conversation = $this->findOrCreateConversation($currentUserId, $contact->id);

        return redirect()->route('conversation.show', $conversation);
    }

    public function destroyConversation(Conversation $conversation)
    {
        $conversation->delete();
        $conversation->messages()->delete();

        return response()->back()->with(['success' => 'Messages deleted succesfully']);
    }

    private function findOrCreateConversation(int $currentUserId, int $contactId): Conversation
    {
        $conversation = Conversation::withTrashed()
            ->whereHas('users', function ($query) use ($currentUserId) {
                $query->where('user_id', $currentUserId);
            })
            ->whereHas('users', function ($query) use ($contactId) {
                $query->where('user_id', $contactId);
            })
            ->withCount('users')
            ->having('users_count', 2)
            ->first();

        if ($conversation->trashed()) {
            $conversation->restore();
        }

        if (!$conversation) {
            $conversation = Conversation::create(['last_message_at' => now()]);

            $conversation->users()->attach([
                $currentUserId => [
                    'joined_at' => now(),
                    'last_message_at' => null,
                    'last_read_at' => now(),
                ],
                $contactId => [
                    'joined_at' => now(),
                    'last_message_at' => null,
                    'last_read_at' => null,
                ],
            ]);
        }

        return $conversation;
    }
}
