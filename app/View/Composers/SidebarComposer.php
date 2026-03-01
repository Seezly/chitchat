<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Conversation;

class SidebarComposer
{

    public function compose(View $view)
    {
        $currentUserId = auth()->id();

        $recentConversations = Conversation::whereHas('users', fn($q) => $q->where('id', $currentUserId))
            ->with([
                'users' => fn($q) => $q->where('users.id', '!=', $currentUserId),
                'lastMessage.sender'
            ])
            ->withCount([
                'messages as unread_messages' => function ($query) use ($currentUserId) {
                    $query->where('messages.sender_id', '!=', $currentUserId)
                        ->whereExists(
                            function ($sub) use ($currentUserId) {
                                $sub->selectRaw(1)
                                    ->from('conversation_user')
                                    ->whereColumn(
                                        'conversation_user.conversation_id',
                                        'messages.conversation_id'
                                    )
                                    ->where('conversation_user.user_id', $currentUserId)
                                    ->where(function ($query) {
                                        $query->whereColumn('messages.created_at', '>', 'conversation_user.last_read_at')
                                            ->orWhereNull('conversation_user.last_read_at');
                                    });
                            }
                        );
                }
            ])
            ->orderBy('last_message_at', 'desc')
            ->paginate(10);

        $view->with(compact('recentConversations'));
    }
}
