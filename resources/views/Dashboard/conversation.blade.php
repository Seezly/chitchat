<x-layouts.layout title="{{$contact->name}}">
    <div class="w-full relative overflow-hidden bg-gray-200 h-full">
        <div class="bg-white w-full h-16 px-4 py-2 flex justify-between items-center relative z-1">
            <div class="flex gap-4 justify-center items-center">
                <img class="size-10 rounded-full object-cover" src="{{ asset('storage/' . $contact->profile_pic) }}" alt="">
                <div class="flex flex-col">
                    <p class="text-gray-800 font-medium">{{ $contact->name }}</p>
                    <p class="text-gray-800 text-[12px]">{{ $contact->status }}</p>
                </div>
            </div>
            <div class="flex gap-4 justify-center items-center relative">
                <form action="" id="form-search" class="max-w-0 overflow-hidden transition-[max-width] duration-200" aria-hidden="true">
                    <input class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2" type="search" name="q" id="search-input" placeholder="Search any messages">
                </form>
                <button id="search-message" class="size-10 hover:bg-gray-50 p-2 rounded-full cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                </button>
                <button id="convo-btn" class="size-10 hover:bg-gray-50 p-2 rounded-full cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M320 208C289.1 208 264 182.9 264 152C264 121.1 289.1 96 320 96C350.9 96 376 121.1 376 152C376 182.9 350.9 208 320 208zM320 432C350.9 432 376 457.1 376 488C376 518.9 350.9 544 320 544C289.1 544 264 518.9 264 488C264 457.1 289.1 432 320 432zM376 320C376 350.9 350.9 376 320 376C289.1 376 264 350.9 264 320C264 289.1 289.1 264 320 264C350.9 264 376 289.1 376 320z"/></svg>
                </button>
                <div role="menu" id="convo-settings" class="opacity-0 absolute inset-e-0 top-16 z-auto w-0 h-0 overflow-hidden rounded border border-gray-200 bg-white shadow-sm transition-all duration-200">
                    <form class="w-full" action="{{ route('message.destroy-messages', $conversation) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="block w-full text-left px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 cursor-pointer" role="menuitem">
                            Clear chat
                        </button>
                    </form>
                    
                    <form class="w-full" action="{{ route('conversation.destroy', $conversation) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="block w-full px-3 py-2 text-sm font-medium text-red-700 transition-colors hover:bg-red-50 ltr:text-left rtl:text-right cursor-pointer">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div id="chat-container" class="flex flex-col justify-start gap-4 py-2 px-4 h-[82.5vh] overflow-auto">
            <x-partials.message :messages=$messages :conversation=$conversation :contact=$contact/>
            <div id="bottom" class="hidden flex justify-center items-center fixed bottom-20 size-10 rounded-full p-2 bg-white border border-indigo-800 hover:bg-indigo-900 transition duration-200 cursor-pointer group">
                <svg xmlns="http://www.w3.org/2000/svg" class="self-center justify-self-center fill-indigo-800 size-4 transform group-hover:scale-[1.2] group-hover:fill-white transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M297.4 566.6C309.9 579.1 330.2 579.1 342.7 566.6L502.7 406.6C515.2 394.1 515.2 373.8 502.7 361.3C490.2 348.8 469.9 348.8 457.4 361.3L352 466.7L352 96C352 78.3 337.7 64 320 64C302.3 64 288 78.3 288 96L288 466.7L182.6 361.3C170.1 348.8 149.8 348.8 137.3 361.3C124.8 373.8 124.8 394.1 137.3 406.6L297.3 566.6z"/></svg>
            </div>
        </div>
        <form id="form-message" action="{{ route('message.store', $conversation) }}" method="POST" class="sticky bottom-0 w-full py-2 px-4 bg-white h-16 flex items-center">
            @csrf
            <input class="w-15/16 h-full px-4 py-2 border border-indigo-800 rounded-l-lg" type="text" name="body" id="body" placeholder="Write a message...">
            <button id="send-message" type="submit" class="w-1/16 h-full bg-indigo-800 rounded-r-lg py-2 px-4 text-white hover:bg-indigo-900 cursor-pointer group">
                <svg xmlns="http://www.w3.org/2000/svg" class="self-center justify-self-center fill-white size-4 transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M541.9 139.5C546.4 127.7 543.6 114.3 534.7 105.4C525.8 96.5 512.4 93.6 500.6 98.2L84.6 258.2C71.9 263 63.7 275.2 64 288.7C64.3 302.2 73.1 314.1 85.9 318.3L262.7 377.2L321.6 554C325.9 566.8 337.7 575.6 351.2 575.9C364.7 576.2 376.9 568 381.8 555.4L541.8 139.4z"/></svg>
            </button>
        </form>
    </div>
</x-layouts.layout>