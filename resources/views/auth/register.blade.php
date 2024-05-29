<!DOCTYPE html>
<html lang="en">

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

<main class="main-content bg-beige-1">
@include('layouts.partials.educrat.top_menu')

    <div class="content-wrapper  js-content-wrapper">

        <section class="form-page js-mouse-move-container">

            <div class="form-page__content lg:py-50 auth-bg">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-6 off-set-1 col-lg-9">
                            <div class="text-header-register">
                                <p class="title-register">{{__('Felicitaciones!')}}</p>
                                <p class="subtitle-register">{{__('Estás a un paso de ser parte del cambio')}}.</p>
                                <p class="title-register"> {{__('Registrate gratis!')}} </p>
                                <p  class="subtitle-register"> {{__('Y conoce todos los beneficios que tenemos para ti')}}.</p>
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-9">
                            <div class="px-50 py-50 md:px-25 md:py-25 shadow-1 rounded-16 auth-blue">
                                <h3 class="text-40 lh-13 text-white fw-300 text-center">{{__('Registrate')}}</h3>

                                <form class="form-auth contact-form respondForm__form row y-gap-20 pt-30 " method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-lg-12">
                                        <label class="text-24 lh-1 fw-500 mb-10">{{__('Nombre completo')}}</label>
                                        <input type="text" name="name" placeholder="{{__('Ingresa  tu nombre')}}" required>
                                        @error("name")
                                            <div class="error text-red-2">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="text-24 lh-1 fw-500 mb-10">{{__('Correo')}}</label>
                                        <input type="email" placeholder="{{__('Ingresa tu correo')}}" name="email">
                                        @error("email")
                                        <div class="error text-red-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="text-24 lh-1 fw-500 mb-10">{{__('Contraseña')}}</label>
                                        <input type="password" placeholder="{{__('Ingresa tu contraseña')}}" name="password" onpaste="return false" id="password-confirmation" aria-describedby="passwordInput" v-model="form.password_confirmation" required autocomplete="new-password">
                                        @error("password")
                                        <div class="error text-red-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="text-24 lh-1 fw-500 mb-10">{{__('Confirmar contraseña')}}</label>
                                        <input type="password" name="password_confirmation" onpaste="return false" placeholder="{{__('Repite la contraseña')}}" id="password-confirmation" aria-describedby="passwordInput"  v-model="form.password_confirmation" required autocomplete="new-password">
                                        @error("password_confirmation")
                                        <div class="error text-red-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="terms">{{Form::checkbox('terms',1,null,['class'=>'','id'=>'terms','required'=>'required'])}} {{__('Acepta terminos y condiciones')}}</label><a href="{{asset('pdf_blanco.pdf')}}" target="_blank"> &nbsp;<i class="fa-regular fa-file-pdf fa-2x text-white"></i></a>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit" class="button -md -purple-2 text-white fw-500 w-1/1 text-24 mt-20">
                                                {{__('Registrate')}}
                                        </button>
                                    </div>
                                         <p class="mt-10 text-white text-18 text-center">{{__('¿Ya posees cuenta?')}} <a href="{{route('login')}}" class="text-purple-1"> {{__('Ingresa')}}</a></p>
                                </form>
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
