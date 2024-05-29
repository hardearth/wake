@extends('layouts.educrat')
@section('content')

    <section class="masthead -type-1 bg-header-index js-mouse-move-container">
        <div class="masthead__bg">
        </div>

        <div class="container">
            <div data-anim-wrap class="row y-gap-50 justify-between items-end">
                <div class="col-xl-6 col-lg-6 col-sm-10 order-2 order-sm-1">
                    <div class="masthead__content">
                        <h1 data-anim-child="slide-up " class="masthead__title uppercase">
                            {{__('Educación del futuro')}}
                        </h1>
                        <h1 data-anim-child="slide-up" class="masthead__title uppercase">
                        <span class=" underlines">{{__('En el ahora')}}</span>
                        </h1>

                        <p data-anim-child="slide-up delay-1" class="masthead__text text-24">
                            {{__('¿Quieres transformar tu vida? Descubre cómo con nuestros programas innovadores y comienza GRATIS hoy mismo')}}.

                        </p>
                        <div data-anim-child="slide-up delay-2" class="masthead__buttons row x-gap-10 y-gap-10">
                            <div class="col-12 col-sm-auto">
                                @if(Auth::check())
                                    <a data-barba href="{{route('public.courses')}}"
                                       class="button -sm -purple-2 text-white text-18">{{__('Ver cursos')}}</a>
                                @else
                                    <a data-barba href="{{route('register')}}"
                                       class="button -sm -purple-2 text-white text-18">{{__('Registrarme Gratis')}}</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div data-anim-child="slide-up delay-5 " class="col-xl-6 col-lg-6 order-1 order-sm-2">
                    <div data-anim-child="slide-up delay-6" class="masthead__image relative" style="text-align:center;">
                        <img src="{{asset('assets/educrat/img/home/video-header.png')}}" alt="image">
                        <div class="absolute-full-center d-flex justify-center items-center">
                            <a href="https://youtu.be/yVbh2VYauCo"
                               class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery"
                               data-gallery="gallery1">
                                <div class="icon-play text-18"></div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="layout-pb-md courses-background">
        <div style="height: 150px; overflow: hidden; position:relative; z-index:1; margin-top:-130px ">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-97.35,165.30 C360.89,0.52 149.26,-3.44 533.01,140.63 L500.00,150.00 L175.22,182.08 Z"
                      style="stroke: none; fill: white;"></path>
            </svg>
        </div>
        <div class="row justify-center" style="margin-bottom: 50px !important;">
            <div class="col-md-8 desvanecido">
                @include('components.carousel')
            </div>
        </div>
        <div data-anim-wrap class="container mt-60">

            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h1 class="sectionTitle__title ">{{__('Tu camino hacia el éxito ')}}</h1>
                        <h1 class="sectionTitle__title mt-10">{{__(' comienza con un simple clic')}}</h1>
                        <h2 class="mt-25 section-launch font-color-purple">{{__('¡Prelanzamiento! finaliza en:')}}</h2>
                        <div class="mt-40">
                            <ul class="count-offert section-launch font-color-purple">
                                <li>30</li>
                                <li>14</li>
                                <li>50</li>
                                <li>10</li>
                            </ul>
                        </div>

                        <div class="text-center mt-30 button-membership">

                            @if(Auth::check())
                                <a data-barba href="{{route('public.courses')}}"
                                   class="button -md -purple-2 text-white">  {{__('VER CURSOS')}} </a>
                            @else
                                <a data-barba href="{{route('register')}}"
                                   class="button -md -purple-2 text-white">  {{__('QUIERO REGISTRARME')}} </a>
                            @endif
                        </div>
                <!-- <p class=" font-color-purple pt-15">
                    <span class="font-weight-500"> {{__('Por precio limitado')}} </span>
                </p> -->
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-5 offset-xl-1 col-lg-6 order-2">
                    <h3 class="text-35 lh-1 section-title "> {{__('¿Por qué WAKE?')}}</h3>
                    <p class="mt-20 text-18 text-justify">{{__('Te ayudamos a desarrollar habilidades y competencias en las áreas con más alta demanda en la actualidad, podrás interactuar con expertos que ya han transitado el camino y que te llevarán a través de la práctica a convertirte en un lider proactivo capaz de monetizar tu propio conocimiento, listo para enfrentar los desafíos de un mundo cambiante y en constante evolución. Además Wake academy Te da la oportunidad de obtener comisiones en usdt si decides promover nuestros programas educativos, dichas comisiones se pagan de manera automática, sin intermediarios, directamente a tu billetera virtual')}}
                        .</p>
                        <br>
                        <a data-barba href="#" class="button -md -purple-2 text-white">  {{__('APRENDE COMO HACERLO')}} </a>


                </div>

                <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 order-1">
                    <img class="w-1/1 br-8" src="{{asset('assets/educrat/img/home/why-wake.jpg')}}" alt="image"
                         style="height: 300px;">
                </div>
            </div>
        </div>
    </section>

    <!--
    <section class="layout-pt-lg layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-15 justify-between items-center">
                <div class="col-lg-6">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{{__('Cursos populares')}}</h2>

                        <p class="sectionTitle__text ">{{__('Más de 10,000 alumnos inscritos')}}</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 justify-center pt-50">

                @foreach($courses as $course)
        <div class="col-lg-4 col-md-6">
            <div data-anim-child="slide-up delay-1">

                <a href="{{route('public.course',$course->slug)}}"
                               class="coursesCard -type-1 -hover-shadow border-light rounded-8">
                                <div class="relative">
                                    <div class="coursesCard__image overflow-hidden rounded-top-8">

                                        @if($course->image)
            <img src="{{$course->course_src_image}}" alt="image" style="">

        @else
            <img class="w-1/1"
                 src="{{asset('assets/educrat/img/home/cursos/trading.jpg')}}"
                                                 alt="image">

        @endif
        <div class="coursesCard__image_overlay rounded-top-8"></div>
    </div>
    <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">
        <div>
            <div class="px-15 rounded-200 bg-dark-1">
                <span class="text-11 lh-1 uppercase fw-500 text-white">{{__('Popular')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="h-100 pt-15 pb-10 px-20">
                                    <div class="d-flex items-center">
                                        <div class="text-14 lh-1 text-yellow-1 mr-10">4.5</div>
                                        <div class="d-flex x-gap-5 items-center">
                                            <div class="icon-star text-9 text-yellow-1"></div>
                                            <div class="icon-star text-9 text-yellow-1"></div>
                                            <div class="icon-star text-9 text-yellow-1"></div>
                                            <div class="icon-star text-9 text-yellow-1"></div>
                                            <div class="icon-star text-9 text-yellow-1"></div>
                                        </div>
                                        <div class="text-13 lh-1 ml-10">(1991)</div>
                                    </div>

                                    <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{__($course->name)}}</div>

                                    <div class="d-flex x-gap-10 items-center pt-10">

                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="assets/educrat/img/coursesCards/icons/1.svg" alt="icon">
                                            </div>
                                            <div
                                                class="text-14 lh-1">{{$course->modules->count()}} {{__('modulos')}}</div>
                                        </div>

                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="assets/educrat/img/coursesCards/icons/2.svg" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{{$course->duration_label}}</div>
                                        </div>

                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="assets/educrat/img/coursesCards/icons/3.svg" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{{$course->level}}</div>
                                        </div>

                                    </div>

                                    <div class="coursesCard-footer">
                                        <div class="coursesCard-footer__author">
                                            @if($course->teacher?->detail?->img_profile)
            <img class="size-50 img-ratio-2"
                 src="{{$course->teacher->detail->profile_src_image}}"
                                                     alt="image" style="border-radius: 50px">

        @else
            <img src="assets/educrat/img/general/avatar-1.png" alt="image">

        @endif
        <div>{{$course->teacher->name}}</div>
                                        </div>

                                        <div class="coursesCard-footer__price">
                                            <div>${{number_format($course->price+60,2)}}</div>
                                            <div>${{number_format($course->price,2)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>

    @endforeach
    </div>

    <div class="row justify-center pt-60 lg:pt-40">
        <div class="col-auto">
            <a href="{{route('public.courses')}}" class="button -md -outline-dark-1 text-dark-1">
                        {{__('Ver todos los cursos')}}
    </a>
</div>
</div>
</div>
</section> -->

    <section class="layout-pt-lg layout-pb-lg">
        <div class="container">
            <div class="row pb-30 justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title ">{{__('Beneficios')}}</h2>
                    </div>
                </div>
            </div>

            <div data-anim-wrap class="pt-60 lg:pt-50">
                <div class="overflow-hidden js-section-slider" data-loop data-pagination
                     data-slider-cols="xl-4 lg-4 md-3 sm-3">
                    <div class="beneficios-slider swiper-wrapper ">
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/vanguardia.png')}}" alt="icon">
                                </div>
                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Contenido de Vanguardia')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Nuestros programas educativos están diseñados para aprender de las últimas tendencias y como aplicarlas en el mundo real')}}
                                        .</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/aprendes.png')}}" alt="icon">
                                </div>

                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Gana mientras aprendes')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Conviértete en un promotor Wake y obten comisiones por ventas en automático, sin intermediario, directo a tu billetera virtual')}}
                                        .</p>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/acceso.png')}}" alt="icon">
                                </div>

                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Acceso 24/7')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Estudia a tu propio ritmo. Accede a nuestro campus virtual desde cualquier parte del mundo, plataforma intuitiva y fácil de usar')}}
                                        .</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/actualizacion.png')}}" alt="icon">
                                </div>

                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Actualización Constante')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Mantente al día con las últimas tendencias y avances tecnológicos. Nuestros programas se actualizan regularmente para brindarte el mejor conocimiento y habilidades.')}}
                                        .</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/mentores.png')}}" alt="icon">
                                </div>

                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Mentores Expertos')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Conéctate con líderes expertos en cada área a través de sesiones de mentoría en línea que te ayudarán a alcanzar tus metas y poner en práctica tu conocimiento')}}
                                        .</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/exclusivo.png')}}" alt="icon">
                                </div>

                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Acceso a material exclusivos')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Biblioteca de recursos, libros electrónicos, audios y material de apoyo para enriquecer tu experiencia de aprendizaje y profundizar en los temas de tu interés')}}
                                        .</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/eventos.png')}}" alt="icon">
                                </div>

                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Eventos de alto nivel')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Accede a conferencias, bootcamp, webinars y talleres exclusivos con expertos que te mantendrán inspirado y avanzando hacia tu futuro deseado')}}
                                        .</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-100">
                            <div class="coursesCard -type-3 text-center">
                                <div class="">
                                    <img src="{{asset('assets/educrat/img/home/icons/cripto.png')}}" alt="icon">
                                </div>

                                <div class="coursesCard__content mt-30">
                                    <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Pagos con criptomoneda')}}</h5>
                                    <p class="coursesCard__text text-17 mt-10">{{__('Podrás acceder a nuestros programas educativos pagando con criptomonedas. Creemos en la decentralización y lo vemos como una alternativa para salir del sistema tradicionall')}}
                                        .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
                        <div class="col-auto">
                            <div class="pagination -arrows js-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--
    <section class="layout-pt-lg layout-pb-lg">
        <div data-anim-wrap class="container">


          <div class="row y-gap-30 justify-between pt-60 lg:pt-50">

            <div class="col-lg-3 col-md-6">
              <div class="coursesCard -type-3 text-center">
                <div class="">
                  <img src="{{asset('assets/educrat/img/home/icons/earth.png')}}" alt="icon">
                </div>

                <div class="coursesCard__content mt-30">
                  <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Contenido Interactivo')}}</h5>
                  <p class="coursesCard__text text-17 mt-10">{{__('Todo el contenido de nuestros cursos es totalmente  inteligente e interactivo')}}.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="coursesCard -type-3 text-center">
                <div class="">
                  <img src="{{asset('assets/educrat/img/home/icons/touch.png')}}" alt="icon">
                </div>

                <div class="coursesCard__content mt-30">
                  <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Acceso Mundial')}}</h5>
                  <p class="coursesCard__text text-17 mt-10">{{__('Podras acceder a nuestra plataforma de cursos desde cualquier parte del mundo')}}.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="coursesCard -type-3 text-center">
                <div class="">
                  <img src="{{asset('assets/educrat/img/home/icons/cryptocurrency.png')}}" alt="icon">
                </div>

                <div class="coursesCard__content mt-30">
                  <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Paga con Crypto')}}</h5>
                  <p class="coursesCard__text text-17 mt-10">{{__('Puedes realizar todos los pagos con tu crypto moneda preferida')}}.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="coursesCard -type-3 text-center">
                <div class="">
                  <img src="{{asset('assets/educrat/img/home/icons/certificate.png')}}" alt="icon">
                </div>

                <div class="coursesCard__content mt-30">
                  <h5 class="coursesCard__title text-22 lh-1 fw-500">{{__('Certificación Incluida')}}</h5>
                  <p class="coursesCard__text text-17 mt-10">{{__('Obten certificaciónes en tus cursos, con nuestra tecnologia de contratos inteligentes')}}.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section> -->

    <section class="layout-pt-md layout-pb-md mb-90 section-bg">
        <div class="section-bg__item bg-blue-1">

        </div>

        <div class="container">
            <div class="row  ">
                <div class=" col-lg-7 ">
                <div class="section-bg__item">
                       <img class="img-full rounded-16" src="{{asset('assets/educrat/img/home/join-to-family.png')}}" alt="image">
                </div>
                    <div class="sectionTitle -light">

                        <h2 class="sectionTitle__title ">{{__('Unete a la familia WAKE')}}</h2>

                        <p class="sectionTitle__text ">{{__('Cientos de personas como tú ya están experimentando un cambio significativo en sus vidas. ¿Cómo lo hacen? A través de una educación que va más allá de lo tradicional, abrazando las oportunidades del futuro')}}.</p>

                    </div>

                </div>

                <div class="col-lg-4 ">
                    <div class="sectionTitle -light">
                        <div class="students-active justify-center">
                            <ul class="text-white">
                                <li><span class="text-50 fw-700">+ 1000</span></li>
                                <li><span class="  pl-10" style="    display: inline-block;"> <p
                                            class="text-18"> {{__('ESTUDIANTES')}} </p> <p
                                            class="text-20">{{__('ACTIVOS')}}</p></span></li>
                            </ul>
                        </div>

                        <div>
                            @if(Auth::check())
                                <a data-barba href="{{route('public.courses')}}"
                                   class="button -sm -purple-2 text-white text-18">{{__('Ver cursos')}}</a>
                            @else
                                <a data-barba href="{{route('register')}}"
                                   class="button -sm -purple-2 text-white text-18">{{__('Registrate Gratis')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-lg layout-pb-lg ">
        <div data-anim-wrap class="container">
            <div data-anim-child="slide-left delay-1" class="row y-gap-20 justify-between items-center">
                <div class="col-lg-12">

                    <div class="sectionTitle text-center ">
                        <h2 class="sectionTitle__title ">{{__('Testimonios')}} </h2>
                    </div>
                </div>
            </div>

            <div class="pt-60 lg:pt-40">
                <div class="overflow-hidden js-section-slider" data-gap="30" data-loop data-pagination
                     data-slider-cols="xl-3 lg-3 md-2 sm-1 base-1">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="eventCard -type-3 bg-light-4 rounded-8 mb-30">
                                <div class="eventCard__date">
                                    <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="">
                                </div>

                                <h4 class="eventCard__title text-14 lh-15 fw-500">{{__('Recientemente me inscribí en un curso en la plataforma educativa y estoy muy contento con la experiencia. Pero lo que realmente me sorprendió y agradó fue la opción de pagar en criptomonedas')}} </h4>

                                <div class="eventCard__button">
                                    <div class="row x-gap-20 y-gap-20 items-center  pt-15">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/educrat/img/testimonials/1.png')}}" alt="image">
                                        </div>

                                        <div class="col-auto text-white">
                                            <div class="lh-12 fw-500 ">{{__('Nombre y apellido')}} </div>
                                            <div class="text-13 lh-1 mt-5">{{__('Profesión')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="eventCard -type-3 bg-light-4 rounded-8 mb-30">
                                <div class="eventCard__date">
                                    <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="">
                                </div>

                                <h4 class="eventCard__title text-14 lh-15 fw-500">{{__('Recientemente comencé a usar la plataforma educativa y en general ha sido una experiencia positiva. Me encanta la flexibilidad de poder aprender a mi propio ritmo. Además, la calidad de los instructores y los materiales es excelente')}}
                                    . </h4>

                                <div class="eventCard__button">
                                    <div class="row x-gap-20 y-gap-20 items-center  pt-15">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/educrat/img/testimonials/1.png')}}" alt="image">
                                        </div>

                                        <div class="col-auto text-white">
                                            <div class="lh-12 fw-500 ">{{__('Nombre y apellido')}} </div>
                                            <div class="text-13 lh-1 mt-5">{{__('Profesión')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="eventCard -type-3 bg-light-4 rounded-8 mb-30">
                                <div class="eventCard__date">
                                    <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="">
                                </div>

                                <h4 class="eventCard__title text-14 lh-15 fw-500">{{__('Recientemente descubrí la plataforma educativa y desde entonces ha sido una experiencia increíble. Estoy sorprendido por la calidad de los cursos y los instructores altamente capacitados que siempre están dispuestos apoyarnos y aclarar dudas')}}
                                    . </h4>

                                <div class="eventCard__button">
                                    <div class="row x-gap-20 y-gap-20 items-center  pt-15">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/educrat/img/testimonials/1.png')}}" alt="image">
                                        </div>

                                        <div class="col-auto text-white">
                                            <div class="lh-12 fw-500 ">{{__('Nombre y apellido')}} </div>
                                            <div class="text-13 lh-1 mt-5">{{__('Profesión')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="eventCard -type-3 bg-light-4 rounded-8 mb-30">
                                <div class="eventCard__date">
                                    <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="">
                                </div>

                                <h4 class="eventCard__title text-14 lh-15 fw-500">{{__('Me encanta la flexibilidad de poder aprender a mi propio ritmo y en cualquier momento, lo que me permite adaptar mi formación a mi horario ocupado. Además, la comunidad de aprendices es realmente inspiradora y es genial ver a otros compartir sus conocimientos y apoyarse mutuamente')}}
                                    . </h4>

                                <div class="eventCard__button">
                                    <div class="row x-gap-20 y-gap-20 items-center  pt-15">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/educrat/img/testimonials/1.png')}}" alt="image">
                                        </div>

                                        <div class="col-auto text-white">
                                            <div class="lh-12 fw-500 ">{{__('Nombre y apellido')}} </div>
                                            <div class="text-13 lh-1 mt-5">{{__('Profesión')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="eventCard -type-3 bg-light-4 rounded-8 mb-30">
                                <div class="eventCard__date">
                                    <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="">
                                </div>

                                <h4 class="eventCard__title text-14 lh-15 fw-500">{{__('Desde que he comenzado a utilizar la plataforma, he adquirido nuevas habilidades y conocimientos que me han ayudado en mi carrera y en mi vida diaria. Estoy muy agradecido por esta experiencia y la recomendaría encarecidamente a cualquiera que busque una manera conveniente y efectiva de aprender y crecer')}}
                                    . </h4>

                                <div class="eventCard__button">
                                    <div class="row x-gap-20 y-gap-20 items-center  pt-15">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/educrat/img/testimonials/1.png')}}" alt="image">
                                        </div>

                                        <div class="col-auto text-white">
                                            <div class="lh-12 fw-500 ">{{__('Nombre y apellido')}} </div>
                                            <div class="text-13 lh-1 mt-5">{{__('Profesión')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="eventCard -type-3 bg-light-4 rounded-8 mb-30">
                                <div class="eventCard__date">
                                    <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="">
                                </div>

                                <h4 class="eventCard__title text-14 lh-15 fw-500">{{__('Tomé el curso de trading en la plataforma educativa y mi experiencia ha sido increíble. Desde el primer momento, me sentí en buenas manos con la instructora altamente capacitada y con una gran pasión por el trading. Aprendí conceptos claves y estrategias efectivas que he podido aplicar de inmediato en mi propio trading')}}
                                    . </h4>

                                <div class="eventCard__button">
                                    <div class="row x-gap-20 y-gap-20 items-center  pt-15">
                                        <div class="col-auto">
                                            <img src="{{asset('assets/educrat/img/testimonials/1.png')}}" alt="image">
                                        </div>

                                        <div class="col-auto text-white">
                                            <div class="lh-12 fw-500 ">{{__('Nombre y apellido')}} </div>
                                            <div class="text-13 lh-1 mt-5">{{__('Profesión')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-left-hover js-prev">
                                <i class="icon icon-arrow-left"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <div class="pagination -arrows js-pagination"></div>
                        </div>
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-right-hover js-next">
                                <i class="icon icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-lg layout-pb-lg mt-90 mb-90 section-bg">
        <div class="section-bg__item">
            <img class="img-full rounded-16" src="{{asset('assets/educrat/img/home/emprender-bg.png')}}" alt="image">

        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-12 col-lg-6 col-md-11">

                    <div class="sectionTitle -light mb-30">

                        <h2 class="sectionTitle__title pb-20">{{__('¿Te Gustaría Emprender?')}}</h2>

                        <p class="sectionTitle__text text-24">{{__('En wake además de todas las habilidades que desarrollas con nuestros programas formativos, podrás generar comisiones hasta del 60% si decides convertirte en un Waker (distribuidor autorizado). Estás comisiones se pagan de manera inmediata y en automático.')}}</p>
                    </div>
                    <div class="text-center">
                        <a data-barba href="signup.html"
                           class="button -purple-2 -sm text-white text-18">{{__('Aprende como')}}</a>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <section class="layout-pt-md layout-pb-md bg-light-4">
        <div class="container">
            <div class="row y-gap-15 justify-between items-end">
                <div class="sectionTitle text-center ">
                    <h2 class="sectionTitle__title ">{{__('Conoce a nuestros pioneros')}} </h2>
                </div>
            </div>
            <div class="pt-60 lg:pt-40 js-section-slider" data-gap="30" data-pagination="js-students-slider-pagination"
                 data-nav-prev="js-students-slider-prev" data-nav-next="js-students-slider-next"
                 data-slider-cols="xl-4 lg-3 md-2">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="teamCard -type-2 bg-white">
                            <div class="teamCard__content">
                                <div class="teamCard__img">
                                    <img src="{{asset('assets/educrat/img/home/founders/jefrey.png')}}" alt="image">
                                </div>
                                <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12">Jeffrey Camilo Ruales</h4>
                                <div class="teamCard__subtitle text-14 lh-1 mt-5">Emprendedor Digital</div>

                                <div class="teamCard__socials d-flex x-gap-20 pt-12">
                                    <a href="#">
                                        <i class="icon icon-facebook"></i>
                                    </a>
                                    <a href="https://www.instagram.com/jeffreycamilo7/ jefrey">
                                        <i class="icon icon-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon icon-twitter"></i>
                                    </a>
                                </div>

                                <div class="teamCard-tags pt-20">
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Marketing</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Emprededor</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Lanzamientos digitales</div>
                                    </div>
                                </div>

                                <div class="teamCard__button mt-20">
                                    <a href="#" class="button -icon -outline-purple-1 -rounded text-purple-1">
                                        Contactar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="teamCard -type-2 bg-white">
                            <div class="teamCard__content">
                                <div class="teamCard__img">
                                    <img src="{{asset('assets/educrat/img/home/founders/juanfer.png')}}" alt="image">
                                </div>
                                <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12">Juanfer Oliveira</h4>
                                <div class="teamCard__subtitle text-14 lh-1 mt-5">Director de marketing</div>

                                <div class="teamCard__socials d-flex x-gap-20 pt-12">
                                    <a href="#">
                                        <i class="icon icon-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon icon-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon icon-twitter"></i>
                                    </a>
                                </div>

                                <div class="teamCard-tags pt-20">
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Estratega digital</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Conferencista</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Educador</div>
                                    </div>
                                </div>

                                <div class="teamCard__button mt-20">
                                    <a href="#" class="button -icon -outline-purple-1 -rounded text-purple-1">
                                        Contactar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="swiper-slide">
                        <div class="teamCard -type-2 bg-white">
                            <div class="teamCard__content">
                                <div class="teamCard__img">
                                    <img src="{{asset('assets/educrat/img/home/founders/camilo.png')}}" alt="image">
                                </div>

                                <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12">Camilo Fonseca</h4>
                                <div class="teamCard__subtitle text-14 lh-1 mt-5">Inversionista</div>

                                <div class="teamCard__socials d-flex x-gap-20 pt-12">
                                    <a href="#">
                                        <i class="icon icon-facebook"></i>
                                    </a>
                                    <a href="https://www.instagram.com/camilofonsecaleon/">
                                        <i class="icon icon-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon icon-twitter"></i>
                                    </a>
                                </div>

                                <div class="teamCard-tags pt-20">
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Conferencista</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Empresario</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Master coach</div>
                                    </div>
                                </div>

                                <div class="teamCard__button mt-20">
                                    <a href="#" class="button -icon -outline-purple-1 -rounded text-purple-1">
                                        Contactar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="teamCard -type-2 bg-white">
                            <div class="teamCard__content">
                                <div class="teamCard__img">
                                    <img src="{{asset('assets/educrat/img/home/founders/frank.png')}}" alt="image">
                                </div>

                                <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12">Frank</h4>
                                <div class="teamCard__subtitle text-14 lh-1 mt-5">Experto en criptomonedas</div>

                                <div class="teamCard__socials d-flex x-gap-20 pt-12">
                                    <a href="#">
                                        <i class="icon icon-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon icon-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="icon icon-twitter"></i>
                                    </a>
                                </div>

                                <div class="teamCard-tags pt-20">
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Educador</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Innovador</div>
                                    </div>
                                    <div class="teamCard-tags__item">
                                        <div class="teamCard-tags__tag">Experto en blockchain</div>
                                    </div>
                                </div>

                                <div class="teamCard__button mt-20">
                                    <a href="#" class="button -icon -outline-purple-1 -rounded text-purple-1">
                                        Contactar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
<!--
            <div class="d-flex justify-center x-gap-15 items-center pt-60">
                <div class="col-auto">
                    <div class="d-flex x-gap-15 justify-center items-center">
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-left-hover js-students-slider-prev">
                                <i class="icon icon-arrow-left"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <div class="pagination -arrows js-students-slider-pagination"></div>
                        </div>
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-right-hover js-students-slider-next">
                                <i class="icon icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div data-anim-child="slide-left delay-1" class="row y-gap-20 justify-between items-center">
                <div class="col-lg-6">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{{__('Próximos eventos')}}</h2>

                        <p class="sectionTitle__text "> {{__('Todos nuestros eventos son gratuitos, Inscribete!')}}.</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 pt-50">

                @foreach($activities->take(2) as $key => $activity)
                    @if(in_array($key,[0,1]))
                        @php($activities->forget($key))
                        <div class="col-lg-4 col-md-6">
                            <div data-anim-child="slide-left delay-{{$key}}" class="blogCard -type-1">
                                <div class="blogCard__image">
                                    <img src="{{asset("/storage/images/$activity->featured_image")}}" alt="image">
                                </div>
                                <div class="blogCard__content">
                                    <a href="#" class="blogCard__category">{{$activity->category->name}}</a>
                                    <h4 class="blogCard__title">
                                        <a href="{{route('public.event',$activity)}}">{{$activity->name}}</a>
                                    </h4>
                                    <div class="blogCard__date">{{$activity->date->translatedFormat('F d, Y')}}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="col-lg-4">
                    <div class="row y-gap-30">
                        @foreach($activities as $key => $activity)
                            @if(!in_array($key,[0,1]))
                                <div class="col-lg-12 col-md-6">
                                    <a href="#" data-anim-child="slide-left delay-{{$key}}" class="eventCard -type-4">
                                        <div class="eventCard__date bg-light-7 mr-20">
                                          <span
                                              class="text-30 lh-1 fw-700">{{$activity->date->translatedFormat('d')}}</span>
                                            <span
                                                class="text-18 lh-1 fw-500 uppercase mt-10">{{$activity->date->translatedFormat('F')}}</span>
                                        </div>
                                        <div class="eventCard__content">
                                            <div
                                                class="text-13 lh-1 fw-500 uppercase text-purple-1">{{$activity->category->name}}</div>
                                            <h4 class="text-17 lh-15 fw-500 mt-10">{{$activity->name}}</h4>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div style="height: 150px; overflow: hidden; margin-bottom: -220px;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C159.99,148.53 341.70,145.56 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                      style="stroke: none; fill: white;">
                </path>
            </svg>
        </div>
    </section>


    <script>
        var swiper = new Swiper(".swiper-container", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            //   autoplay: {
            //   delay: 3000
            // },
            loop: true,
            centeredSlides: true,
            initialSlide: 2,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 50,
                modifier: 5,
                initialSlide: 3,
                slideShadows: true
            }

            // ,

            // pagination: {
            //   el: ".swiper-pagination",
            //    clickable: true
            // }
        });
    </script>

<script>
    var swiper = new Swiper(".beneficios-slider", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        autoplayTimeLeft(s, time, progress) {
          progressCircle.style.setProperty("--progress", 1 - progress);
          progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
      }
    });
  </script>











@endsection
