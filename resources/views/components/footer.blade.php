<footer class="bg-gray-900 text-gray-300">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">

        <div class="grid gap-10 lg:grid-cols-5">
            {{-- LEFT --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3">
                    {{-- Logo (bisa ganti SVG / image) --}}
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600/20 text-indigo-400">
                        {{-- simple icon --}}
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                            <path d="M12 2c2.5 2 4 4.5 4 7.2 0 3.9-3.1 6.8-7 6.8H6.5c.7 1.8 2.5 3.3 5.3 3.3 2.5 0 4.3-1 6.2-2.9l1.5 1.6C17.3 20.3 14.9 22 11.8 22 6.9 22 3 18.2 3 13.5 3 8.4 6.8 4.2 12 2Zm1.2 2.9C9 6.2 6.6 9.4 6.6 13.1v.4H9c2.7 0 4.7-1.9 4.7-4.4 0-1.5-.2-2.8-.5-4.2Z"/>
                        </svg>
                    </div>

                    <span class="text-lg font-semibold text-white">GudangApp</span>
                </div>

                <p class="mt-4 max-w-md text-sm leading-6 text-gray-400">
                    Making the world a better place through constructing elegant hierarchies.
                </p>

                {{-- Social --}}
                <div class="mt-6 flex items-center gap-4">
                    <a href="#" class="text-gray-400 hover:text-white" aria-label="Facebook">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22 12a10 10 0 10-11.6 9.9v-7H8v-3h2.4V9.8c0-2.4 1.4-3.7 3.6-3.7 1 0 2.1.2 2.1.2v2.3H15c-1.2 0-1.6.8-1.6 1.5V12H16l-.4 3h-2.2v7A10 10 0 0022 12z"/>
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-white" aria-label="Instagram">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5zm10 2H7a3 3 0 00-3 3v10a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3zm-5 3.5A4.5 4.5 0 1112 16.5 4.5 4.5 0 0112 7.5zm0 2A2.5 2.5 0 1014.5 12 2.5 2.5 0 0012 9.5zM17.8 6.8a1 1 0 11-1 1 1 1 0 011-1z"/>
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-white" aria-label="X">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.9 2H22l-6.8 7.7L23 22h-6.6l-5.2-6.8L5 22H2l7.3-8.3L1 2h6.8l4.7 6.1L18.9 2zm-1.2 18h1.8L7 3.8H5L17.7 20z"/>
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-white" aria-label="GitHub">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2a10 10 0 00-3.2 19.5c.5.1.7-.2.7-.5v-1.8c-3 .7-3.6-1.3-3.6-1.3-.5-1.2-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.7 1.2 1.7 1.2 1 .1.8-1 .8-1 .8-1.5 2.1-1.1 2.6-.8.1-.7.3-1.1.6-1.4-2.4-.3-4.9-1.2-4.9-5.3 0-1.2.4-2.2 1.1-3-.1-.3-.5-1.4.1-2.9 0 0 .9-.3 3 .1a10.4 10.4 0 015.5 0c2.1-.4 3-.1 3-.1.6 1.5.2 2.6.1 2.9.7.8 1.1 1.8 1.1 3 0 4.1-2.5 5-4.9 5.3.4.3.7.9.7 1.9V21c0 .3.2.6.7.5A10 10 0 0012 2z"/>
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-white" aria-label="YouTube">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21.6 7.2a3 3 0 00-2.1-2.1C17.6 4.6 12 4.6 12 4.6s-5.6 0-7.5.5A3 3 0 002.4 7.2 31 31 0 002.1 12a31 31 0 00.3 4.8 3 3 0 002.1 2.1c1.9.5 7.5.5 7.5.5s5.6 0 7.5-.5a3 3 0 002.1-2.1A31 31 0 0021.9 12a31 31 0 00-.3-4.8zM10 15.5V8.5L16 12l-6 3.5z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- RIGHT COLUMNS --}}
            <div class="grid gap-10 sm:grid-cols-2 lg:col-span-3 lg:grid-cols-4">
                <div>
                    <h4 class="text-sm font-semibold text-white">Solutions</h4>
                    <ul class="mt-4 space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Marketing</a></li>
                        <li><a href="#" class="hover:text-white">Analytics</a></li>
                        <li><a href="#" class="hover:text-white">Automation</a></li>
                        <li><a href="#" class="hover:text-white">Commerce</a></li>
                        <li><a href="#" class="hover:text-white">Insights</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold text-white">Support</h4>
                    <ul class="mt-4 space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Submit ticket</a></li>
                        <li><a href="#" class="hover:text-white">Documentation</a></li>
                        <li><a href="#" class="hover:text-white">Guides</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold text-white">Company</h4>
                    <ul class="mt-4 space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">About</a></li>
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Jobs</a></li>
                        <li><a href="#" class="hover:text-white">Press</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-semibold text-white">Legal</h4>
                    <ul class="mt-4 space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Terms of service</a></li>
                        <li><a href="#" class="hover:text-white">Privacy policy</a></li>
                        <li><a href="#" class="hover:text-white">License</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- BOTTOM --}}
        <div class="mt-12 border-t border-white/10 pt-8 text-sm text-gray-400">
            © {{ date('Y') }} GudangApp, Inc. All rights reserved.
        </div>
    </div>
</footer>