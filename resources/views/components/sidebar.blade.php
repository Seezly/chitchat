<div class="w-lg sticky top-0 flex shrink-0 h-screen flex-col justify-between border-e border-gray-100 bg-white">
	<div class="px-4 py-6">
		<span class="grid h-10 w-32 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
		Logo
		</span>

		<ul class="mt-6 space-y-1">
			<li>
				<details class="overflow-y-auto max-h-[55vh] group [&amp;_summary::-webkit-details-marker]:hidden" open>
					<summary class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
						<span class="text-sm font-medium"> Chats </span>

						<span class="shrink-0 transition duration-300 group-open:-rotate-180">
						<svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
						</span>
					</summary>

					<ul class="mt-2 space-y-1 px-4">
						@if ($recentConversations->isEmpty())
							<p class="text-gray-800 font-medium">There's nothing here... Try to send a message!</p>
						@else
							@foreach ($recentConversations as $conversation)
								<li>
									<a data-conversation={{ $conversation->id }} href="{{ route('conversation.show', $conversation) }}" class="relative rounded-md px-4 py-2 text-sm font-medium border-b flex items-center gap-2 border-gray-200 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
										<div>
											<img alt="" src="{{ asset('storage/' . $conversation->users[0]->profile_pic) }}" class="size-10 rounded-full object-cover">
										</div>
										<div class="w-9/12">
											<p class="font-bold text-gray-800">{{ $conversation->users[0]->name }}</p>
											<p data-element="body" class="truncate">{{ $conversation->lastMessage->body ?? $conversation->users[0]->status }}</p>
										</div>
										@if ($conversation->unread_messages > 0)
											<div class="min-w-4 h-4 p-1 bg-indigo-800 rounded-full flex justify-center items-center absolute right-4">
												<p data-element="unread" class="text-[12px] text-center text-white">{{ $conversation->unread_messages }}</p>
											</div>
										@endif
									</a>
								</li>
							@endforeach
						@endif
					</ul>
				</details>
			</li>

			<li>
				<a href="{{ url('contacts') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
				Contacts
				</a>
			</li>
		</ul>
	</div>

	<div id="profile" class="sticky inset-x-0 bottom-0 border-t border-gray-100 flex justify-between items-center" data-id="{{ auth()->user()->id }}">
		<a href="{{ url('profile') }}" class="w-14/16 flex items-center gap-2 bg-white hover:bg-gray-50 p-4">
			<img alt="" src="{{ asset("storage/" . auth()->user()->profile_pic) }}" class="size-10 rounded-full object-cover">

			<div>
				<p class="text-xs">
				<strong class="block font-medium">{{ auth()->user()->name }}</strong>

				<span> {{ auth()->user()->email }} </span>
				</p>
			</div>
		</a>
		<form class="flex items-center mx-auto" action="{{ route('logout') }}" method="POST">
			@csrf
			<button type="submit" class="group w-10 h-10 rounded-full text-center justify-center p-2 gap-2 bg-white hover:bg-gray-50 cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" class="transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M136.5 88C136.5 57.1 161.6 32 192.5 32C223.4 32 248.5 57.1 248.5 88C248.5 118.9 223.4 144 192.5 144C161.6 144 136.5 118.9 136.5 88zM128.5 269.3L105.9 291.9C99.9 297.9 96.5 306 96.5 314.5L96.5 352C96.5 369.7 82.2 384 64.5 384C46.8 384 32.5 369.7 32.5 352L32.5 314.5C32.5 289 42.6 264.6 60.6 246.6L95.7 211.5C118.5 188.7 149.3 175.9 181.5 175.9C218.4 175.9 253.3 192.7 276.3 221.5L294.3 244C300.4 251.6 309.6 256 319.3 256L352.5 256C370.2 256 384.5 270.3 384.5 288C384.5 305.7 370.2 320 352.5 320L319.3 320C290.1 320 262.6 306.7 244.3 284L240.5 279.3L240.5 394.5L275 424.1C292.7 439.3 304.3 460.3 307.6 483.4L320.2 571.5C322.7 589 310.5 605.2 293 607.7C275.5 610.2 259.3 598 256.8 580.5L244.2 492.4C243.1 484.7 239.2 477.7 233.3 472.6L162 411.5C140.7 393.3 128.5 366.6 128.5 338.6L128.5 269.3zM128.6 435C131 437.3 133.4 439.6 136 441.8L182 481.2L179.8 488.8C175.3 504.5 166.9 518.8 155.4 530.3L87.1 598.6C74.6 611.1 54.3 611.1 41.8 598.6C29.3 586.1 29.3 565.8 41.8 553.3L110.1 485C113.9 481.2 116.7 476.4 118.2 471.2L128.6 435zM537.5 409C528.1 418.4 512.9 418.4 503.6 409C494.3 399.6 494.2 384.4 503.6 375.1L534.6 344.1L432.5 344.1C419.2 344.1 408.5 333.4 408.5 320.1C408.5 306.8 419.2 296.1 432.5 296.1L534.6 296.1L503.6 265.1C494.2 255.7 494.2 240.5 503.6 231.2C513 221.9 528.2 221.8 537.5 231.2L609.5 303.2C618.9 312.6 618.9 327.8 609.5 337.1L537.5 409.1z"/></svg>
			</button>
		</form>
	</div>
</div>