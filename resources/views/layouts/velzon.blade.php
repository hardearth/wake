<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light"
      data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
<head>
    <meta charset="utf-8"/>
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/velzon/images/favicon.ico')}}">
    @vite(['resources/css/backoffice.css','resources/js/backoffice.js'])
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    @yield('styles')
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>
<body>
<div id="layout-wrapper">
    @include('layouts.partials.velzon.top_menu')
    @include('layouts.partials.velzon.left_menu')
    <div class="vertical-overlay"></div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (isset($header))
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">{{ $header }}</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
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
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © {{env('APP_NAME')}}.
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>

<script src="{{asset('js/jquery-3.6.2/jquery.js')}}"></script>
<script src="{{asset('assets/select2/js/select2.full.js')}}"></script>
<script src="{{asset('assets/velzon/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/velzon/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

@yield('scripts')
</body>

</html>
