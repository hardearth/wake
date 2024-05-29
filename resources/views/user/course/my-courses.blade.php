@extends('layouts.educrat_user')
@section('content')
    <div class="dashboard__content ">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">{{__('Mis cursos')}}</h1>
                <div class="mt-10">{{__('Visualiza los cursos de tu preferencia')}}.</div>

            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs">
                        <div
                            class="tabs__controls d-flex items-center pt-20 px-30 border-bottom-light js-tabs-controls">
                            <button class="text-light-1 lh-12 tabs__button js-tabs-button is-active"
                                    data-tab-target=".-tab-item-1" type="button">
                                {{__('Todos los cursos')}}
                            </button>
                            {{--                            <button class="text-light-1 lh-12 tabs__button js-tabs-button ml-30"--}}
                            {{--                                    data-tab-target=".-tab-item-2" type="button">--}}
                            {{--                                {{__('Continuar viendo')}}--}}
                            {{--                            </button>--}}
                            {{--                            <button class="text-light-1 lh-12 tabs__button js-tabs-button ml-30"--}}
                            {{--                                    data-tab-target=".-tab-item-3" type="button">--}}
                            {{--                                {{__('Finalizados')}}--}}
                            {{--                            </button>--}}
                        </div>

                        <div class="tabs__content py-30 px-30 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">


                                <div class="row y-gap-30 pt-30">
                                    @if($courses->count())
                                        @foreach ($courses as $course)
                                            <div class="col-md-3">
                                                @include('user.components.card-course')
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center">
                                            <h3 style="color: #B0BEC5; height: 300px">
                                                {{__('Aun no tienes programas educativos activos, explora las opciones que tenemos para ti.')}}
                                            </h3>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
                                        @foreach($coursesAvailable as $course)
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

        </div>
    </div>
@endsection
