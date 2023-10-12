<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
      <!-- Awesome Icons -->
      <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
      <!-- Styles -->
      @vite([
      'resources/css/app.css', 
      'resources/js/app.js'])
   </head>
   <body class="antialiased">
      <div style="background-color: rgba(1, 0, 0, 0.8);" class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
         @if (Route::has('login'))
         <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="font-semibold text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold  text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
         </div>
         @endif
         <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <header class="flex justify-between items-center">
               <h1 class="transition ease-in-out delay-150 font-semibold text-9xl  text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                  DAHLIA-CB-ERP
               </h1>
            </header>
            <main class="mt-8">
               <h2 class="font-bold text-3xl  text-white">
                  Streamline your business operations with DAHLIA-CB-ERP
               </h2>
               <p class="mt-4  text-white  ">
                  DAHLIA-CB-ERP is a cloud-based ERP solution that helps businesses of all sizes automate and streamline their operations. With DAHLIA-CB-ERP, you can manage your finances, inventory, CRM, and more from a single platform.
               </p>
               <div class="mt-8 flex flex-wrap justify-center">
                  <a href="" class="btn btn-primary text-white">
                  Get started for free
                  </a>
                  &nbsp ,
                  <a href="" class="btn btn-secondary text-white">
                  See our pricing plans
                  </a>
               </div>
            </main>
         </div>
      </div>
   </body>
   <script>
      // Preload the images.
      const images = ["{{ asset('images/slideshow/handdesk.jpg') }}", "{{ asset('images/slideshow/lady2desk.jpg') }}", "{{ asset('images/slideshow/ladydesk.jpg') }}", "{{ asset('images/slideshow/teamdesk.jpg') }}"];
      
      const preloadImages = () => {
      images.forEach((image) => {
          const img = new Image();
          img.src = image;
      });
      };
      
      // Start the slideshow.
      const startSlideshow = () => {
      const slideshow = document.querySelector('body');
      slideshow.style.backgroundImage = `url(${images[0]})`;
      
      let i = 0;
      setInterval(() => {
          i = (i + 1) % images.length;
          slideshow.style.backgroundImage = `url(${images[i]})`;
      }, 2000);
      };
      
      // Call the preloadImages and startSlideshow functions.
      preloadImages();
      startSlideshow();
   </script>
   <style>
      body {
      background-size: cover;
      background-repeat: no-repeat;
      animation: slideshow 20s infinite;
      background-position: 0% 0%; /* Initial position */
      }
      @keyframes slideshow {
      0% {
      background-image: url("{{ asset('images/slideshow/handdesk.jpg') }}");
      background-position: 0% 0%;
      }
      25% {
      background-image: url("{{ asset('images/slideshow/lady2desk.jpg') }}");
      background-position: 100% 0%;
      }
      50% {
      background-image: url("{{ asset('images/slideshow/ladydesk.jpg') }}");
      background-position: 200% 0%;
      }
      75% {
      background-image: url("{{ asset('images/slideshow/teamdesk.jpg') }}");
      background-position: 300% 0%;
      }
      100% {
      background-image: url("{{ asset('images/slideshow/handdesk.jpg') }}");
      background-position: 400% 0%;
      }
      }
   </style>
</html>
