<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
   </head>
   <body class="font-sans text-gray-900 antialiased">
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <a href="{{ url('/') }}" class="font-semibold text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Welcome</a>
            <a href="{{ route('login') }}" class="ml-4 font-semibold text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            <a href="{{ route('register') }}" class="ml-4 font-semibold  text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        </div>
      <div class="flex flex-row justify-between min-h-screen">
         <!-- Left side -->
         <div class="h-screen w-1/2 bg-black bg-opacity-40 flex justify-center items-center">
            <div class="p-6 lg:p-8">
               <div class="max-w-7xl mx-auto p-6 lg:p-8">
                  <header class="flex justify-between items-center">
                     <h1 class="transition ease-in-out delay-150 font-semibold text-8xl  text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        TEMPLATE-ERP
                     </h1>
                  </header>
                  <main class="mt-8">
                     <h2 class="font-bold text-3xl  text-white">
                        Streamline your business operations with TEMPLATE-ERP
                     </h2>
                     <p class="mt-4  text-white  ">
                        TEMPLATE-ERP is a cloud-based ERP solution that helps businesses of all sizes automate and streamline their operations. With TEMPLATE-ERP, you can manage your finances, inventory, CRM, and more from a single platform.
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
         </div>
         <!-- Right side -->
         <div class="h-screen w-1/2">
            <div  class="min-h-screen flex flex-col sm:justify-center items-end sm:pt-0  pr-60 pb-15">
               <div class="w-full sm:max-w-md mt-6 px-12 pt-6 pb-24 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg bg-opacity-90">
                  <div class="max-w-7xl mx-auto p-6 lg:p-8">
                     <div class="flex justify-center">
                        <h1 class="transition ease-in-out delay-150 font-semibold text-4xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> TEMPLATE-ERP </h1>
                     </div>
                  </div>
                  {{ $slot }}
               </div>
            </div>
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
      position: relative; /* Add relative positioning */
      }
      /* Add a pseudo-element for the overlay */
      body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value (0.5) for darkness */
      z-index: -1; /* Place the overlay behind the background image */
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
