<div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
        <aside class="bg-gray-200 dark:bg-gray-700 w-64 min-h-screen flex flex-col relative" id="sidebar">
        <div class="py-4 text-center">
            <img src="{{ asset('images/dummylogo.png') }}" alt="Profile Picture" class="bg-white mx-auto h-24 w-24">
            <div class="text-white pt-5 text-xl">Companie's Name</div>
        </div>
        <!-- Sidebar content container -->
        <div class="flex flex-col flex-1">
            <!-- Sidebar content goes here -->
            <ul class="py-4 flex-1">
                <a href="{{ route('dashboard') }}">
                    <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-white">
                        <span class="text-white group-hover:text-black"> <i class="fa-solid fa-chart-line pr-3"></i> Dashboard</span>
                    </li>
                </a>
                <a href="{{ route('about') }}">
                    <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-white">
                        <span class="text-white group-hover:text-black"> <i class="fa-solid fa-circle-info pr-3"></i> About</span>
                    </li>
                </a>
                <a href="{{ route('services') }}">
                    <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-white">
                        <span class="text-white group-hover:text-black"> <i class="fa-solid fa-briefcase pr-3"></i> Services</span>
                    </li>
                </a>
                <a href="{{ route('contact') }}">
                    <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-white">
                        <span class="text-white group-hover:text-black"> <i class="fa-solid fa-phone pr-3"></i> Contact</span>
                    </li>
                </a>
            </ul>
        </div>

        <!-- Sidebar Footer (Fixed at Bottom) -->
        <div class="bg-gray-600 py-2 pt-5 pb-5 text-white text-center">
            &copy; 2023 Montera™
        </div>
    </aside>


        <div class="flex-1 flex flex-col relative" id="content">
        <!-- <button class="p-2 m-4 rounded-md absolute left-0 border-gray-800 text-gray-800 bg-gray-800 text-white" id="toggleButton">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button> -->
            @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
             <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                 <div class="flex justify-between items-center">
                {{ $header }}
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <img src="{{ asset('images/dummyuser.png') }}" alt="Profile Picture" class="mr-2 bg-white mx-auto h-10 w-10 rounded-full border-2 border-white">   
                                <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
                </header>
            @endif
            <div class="flex-1 flex flex-col justify-between">
                <!-- This container will be relatively centered on the bottom of the header -->
                <!-- Content below the header -->
                <main class="flex-1 overflow-y-auto">
                    {{ $slot }}
                </main>
        </div>
            </div>
        </div>


<script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById("toggleButton");
            const sidebar = document.getElementById("sidebar");
            const content = document.getElementById("content");

            toggleButton.addEventListener("click", function() {
                sidebar.classList.toggle("hidden");
                content.classList.toggle("w-full");
            });
        });

        function navigateTo(url) {
            window.location.href = url;
        }
</script>
    <style>
        /* Add transition properties for opacity and transform */
        #sidebar {
            transform: translateX(-100%);
            opacity: 0;
            transition: transform 1.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        #content.w-full {
            width: calc(100% - 64px); /* Adjust for sidebar width */
            transition: width 1.3s ease-in-out;
        }

        /* When the sidebar is visible, set opacity to 1 and reset the transform */
        #sidebar:not(.hidden) {
            transform: translateX(0);
            opacity: 1;
        }
    </style>