<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="{{url('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    <script src="{{ mix('js/common.js') }}"></script>
    <script src="{{ mix('js/admin.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/components.css') }}" rel="stylesheet">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet"> {{-- TODO. OJO ACA QUE EL BASE ADMIN INFLUYE EN LOS COMPONENTES. Eventualmente tendremos que separarlo --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>

</head>
<body class="is-admin @yield('bodyclass')">

    <div id="page-container" class="sidebar-inverse side-overlay-hover side-scroll page-header-fixed22 main-content-boxed22 {!! getUserConfig('sidebar-locked')==1?'sidebar-o':'' !!} {!! getUserConfig('tree-locked')==1?'side-overlay-o':'' !!}">

        @auth

            {{-- @include('admin.master.floatbar') --}}

            @include('admin.master.sidebar')

            @include('admin.master.header')

        @endauth
            
        @if (session('success'))
            <!-- Success Alert --> 
            <div class="alert alert-success alert-dismissable" role="alert" style="margin: 25px 25px 0px 25px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-size-h4 font-w400">Perfecto!</h3>
                <p class="mb-0"> {{ session('success') }}</p>
            </div>            
            <!-- END Success Alert -->
        @endif
        @if (session('error'))
            <!-- Danger Alert -->        
            <div class="alert alert-danger alert-dismissable" role="alert" style="margin: 25px 25px 0px 25px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-size-h4 font-w400">Ups..</h3>
                <p class="mb-0">{{ session('error') }}</p>
            </div>        
            <!-- END Danger Alert -->
        @endif

        @yield('content')

        @include('admin.master.footer')

    </div>
    <!-- END Page Container -->

</body>
</html>

@yield('js')