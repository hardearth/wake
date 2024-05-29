<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/public.css', 'resources/js/public.js'])
    @vite('resources/js/app.jsx')
    @inertiaHead
    @yield('styles')

    <title>{{env('app_name')}}</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
<!-- preloader start -->
<div class="preloader js-preloader">
    <div class="preloader__bg"></div>
</div>
<main class="main-content  ">
    @include('layouts.partials.educrat.top_menu')
    @yield ('banner')
    <div class="content-wrapper  js-content-wrapper">
        @if(count($errors) > 0)

            <div style="position: absolute; top: 80px; right: 30px; z-index: 9999;">
                <div class="toast show">
                    <div class="toast-header">
                        <i class="ri-checkbox-blank-fill text-danger ml-3"></i>
                        &nbsp;
                        &nbsp;
                        <strong class="me-auto">

                            {{__('Error')}}
                        </strong>

                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        @foreach($errors->all() as $error)
                            <div>
                                {{$error}}
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        @endif
        @inertia
        @include('layouts.partials.educrat.footer')
    </div>
</main>

<!-- JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="{{asset('assets/educrat/js/vendors.js')}}"></script>
<script src="{{asset('assets/educrat/js/main.js')}}"></script>
<script src="{{asset('js/jquery-3.6.2/jquery.min.js')}}"></script>
</body>

</html>
