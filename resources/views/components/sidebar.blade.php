<div class="w-lg sticky flex shrink-0 h-screen flex-col justify-between border-e border-gray-100 bg-white">
	<div class="px-4 py-6">
		<span class="grid h-10 w-32 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
		Logo
		</span>

		<ul class="mt-6 space-y-1">
			<li>
				<details class="group [&amp;_summary::-webkit-details-marker]:hidden" open>
					<summary class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
						<span class="text-sm font-medium"> Chats </span>

						<span class="shrink-0 transition duration-300 group-open:-rotate-180">
						<svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
						</span>
					</summary>

					<ul class="mt-2 space-y-1 px-4">
						<li>
							<a href="{{ url('conversation') }}" class="relative rounded-md px-4 py-2 text-sm font-medium border-b flex items-center gap-2 border-gray-200 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
								<div>
									<img alt="" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" class="size-10 rounded-full object-cover">
								</div>
								<div class="w-9/12">
									<p class="font-bold text-gray-800">Sergio Gutierrez</p>
									<p class="truncate">This is just a mockup message</p>
								</div>
								<div class="min-w-4 h-4 p-1 bg-indigo-800 rounded-full flex justify-center items-center absolute right-4">
									<p class="text-[12px] text-center text-white">1</p>
								</div>
							</a>
						</li>

						<li>
							<a href="{{ url('conversation') }}" class="relative rounded-md px-4 py-2 text-sm font-medium border-b flex items-center gap-2 border-gray-200 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
								<div>
									<img alt="" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" class="size-10 rounded-full object-cover">
								</div>
								<div class="w-9/12">
									<p class="font-bold text-gray-800">Anyelis Palma</p>
									<p class="truncate">This is just a mockup message and as if you don't actually know how to truncate any text...</p>
								</div>
								<div class="min-w-4 h-4 p-1 bg-indigo-800 rounded-full flex justify-center items-center absolute right-4">
									<p class="text-[12px] text-center text-white">100+</p>
								</div>
							</a>
						</li>
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

	<div class="sticky inset-x-0 bottom-0 border-t border-gray-100 flex justify-between items-center">
		<a href="{{ url('profile') }}" class="w-14/16 flex items-center gap-2 bg-white hover:bg-gray-50 p-4">
			<img alt="" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&amp;fit=crop&amp;q=80&amp;w=1160" class="size-10 rounded-full object-cover">

			<div>
				<p class="text-xs">
				<strong class="block font-medium">Sergio Gutierrez</strong>

				<span> user@chitchat.com </span>
				</p>
			</div>
		</a>
		<form class="flex items-center mx-auto" action="{{ route('logout') }}" method="POST">
			@csrf
			<button type="submit" class="w-10 h-10 rounded-full text-center justify-center p-2 gap-2 bg-white hover:bg-gray-50 cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M259.1 73.5C262.1 58.7 275.2 48 290.4 48L350.2 48C365.4 48 378.5 58.7 381.5 73.5L396 143.5C410.1 149.5 423.3 157.2 435.3 166.3L503.1 143.8C517.5 139 533.3 145 540.9 158.2L570.8 210C578.4 223.2 575.7 239.8 564.3 249.9L511 297.3C511.9 304.7 512.3 312.3 512.3 320C512.3 327.7 511.8 335.3 511 342.7L564.4 390.2C575.8 400.3 578.4 417 570.9 430.1L541 481.9C533.4 495 517.6 501.1 503.2 496.3L435.4 473.8C423.3 482.9 410.1 490.5 396.1 496.6L381.7 566.5C378.6 581.4 365.5 592 350.4 592L290.6 592C275.4 592 262.3 581.3 259.3 566.5L244.9 496.6C230.8 490.6 217.7 482.9 205.6 473.8L137.5 496.3C123.1 501.1 107.3 495.1 99.7 481.9L69.8 430.1C62.2 416.9 64.9 400.3 76.3 390.2L129.7 342.7C128.8 335.3 128.4 327.7 128.4 320C128.4 312.3 128.9 304.7 129.7 297.3L76.3 249.8C64.9 239.7 62.3 223 69.8 209.9L99.7 158.1C107.3 144.9 123.1 138.9 137.5 143.7L205.3 166.2C217.4 157.1 230.6 149.5 244.6 143.4L259.1 73.5zM320.3 400C364.5 399.8 400.2 363.9 400 319.7C399.8 275.5 363.9 239.8 319.7 240C275.5 240.2 239.8 276.1 240 320.3C240.2 364.5 276.1 400.2 320.3 400z"/></svg>
			</button>
		</form>
	</div>
</div>