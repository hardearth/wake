@extends('layouts.educrat_user')
@section('content')
    {{-- Robert
    Esta validacion indica si tiene alguna compra --}}
    @if(Auth::user()->bills->count())
        <!-- {{__('Tiene compras')}} -->
    @endif
    {{-- Robert --}}

    <section data-anim-wrap class="masthead -type-7 js-mouse-move-container">
        <div class="masthead__bg bg-blue-1 rounded-16">
            <img src="{{asset('assets/educrat/img/home-9/hero/bg.png')}}" alt="image">
        </div>

        <div class="container">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="masthead__content">
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white">
                            {{__('Inicia tus estudios con alguno de nuestros cursos')}}.
                        </h1>
                        <p data-anim-child="slide-up delay-4" class="masthead__text text-16 lh-2 text-white pt-10">
                            {{__('Puedes acceder a más de 30 cursos diferentes y 20 instructores')}}.
                            <br class="lg:d-none">
                            {{__('Instructores 100% capacitados')}}.
                        </p>

                        <div data-anim-child="slide-up delay-5">
                            <div class="masthead-form  rounded-16 mt-30 px-10 py-10" style="max-width:250px;">
                                <form class=" d-flex x-gap-30 y-gap-10 items-center flex-wrap">
                                    <div class="masthead-form__button">
                                        <button class="button -dark-1 text-white -dark-button-dark-1">Ver todos los
                                            cursos
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div data-anim-child="slide-up delay-6">
                            <div
                                class="text-white mt-20">{{__('Nuestras categorías: Trading, Crypto, Finanzas, Marketing')}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6">
                    <div class="masthead-image">
                        <div class="masthead-image__img1">
                            <img data-move="20" class="js-mouse-move" src="{{asset('assets/educrat/img/home-9/hero/1.png')}}"
                                 alt="image">
                        </div>

                        <div class="-el-1">
                            <img class="js-mouse-move" data-move="40"
                                 src="{{asset('assets/educrat/img/home-9/hero/2.png')}}" alt="icon"></div>
                        <div class="-el-2"><img class="js-mouse-move" data-move="40"
                                                src="{{asset('assets/educrat/img/home-9/hero/3.png')}}" alt="icon"></div>
                        <div class="-el-3"><img class="js-mouse-move" data-move="40"
                                                src="{{asset('assets/educrat/img/home-9/hero/4.png')}}" alt="icon"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-lg layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="row mt-10">
                <!-- <div class="col-md-12 mb-4">
                    <div class="sectionTitle w-100 ">
                        <h2 class="sectionTitle__title ">{{__('Eventos')}}</h2>
                        <p class="sectionTitle__text ">{{__('')}}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">

                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                        <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                            <h2 class="text-17 lh-1 fw-500">{{__('Próximos')}}</h2>
                        </div>
                        <div class="py-30 px-30">
                            <div class="y-gap-40">
                                @foreach($events as $event)

                                    <div class="d-flex {{$loop->first?'':'border-top-light'}}">
                                        <div class="shrink-0">
                                            <img src="{{$event->banner_image}}" class="img-fluid" alt="image"
                                                 style="width: 70px; height: 70px; border-radius: 70px">
                                        </div>
                                        <div class="ml-15 w-100">
                                            <a href="{{route('user.register-activity',$event->id)}}" class="btn btn-outline-primary float-end btn-sm">{{__('Registrarme')}}</a>
                                            <h4 class="text-15 lh-16 fw-500">
                                                {{$event->name}}
                                            </h4>
                                            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                                <div class="d-flex items-center">
                                                    @if($event->user->detail?->img_profile)
                                                        <img class="size-16 object-cover mr-8"
                                                             src="{{$event->user->detail->profile_src_image}}"
                                                             alt="image">
                                                    @else
                                                        <img class="size-16 object-cover mr-8"
                                                             src="{{asset('assets/educrat/img/misc/user-profile.png')}}"
                                                             alt="image">
                                                    @endif
                                                    <div class="text-14 lh-1">{{$event->user->name}}</div>
                                                </div>
                                                <div class="d-flex items-center">
                                                    <i class="icon-clock-2 text-16 mr-8"></i>
                                                    <div class="text-14 lh-1">{{$event->date->format('d/M')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 border-1">
                        <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                            <h2 class="text-17 lh-1 fw-500">{{__('Registrados')}}</h2>
                        </div>
                        <div class="py-30 px-30">
                            <div class="y-gap-40">
                                @foreach($eventsReg as $reg)
                                    @php($event=$reg->activity)
                                    <div class="d-flex {{$loop->first?'':'border-top-light'}}">
                                        <div class="shrink-0">
                                            <img src="{{$event->banner_image}}" class="img-fluid" alt="image"
                                                 style="width: 70px; height: 70px; border-radius: 70px">
                                        </div>
                                        <div class="ml-15">
                                            <h4 class="text-15 lh-16 fw-500">
                                                {{$event->name}}
                                            </h4>
                                            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                                <div class="d-flex items-center">
                                                    @if($event->user->detail?->img_profile)
                                                        <img class="size-16 object-cover mr-8"
                                                             src="{{$event->user->detail->profile_src_image}}"
                                                             alt="image">
                                                    @else
                                                        <img class="size-16 object-cover mr-8"
                                                             src="{{asset('assets/educrat/img/misc/user-profile.png')}}"
                                                             alt="image">
                                                    @endif
                                                    <div class="text-14 lh-1">{{$event->user->name}}</div>
                                                </div>
                                                <div class="d-flex items-center">
                                                    <i class="icon-clock-2 text-16 mr-8"></i>
                                                    <div class="text-14 lh-1">{{$event->date->format('d/M')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto ">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title ">{{__('Categorías')}}</h2>
                        <p class="sectionTitle__text ">{{__('')}}</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex x-gap-5 items-center justify-center">
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-left-hover js-cat-slider-prev">
                                <i class="icon icon-arrow-left"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <div class="pagination -arrows js-cat-slider-pag"></div>
                        </div>
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-right-hover js-cat-slider-next">
                                <i class="icon icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden pt-50 js-section-slider" data-gap="5" data-loop
                 data-slider-cols="xl-6 lg-4 md-3 sm-2" data-pagination="js-cat-slider-pag"
                 data-nav-prev="js-cat-slider-prev" data-nav-next="js-cat-slider-next">
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                        <div class="swiper-slide h-100">
                            <div data-anim-child="slide-left delay-2">
                                <div class="featureCard -type-1 -featureCard-hover-3">
                                    <div class="featureCard__content">
                                        <div class="featureCard__icon">
                                            <img src="{{asset('img/categories/'.$category->id.'.png')}}"
                                                 style="max-width: 55px;" alt="icon">
                                        </div>
                                        <div class="featureCard__title">{{__($category->name)}}</div>
                                        <div class="featureCard__text">{{$category->courses()->count()}}
                                            + {{__('Cursos')}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="tabs -pills js-tabs">
                <div class="row y-gap-20 justify-between items-end">
                    <div class="col-auto">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{__('Explora nuestros cursos')}}</h2>
                            <p class="sectionTitle__text ">{{__('Disponemos de gran variedad de cursos, inicia hoy!')}}</p>
                        </div>
                    </div>
                </div>

                <div class="tabs__content pt-60 lg:pt-50 js-tabs-content">

                    <div class="tabs__pane -tab-item-1 is-active">
                        <div class="overflow-hidden js-section-slider" data-gap="30"
                             data-slider-cols="xl-4 lg-3 md-2 sm-2">
                            <div class="swiper-wrapper">
                                @foreach($courses as $course)
                                    <div class="swiper-slide">
                                        <div data-anim-child="slide-up delay-1">

                                            <a href="{{route('user.course.lesson',$course->slug)}}"
                                               class="coursesCard -type-1 ">
                                                <div class="relative">
                                                    <div class="coursesCard__image overflow-hidden rounded-8">
                                                        @if($course->image)
                                                            <img class="w-1/1" src="{{$course->course_src_image}}"
                                                                 alt="image">
                                                        @else
                                                            <img class="w-1/1"
                                                                 src="{{asset('assets/educrat/img/coursesCards/1.png')}}"
                                                                 alt="image">
                                                        @endif
                                                        <div class="coursesCard__image_overlay rounded-8"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                    </div>
                                                </div>

                                                <div class="h-100 pt-15">
                                                    <div class="d-flex items-center">
                                                        <div class="text-14 lh-1 text-yellow-1 mr-10">4.5</div>
                                                        <div class="d-flex x-gap-5 items-center">
                                                            <div class="icon-star text-9 text-yellow-1"></div>
                                                            <div class="icon-star text-9 text-yellow-1"></div>
                                                            <div class="icon-star text-9 text-yellow-1"></div>
                                                            <div class="icon-star text-9 text-yellow-1"></div>
                                                            <div class="icon-star text-9 text-yellow-1"></div>
                                                        </div>
                                                        <div class="text-13 lh-1 ml-10">
                                                            ({{$course->created_at->format('Y')}})
                                                        </div>
                                                    </div>

                                                    <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">
                                                        {{$course->name}}
                                                    </div>

                                                    <div class="d-flex x-gap-10 items-center pt-10">

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{asset('assets/educrat/img/coursesCards/icons/1.svg')}}"
                                                                     alt="icon">
                                                            </div>
                                                            <div
                                                                class="text-14 lh-1">{{$course->lessons()->count()}}</div>
                                                        </div>

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{asset('assets/educrat/img/coursesCards/icons/2.svg')}}"
                                                                     alt="icon">
                                                            </div>
                                                            <div class="text-14 lh-1">{{$course->duration_label}}</div>
                                                        </div>

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{asset('assets/educrat/img/coursesCards/icons/3.svg')}}"
                                                                     alt="icon">
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
                                                                <img
                                                                    src="{{asset('assets/educrat/img/general/avatar-1.png')}}"
                                                                    alt="image">
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


                            <button
                                class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-prev">
                                <i class="icon icon-arrow-left text-24"></i>
                            </button>

                            <button
                                class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-next">
                                <i class="icon icon-arrow-right text-24"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-lg layout-pb-lg section-bg">
        <div class="section-bg__item">
            <img class="img-full rounded-16" src="{{asset('assets/educrat/img/home-9/cta/bg.png')}}" alt="image">
        </div>

        <div class="container">
            <div class="row justify-center text-center pt-60 md:pt-50">
                <div class="col-xl-5 col-lg-6 col-md-11">

                    <div class="sectionTitle -light">

                        <h2 class="sectionTitle__title ">{{__('Suscribete ')}}</h2>

                        <p class="sectionTitle__text ">{{__('Se el primero en enterarte de nuestras novedades y cursos, aprovecha nuestros cupones ')}}
                            .</p>

                    </div>

                </div>
            </div>

            <div class="row mt-30 justify-center">
                <div class="col-lg-6">
                    <form class="form-single-field -help" action="post">
                        <input type="text" placeholder="Tu correo...">
                        <button class="button -blue-1 text-white" type="submit">
                            {{__('Suscribirme ')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </section>
    <br><br>

@endsection
