<x-layouts.layout>
    <div class="w-full bg-gray-200 h-full px-8 py-4">
        <div class="border-b border-gray-200">
            <div role="tablist" class="tabs -mb-px flex gap-4">
                <button data-tab-target="contacts" role="tab" aria-selected="true" class="tab flex items-center gap-2 border-b-2 border-indigo-800 px-4 py-2 text-sm font-medium text-indigo-800 transition-colors hover:text-indigo-900 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 1114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                    </svg>
                    Contacts
                </button>

                <button data-tab-target="add-friend" role="tab" aria-selected="false" class="tab flex items-center gap-2 border-b-2 border-transparent px-4 py-2 text-sm font-medium text-gray-600 transition-colors hover:text-gray-700 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.041.147.083.22.127.324.196.72.257 1.076.124l1.217-.456a1.125 1.125 0 011.37.49l.772 1.341a1.125 1.125 0 01-.12 1.386l-.949.823c-.254.243-.373.645-.206 1.008.084.258.116.52.116.785 0 .26-.032.52-.116.785-.167.363-.048.765.206 1.008l.949.823a1.125 1.125 0 01.12 1.386l-.772 1.341a1.125 1.125 0 01-1.37.49l-1.217-.456c-.356-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-.772-1.341a1.125 1.125 0 01.12-1.386l.949-.823c.253-.243.373-.645.206-1.008a6.591 6.591 0 01-.116-.785c0-.26.032-.52.116-.785.167-.363.048-.765-.206-1.008l-.949-.823a1.125 1.125 0 01-.12-1.386l.772-1.341a1.125 1.125 0 011.37-.49l1.217.456c.356.133.751.072 1.076-.124.072-.044.145-.087.22-.128.332-.183.582-.495.644-.869l.213-1.281z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Add Friend
                </button>
            </div>
        </div>

        <div role="tabpanel" class="mt-4">
            <div id="contacts" aria-hidden="false" class="tab-content flex justify-between items-center text-gray-700">
                <div class="w-full flex justify-start items-center flex-wrap gap-[5%]">
                    <div class="w-[45%] border-b border-gray-400 px-4 py-2 flex justify-between items-center mb-4">
                        <div class="w-4/6 flex gap-4 justify-start items-center">
                            <img class="size-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" alt="">
                            <p class="text-gray-800 font-medium truncate w-8/12">Sergio GutierrezSergio GutierrezSergio GutierrezSergio Gutierrez</p>
                        </div>
                        <button class="rounded-full bg-indigo-800 hover:bg-indigo-900 cursor-pointer group">
                            <p class="text-white py-2 px-4 flex justify-center align-center gap-2">Message <svg xmlns="http://www.w3.org/2000/svg" class="self-center fill-white size-4 transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M541.9 139.5C546.4 127.7 543.6 114.3 534.7 105.4C525.8 96.5 512.4 93.6 500.6 98.2L84.6 258.2C71.9 263 63.7 275.2 64 288.7C64.3 302.2 73.1 314.1 85.9 318.3L262.7 377.2L321.6 554C325.9 566.8 337.7 575.6 351.2 575.9C364.7 576.2 376.9 568 381.8 555.4L541.8 139.4z"/></svg></p>
                        </button>
                    </div>
                    <div class="w-[45%] border-b border-gray-400 px-4 py-2 flex justify-between items-center mb-4">
                        <div class="w-4/6 flex gap-4 justify-start items-center">
                            <img class="size-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" alt="">
                            <p class="text-gray-800 font-medium truncate w-8/12">Sergio GutierrezSergio GutierrezSergio GutierrezSergio Gutierrez</p>
                        </div>
                        <button class="rounded-full bg-indigo-800 hover:bg-indigo-900 cursor-pointer group">
                            <p class="text-white py-2 px-4 flex justify-center align-center gap-2">Message <svg xmlns="http://www.w3.org/2000/svg" class="self-center fill-white size-4 transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M541.9 139.5C546.4 127.7 543.6 114.3 534.7 105.4C525.8 96.5 512.4 93.6 500.6 98.2L84.6 258.2C71.9 263 63.7 275.2 64 288.7C64.3 302.2 73.1 314.1 85.9 318.3L262.7 377.2L321.6 554C325.9 566.8 337.7 575.6 351.2 575.9C364.7 576.2 376.9 568 381.8 555.4L541.8 139.4z"/></svg></p>
                        </button>
                    </div>
                    <div class="w-[45%] border-b border-gray-400 px-4 py-2 flex justify-between items-center mb-4">
                        <div class="w-4/6 flex gap-4 justify-start items-center">
                            <img class="size-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" alt="">
                            <p class="text-gray-800 font-medium truncate w-8/12">Sergio GutierrezSergio GutierrezSergio GutierrezSergio Gutierrez</p>
                        </div>
                        <button class="rounded-full bg-indigo-800 hover:bg-indigo-900 cursor-pointer group">
                            <p class="text-white py-2 px-4 flex justify-center align-center gap-2">Message <svg xmlns="http://www.w3.org/2000/svg" class="self-center fill-white size-4 transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M541.9 139.5C546.4 127.7 543.6 114.3 534.7 105.4C525.8 96.5 512.4 93.6 500.6 98.2L84.6 258.2C71.9 263 63.7 275.2 64 288.7C64.3 302.2 73.1 314.1 85.9 318.3L262.7 377.2L321.6 554C325.9 566.8 337.7 575.6 351.2 575.9C364.7 576.2 376.9 568 381.8 555.4L541.8 139.4z"/></svg></p>
                        </button>
                    </div>
                </div>
            </div>
            <div id="add-friend" aria-hidden="true" class="tab-content hidden text-gray-700">
                <form action="" class="w-full flex justify-center items-center mb-4">
                    <input class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2" type="search" name="q" id="search-friend" placeholder="Search your friends by username or email">
                </form>
                <div class="mb-8">
                    <p class="mb-4 text-xl font-bold text-gray-800">Search for: ""</p>
                    <div class="w-full flex justify-start items-center flex-wrap gap-[5%]">
                        <div class="w-[45%] border-b border-gray-400 px-4 py-2 flex justify-between items-center mb-4">
                            <div class="w-4/6 flex gap-4 justify-start items-center">
                                <img class="size-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" alt="">
                                <p class="text-gray-800 font-medium truncate w-10/12">Sergio GutierrezSergio GutierrezSergio GutierrezSergio Gutierrez</p>
                            </div>
                            <button class="rounded-full bg-indigo-800 hover:bg-indigo-900 cursor-pointer group">
                                <p class="text-white py-2 px-4 flex justify-center align-center gap-2">Add <svg xmlns="http://www.w3.org/2000/svg" class="self-center fill-white size-4 transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M280 88C280 57.1 254.9 32 224 32C193.1 32 168 57.1 168 88C168 118.9 193.1 144 224 144C254.9 144 280 118.9 280 88zM304 300.7L341 350.6C353.8 333.1 369.5 317.9 387.3 305.6L331.1 229.9C306 196 266.3 176 224 176C181.7 176 142 196 116.8 229.9L46.3 324.9C35.8 339.1 38.7 359.1 52.9 369.7C67.1 380.3 87.1 377.3 97.7 363.1L144 300.7L144 576C144 593.7 158.3 608 176 608C193.7 608 208 593.7 208 576L208 416C208 407.2 215.2 400 224 400C232.8 400 240 407.2 240 416L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 300.7zM496 608C575.5 608 640 543.5 640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608zM512 400L512 448L560 448C568.8 448 576 455.2 576 464C576 472.8 568.8 480 560 480L512 480L512 528C512 536.8 504.8 544 496 544C487.2 544 480 536.8 480 528L480 480L432 480C423.2 480 416 472.8 416 464C416 455.2 423.2 448 432 448L480 448L480 400C480 391.2 487.2 384 496 384C504.8 384 512 391.2 512 400z"/></svg></p>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="">
                    <p class="mb-4 text-xl font-bold text-gray-800">Friend Suggestions</p>
                    <div class="w-full flex justify-start items-center flex-wrap gap-[5%]">
                        <div class="w-[45%] border-b border-gray-400 px-4 py-2 flex justify-between items-center mb-4">
                            <div class="w-4/6 flex gap-4 justify-start items-center">
                                <img class="size-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" alt="">
                                <p class="text-gray-800 font-medium truncate w-10/12">Sergio GutierrezSergio GutierrezSergio GutierrezSergio Gutierrez</p>
                            </div>
                            <button class="rounded-full bg-indigo-800 hover:bg-indigo-900 cursor-pointer group">
                                <p class="text-white py-2 px-4 flex justify-center align-center gap-2">Add <svg xmlns="http://www.w3.org/2000/svg" class="self-center fill-white size-4 transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M280 88C280 57.1 254.9 32 224 32C193.1 32 168 57.1 168 88C168 118.9 193.1 144 224 144C254.9 144 280 118.9 280 88zM304 300.7L341 350.6C353.8 333.1 369.5 317.9 387.3 305.6L331.1 229.9C306 196 266.3 176 224 176C181.7 176 142 196 116.8 229.9L46.3 324.9C35.8 339.1 38.7 359.1 52.9 369.7C67.1 380.3 87.1 377.3 97.7 363.1L144 300.7L144 576C144 593.7 158.3 608 176 608C193.7 608 208 593.7 208 576L208 416C208 407.2 215.2 400 224 400C232.8 400 240 407.2 240 416L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 300.7zM496 608C575.5 608 640 543.5 640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608zM512 400L512 448L560 448C568.8 448 576 455.2 576 464C576 472.8 568.8 480 560 480L512 480L512 528C512 536.8 504.8 544 496 544C487.2 544 480 536.8 480 528L480 480L432 480C423.2 480 416 472.8 416 464C416 455.2 423.2 448 432 448L480 448L480 400C480 391.2 487.2 384 496 384C504.8 384 512 391.2 512 400z"/></svg></p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts>