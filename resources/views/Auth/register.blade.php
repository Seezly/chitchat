<x-layouts.guest title="Register">
    <form class="w-2xl border border-white/10 rounded-lg py-3 px-6 flex flex-col justify-center items-center gap-3" action="">
        <h1 class="text-white font-bold text-2xl">Sign Up</h1>
        <div class="w-sm">
            <label for="Username">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Username </span>
        
                <div class="relative">
                    <input type="text" id="Username" class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2">
        
                    <span class="absolute inset-y-0 right-0 grid w-8 place-content-center text-gray-700 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"></path>
                    </svg>
                    </span>
                </div>
            </label>
        </div>
        <div class="w-sm">
            <label for="Email">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Email </span>
        
                <div class="relative">
                    <input type="email" id="Email" class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2">
        
                    <span class="absolute inset-y-0 right-0 grid w-8 place-content-center text-gray-700 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"></path>
                    </svg>
                    </span>
                </div>
            </label>
        </div>
        <div class="w-sm">
            <label for="Password">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Password </span>
        
                <div class="relative">
                    <input type="password" id="Password" class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2">
        
                    <span class="absolute inset-y-0 right-0 grid w-8 place-content-center text-gray-700 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"></path>
                    </svg>
                    </span>
                </div>
            </label>
        </div>
        <div class="w-sm">
            <label for="ConfirmPassword">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Confirm Password </span>
        
                <div class="relative">
                    <input type="password" id="ConfirmPassword" class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2">
        
                    <span class="absolute inset-y-0 right-0 grid w-8 place-content-center text-gray-700 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"></path>
                    </svg>
                    </span>
                </div>
            </label>
        </div>
        <div class="mt-3">
            <a class="inline-block rounded-sm border border-indigo-800 bg-indigo-800 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-gray-200" href="#">
                Sign Up
            </a>
        </div>
    </form>
</x-layouts.guest>