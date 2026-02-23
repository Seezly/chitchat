<x-layouts.layout>
    <div class="w-full bg-gray-200 h-full px-8 py-4">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Profile information</h1>
        <p class="text-gray-600 mb-8">
            Here you can edit your information such as email, username, password, and profile picture.
        </p>
        <form class="mb-8 flex justify-between items-start">
            <div class="w-1/2">
                <div class="w-sm mb-4">
                    <label for="Username">
                        <span class="text-sm font-medium text-gray-800"> Username </span>
                
                        <div class="relative">
                            <input type="text" id="Username" class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2" value="Username">
                
                            <span class="absolute inset-y-0 right-0 grid w-8 place-content-center text-gray-700 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"></path>
                            </svg>
                            </span>
                        </div>
                    </label>
                </div>
                <div class="w-sm mb-4">
                    <label for="Email">
                        <span class="text-sm font-medium text-gray-800"> Email </span>
                
                        <div class="relative">
                            <input type="email" id="Email" class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2" value="user@example.com">
                
                            <span class="absolute inset-y-0 right-0 grid w-8 place-content-center text-gray-700 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"></path>
                            </svg>
                            </span>
                        </div>
                    </label>
                </div>
                <div class="w-sm mb-4">
                    <label for="Password">
                        <span class="text-sm font-medium text-gray-800"> Password </span>
                
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
                <div class="w-sm mb-4">
                    <label for="ConfirmPassword">
                        <span class="text-sm font-medium text-gray-800"> Confirm Password </span>
                
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
                <div class="w-sm mb-4">
                    <a class="inline-block rounded-sm border border-indigo-800 bg-indigo-800 px-12 py-3 text-sm font-medium text-white hover:bg-indigo-700" href="#">
                        Save
                    </a>
                </div>
            </div>
            <div class="w-1/2 flex flex-col items-center justify-center">
                <label for="File" class="w-48 h-48 mb-4 mx-auto rounded-full border border-gray-300 bg-white p-4 text-gray-900 shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-900 dark:text-white cursor-pointer">
                    <input multiple="" type="file" id="File" class="sr-only">
                </label>
                <p class="font-medium text-gray-800">Profile picture</p>
                <div class="w-sm mb-4">
                    <label for="Status">
                        <span class="text-sm font-medium text-gray-800"> Status </span>

                        <div class="relative">
                            <input type="text" id="Status" class="mt-0.5 w-full rounded border border-indigo-800/50 shadow-sm sm:text-sm px-3 py-2" value="Username">

                            <span class="absolute inset-y-0 right-0 grid w-8 place-content-center text-gray-700 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"></path>
                                </svg>
                            </span>
                        </div>
                    </label>
                </div>
            </div>
        </form>
        <form class="mb-8">
            <p class="text-sm text-gray-600 mb-4">Please be careful. This action cannot be undone.</p>
            <a class="inline-block rounded-sm border border-red-600 bg-red-600 px-12 py-3 text-sm font-medium text-white hover:bg-red-500" href="#">
                Delete Account
            </a>
        </form>
    </div>
</x-layouts.layout>