<!-- Sidenav -->
<nav
   id="sidenav-2"
   class="fixed left-0 top-0 z-[1035] h-screen w-60 bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800"
   data-te-sidenav-init
   data-te-sidenav-hidden="false"
   data-te-sidenav-mode="side"
   data-te-sidenav-content="#content"
>
   <div class="pt-5 pb-5 text-center">
        <div style="background-image: url('{{ asset('images/footerbanner.jpeg') }}'); background-size: cover; position: fixed; top: 0; width: 100%;">
            <div class="py-3 px-4 text-white flex space-x-4 items-center">
                @if(Auth::user()->prof_pic)
                    <img style="object-fit: cover; height: 65px; width: 65px;" src="{{ asset('storage/profile_pictures/' . Auth::user()->prof_pic) }}" alt="Profile Picture" class="bg-white rounded-full border-2 border-white">
                @else
                    <img style="object-fit: cover; height: 65px; width: 75px;" src="{{ asset('images/dummyuser.png') }}" alt="Profile Picture" class="bg-white rounded-full border-2 border-white">
                @endif
                <div class="text-left">
                    <?php
                        $userName = Auth::user()->name;
                        $words = explode(' ', $userName);
                        $firstWord = reset($words);
                    ?>    
                    <div class="text-lg font-bold italic">Hello {{ $firstWord }}!</div>
                    @if(Auth::user()->email_verified_at)
                        <div class="text-sm">{{ Auth::user()->role }}</div>
                    @else
                    <div class="text-sm">Not Verified</div>
                    @endif
                    </div>
        </div>
    </div>
    <!-- Sidebar content container -->
    <div class="flex flex-col flex-1 mt-10">
        <!-- Sidebar content goes here -->
        <ul class="py-4 flex-1 text-left">
        @if(Auth::user()->email_verified_at)
            @auth
                @if(Auth::user()->role == "Admin")
                    <a href="{{ route('systemUsers.index') }}">
                        <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-red-900">
                            <span class="text-black group-hover:text-white text-lg"> <i class="fa-solid fa-screwdriver-wrench pr-3"></i></i> System's Users </span>
                        </li>
                    </a>
                    @elseif (Auth::user()->role == "User")
                    <a href="{{ route('dashboard') }}">
                        <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-red-900">
                            <span class="text-black group-hover:text-white text-lg"> <i class="fa-solid fa-chart-line pr-3"></i> Dashboard </span>
                        </li>
                    </a>
                    <a href="{{ route('customer.index') }}">
                        <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-red-900">
                            <span class="text-black group-hover:text-white text-lg"> <i class="fa-solid fa-cart-shopping pr-3"></i></i> Customers </span>
                        </li>
                    </a>
                    <a href="{{ route('vouchreq.index') }}">
                        <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-red-900">
                            <span class="text-black group-hover:text-white text-lg"> <i class="fa-regular fa-money-bill-1 pr-3"></i></i> Voucher Request </span>
                        </li>
                    </a>
                    <a href="{{ route('disbursement.index') }}">
                        <li class="px-6 py-2 group transition ease-in-out duration-300 hover:bg-red-900">
                            <span class="text-black group-hover:text-white text-lg"> <i class="fa-solid fa-magnifying-glass-dollar pr-3"></i> Disbursement </span>
                        </li>
                    </a>
                @endif
            @endauth
        @endif
        </ul>
    </div>

    <!-- Sidebar Footer (Fixed at Bottom) -->
    <div style="background-image: url('{{ asset('images/footerbanner.jpeg') }}'); background-size: cover; position: fixed; bottom: 0; width: 100%;">
        <div class="py-4 pt-3 pb-3 text-white text-center">
        <span class="text-lg font-bold italic">&copy; 2023 Dahlia CB™</span>
        </div>
    </div>
</nav>

<div class="flex-1 flex flex-col relative" id="content">
   @if (isset($header))
   <header class="bg-white dark:bg-gray-800 shadow relative shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)]">
    <div class="max-w-10xl mx-auto py-3 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="flex items-center"> <!-- Left side -->
            <button
                class="rounded pl-2 pr-4 py-3 text-xs font-medium"
                data-te-sidenav-toggle-ref
                data-te-target="#sidenav-2"
                aria-controls="#sidenav-2"
                aria-haspopup="true"
            >
                <span class="block [&>svg]:h-6 [&>svg]:w-6 text-gray-400">
                <i class="fa-solid fa-bars fa-2xl"></i>
                </span>
            </button>
            <div class="ml-20">
                {{ $header }}
            </div>
        </div>
        <div class="hidden sm:flex sm:items-center sm:ml-6"> <!-- Right side -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover-text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        @if(Auth::user()->prof_pic)
                            <img style="object-fit: cover;" src="{{ asset('storage/profile_pictures/' . Auth::user()->prof_pic) }}" alt="Profile Picture" class="bg-white mx-auto h-10 w-10 rounded-full border-2 border-white">
                        @else
                            <img style="object-fit: cover;" src="{{ asset('images/dummyuser.png') }}" alt="Profile Picture" class="bg-white mx-auto h-10 w-10 rounded-full border-2 border-white">
                        @endif
                        <div class="ml-2">{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        <i class="fa-solid fa-user pr-3" style="color: green"></i>{{ __('Profile') }}
                    </x-dropdown-link>
                                    <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket pr-3" style="color: red"></i>{{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                </x-slot>
            </x-dropdown>
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