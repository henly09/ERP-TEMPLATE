<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

        <!-- Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

        <!-- Personal Imports -->
        <!-- App favicon -->
        <!-- System Icon -->
        <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }} "> 
        <!-- Plugins css -->
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/datatables/select.bootstrap4.css') }}" rel="stylesheet" />
        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }} " rel="stylesheet" />
        <link href="{{ asset('css/icons.min.css') }} " rel="stylesheet" />
        <link href="{{ asset('css/theme.min.css') }} " rel="stylesheet" />

        <script src="{{ asset('js/jquery.min.js') }} "></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
        <script src="{{ asset('js/metismenu.min.js') }} "></script>
        <script src="{{ asset('js/waves.js') }} "></script>
        <script src="{{ asset('js/simplebar.min.js') }} "></script>
        <script src="{{ asset('js/jquery.inputmask.min.js') }} "></script>
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
        
        <!-- Morris Js-->
        <script src="{{ asset('plugins/morris-js/morris.min.js') }}"></script>
        <!-- Raphael Js-->
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>

        <!-- Morris Custom Js-->
        <script src="{{ asset('/pages/dashboard-demo.js') }}"></script>



        <!-- Scripts -->
        @vite([
            'resources/css/app.css', 
            'resources/js/app.js'])  

        <!-- My JS Swal Script -->
        <script src="{{ asset('js/swal.js') }}"></script>

    </head>
    <body class="font-sans antialiased">
        @include('layouts.navigation')
    </body>

</html>
