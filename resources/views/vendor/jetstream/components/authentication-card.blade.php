<div class="bg-center bg-cover"
    style="background-image: url('/images/scraper.jpg');">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center py-6 bg-gray-900 bg-opacity-50 backdrop-blur-sm">
        <div class="absolute top-0 w-full h-16 flex justify-end pr-2 pt-2">
            <div x-data="{
                isDark: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
                toggleDark() {
                    this.isDark = !this.isDark;
                    if (this.isDark) {
                        document.documentElement.classList.add('dark');
                        localStorage.theme = 'dark';
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.theme = 'light';
                    }
                },
                init() {
                    if (this.isDark) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            }" x-init="init()">
                <button @click="toggleDark" x-bind:class="isDark ? 'justify-end' : 'justify-start'"
                    class="w-12 rounded-full inline-flex border border-gray-500 dark:border-gray-400 p-1 bg-gray-200 dark:bg-gray-600">
                    <svg :class="isDark ? 'block' : 'hidden'"
                        class="w-5 h-5 bg-gray-400 text-gray-800 rounded-full" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        <path d="M12 5l0 .01"></path>
                        <path d="M17 7l0 .01"></path>
                        <path d="M19 12l0 .01"></path>
                        <path d="M17 17l0 .01"></path>
                        <path d="M12 19l0 .01"></path>
                        <path d="M7 17l0 .01"></path>
                        <path d="M5 12l0 .01"></path>
                        <path d="M7 7l0 .01"></path>
                    </svg>
                    <svg :class="isDark ? 'hidden' : 'block'" class="w-5 h-5 bg-white text-gray-800 rounded-full"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" width="24" height="24"
                        stroke-width="2">
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="">
            {{ $logo }}
        </div>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>    
</div>
