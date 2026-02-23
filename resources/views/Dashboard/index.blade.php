<x-layouts.layout>
    <div class="w-full bg-gray-200 h-full px-8 py-4 flex flex-col justify-center items-center">
        <div class="max-w-md text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto size-20 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"></path>
            </svg>

            <h2 class="mt-6 text-2xl font-bold text-gray-900">Thanks for using ChitChat!</h2>

            <p class="mt-4 text-pretty text-gray-700">
                Go to <a class="text-indigo-800 hover:text-indigo-700 underline" href="#">contacts</a> to add a new friend or start a new conversation.
            </p>

            <ol class="mt-6 space-y-2 text-left">
                <li class="flex items-center gap-2">
                    <span class="grid size-6 shrink-0 place-content-center rounded-full bg-indigo-600 text-sm font-medium text-white">
                        1
                    </span>

                    <span class="text-sm text-gray-700">Real time chat with the people you love talking to</span>
                </li>

                <li class="flex items-center gap-2">
                    <span class="grid size-6 shrink-0 place-content-center rounded-full bg-indigo-600 text-sm font-medium text-white">
                        2
                    </span>

                    <span class="text-sm text-gray-700">Invite new friends</span>
                </li>

                <li class="flex items-center gap-2">
                    <span class="grid size-6 shrink-0 place-content-center rounded-full bg-indigo-600 text-sm font-medium text-white">
                        3
                    </span>

                    <span class="text-sm text-gray-700">Start chitchatting!</span>
                </li>
            </ol>

            <button class="mt-6 block w-full rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium text-white transition-colors hover:bg-indigo-700">
                Invite a Friend
            </button>
        </div>
    </div>
</x-layouts.layout>