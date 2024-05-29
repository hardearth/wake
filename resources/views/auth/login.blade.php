<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="  crossorigin=""/>

    @vite(['resources/css/public.css', 'resources/js/public.js'])
    <title>{{env('app_name')}}</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
<!-- preloader start -->
<div class="preloader js-preloader">
    <div class="preloader__bg"></div>
</div>
<!-- preloader end -->


<main class="main-content  bg-beige-1">

@include('layouts.partials.educrat.top_menu')

    <div class="content-wrapper  js-content-wrapper">

        <section class="form-page js-mouse-move-container">
            <div class="form-page__content lg:py-50 auth-bg">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class=" md:px-25 md:py-25 auth-blue shadow-1 rounded-16 text-white" >
                                <h3 class="text-45 lh-13 text-white text-center fw-300">{{__('Iniciar Sesión')}}</h3>

                                <form class="contact-form respondForm__form row y-gap-20 pt-60 form-auth" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="col-12">
                                        <label class="text-24 lh-1  text-dark-1 mb-10">{{__('Correo')}}</label>
                                        <input type="email" placeholder="{{__('Ingresa tu correo')}}" name="email">
                                    </div>
                                    <div class="col-12">
                                        <label class="text-24 lh-1  text-dark-1 mb-10">{{__('Contraseña')}}</label>
                                        <div class="lost-password">
                                              <a class="text-20 text-center text-purple-1 " href="{{route('password.request')}}">Olvidaste tu contraseña?</a>
                                        </div>
                                        <input type="password" placeholder="{{__('Ingresa tu Contraseña')}}" name="password">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit" class="button -md -purple-2 text-white fw-500 w-1/1 text-24 ">
                                        {{__('Acceder')}}
                                        </button>
                                    </div>
                                </form>


                                <p class="mt-50 text-24 text-center">{{__('¿Aun no estas registrado?')}} <a href="{{route('register')}}" class="text-purple-1  -purple-2 text-white">{{__('Registrarse')}}</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</main>

<!-- JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="assets/educrat/js/vendors.js"></script>
<script src="assets/educrat/js/main.js"></script>
</body>

</html>
