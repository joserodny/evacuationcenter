<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Evacuationcenter') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->
        <link rel="stylesheet" href="">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
   <!-- Page plugins -->
   <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  
       
    </head>
    <body class="{{ $class ?? '' }}">



        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


            @if (Auth::user()->role == "admin")
            @include('admin.sidebar.sidebar')
            @elseif (Auth::user()->role == "user")
            {{-- @include('volunteer.sidebar.sidebar') --}}
            @endif

        @endauth


        <div class="main-content">


            
            @auth()
            @if (Auth::user()->role == "admin")
            @include('admin.navbar.navbar')
            @elseif (Auth::user()->role == "user")
            @include('volunteer.navbar.navbar')
            @endif

        @endauth
            
            @yield('content')

           
         
           
        </div>

        
       


        <!-- Core -->
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
       
        <!-- Argon JS -->
        {{-- <script src="{{ asset('argon') }}/js/argon.min.js?v=1.0.0"></script> --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @stack('js')
        <script>
           (function() {
            $('.form-prevent-multiple-submits').on('submit', function() {
                $('.button-prevent-multiple-submits').attr('disabled', 'true');
            })
           })(); 
        </script>


         <!-- regex number only-->
     <script type="text/javascript">
        function numbers(input) {
            var regex = /[^0-9]/g;
            input.value = input.value.replace(regex, "");
            }
       </script>
      <!-- /regex number only-->
      <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    
        <!-- Optional JS -->
  <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    
    </body>
</html>
