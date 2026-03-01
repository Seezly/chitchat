@if ($messages->hasMorePages())
    <div class="load-trigger" data-next-page="{{ $messages->nextPageUrl() }}"></div>
@endif

@foreach ($messages->reverse() as $message)
    @php
        $isMine = $message->sender_id === auth()->id();
    @endphp                
    <div class="bg-indigo-800 rounded-xl {{$isMine ? "rounded-br-none self-end" : "rounded-bl-none self-start"}} max-w-1/2 py-2 px-4">
        <p class="text-white">{{ $message->body }}</p>
        <div class="flex justify-between items-center mt-2 gap-4">
            <span class="text-white text-[8px]">{{ $message->created_at->format('m/d/y h:i a') }}</span>
            <span class="text-white text-[8px]">{{ $conversation->users->find($contact->id)->pivot->last_read_at > $message->created_at && $isMine ? "read" : "sent" }}</span>
        </div>
    </div>
@endforeach
