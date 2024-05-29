@extends('layouts.educrat')
@section ('banner')
    <section class="banner-header-courses masthead -type-1 bg-header-courses js-mouse-move-container">
        <div class="masthead__bg">
        </div>
        <div class="container">
            <div data-anim-wrap class="row y-gap-50 justify-between items-end">
                <div class="col-xl-6 col-lg-6 col-sm-10 order-2 order-sm-1">
                    <div class="masthead__content">
                        <h1 class="masthead__title">
                            {{__('¡PRELANZAMIENTO!')}}
                        </h1>
                        <div class="mt-40" data-anim-child="slide-up">
                            @include('components.clock',['date'=>\Carbon\Carbon::now()->addDays(10)])
                        </div>
                        <p data-anim-child="slide-up delay-1" class="masthead__text text-24 mt-40">
                            {{__('Certificate en Desarrollo Personal, Finanzas y Nuevas Tecnologías. Llego la hora de salir del sistema, ¡Únete a la familia! WAKE.')}}
                        </p>
                        <div data-anim-child="slide-up delay-2" class="masthead__buttons row x-gap-10 y-gap-10">

                        </div>
                    </div>
                </div>
                <div data-anim-child="slide-up delay-5 " class="col-lg-6 order-1 order-sm-2">
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('content')

    <section class="layout-pt-md layout-pb-md mt-90 mb-30 section-bg">
        <div class="section-bg__item bg-membership-gold">
        </div>
        <div class="container">
            <div class="row  ">
                <div class=" col-lg-6 ">
                    <div class="sectionTitle -light">
                        <h2 class="sectionTitle__title ">{{__('MEMBRESIA GOLD')}}</h2>
                        <p class="sectionTitle__text text-30 lh-12">{{__('y accede a todos los cursos de todas las categorías')}}
                            .</p>
                        <p class="text-white f-r mt-20 mr-8 text-18"> {{__('Incluye certificación ')}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 ms-auto">
                    <div class="sectionTitle -light ">
                        <div class="students-active justify-center">
                            <ul class="text-white">
                                <li><span class="text-50 fw-700">{{__('USD $250')}}</span></li>
                                <li><span class="  pl-10" style="    display: inline-block;"> <p
                                            class="text-18"> {{__('PRECIO DE')}} </p> <p
                                            class="text-20">{{__('LANZAMIENTO')}}</p></span></li>
                            </ul>

                        </div>

                        <div>
                            <a data-barba href="#"
                               class="button -md -purple-2 text-white text-18">{{__('COMPRAR AHORA')}} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- inicio -->

    <form action="{{ route('public.courses.search') }}" method="POST" id="form-search">
        @csrf
        <section class="layout-pt-md layout-pb-md" id="{{count(request()->all()) ? 'search-section' : ''}}">
            <div data-anim-wrap class="container">
                <div class="row y-gap-50">
                    <div class="col-xl-3 col-lg-4 lg:d-none">
                        <div class="pr-30 lg:pr-0">

                            <div data-anim="slide-up delay-2" class="sidebar -courses">
                                <div class="sidebar__item">
                                    <div class="accordion js-accordion">
                                        <div class="accordion__item js-accordion-item-active">
                                            <div class="accordion__button items-center">
                                                <h5 class="sidebar__title">{{__('Categorías')}}</h5>

                                                <div class="accordion__icon">
                                                    <div class="icon icon-chevron-down"></div>
                                                    <div class="icon icon-chevron-up"></div>
                                                </div>
                                            </div>

                                            <div class="accordion__content">
                                                <div class="accordion__content__inner">
                                                    <div class="sidebar-checkbox">

                                                        @foreach($categories as $category)
                                                            <div class="sidebar-checkbox__item">
                                                                <div class="form-checkbox">
                                                                    <input type="checkbox"
                                                                           name="category[{{$category->id}}]"
                                                                           value="{{$category->id}}" {{isset(request()->category[$category->id]) ? 'checked' : null}}>
                                                                    <div class="form-checkbox__mark">
                                                                        <div
                                                                            class="form-checkbox__icon icon-check"></div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="sidebar-checkbox__title">{{$category->name}}</div>
                                                                <div class="sidebar-checkbox__count">({{$category->courses()->count()}})</div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                @dd($courses->first(),$courses->first()->course_feedback)--}}

                                <div class="sidebar__item">
                                    <div class="accordion js-accordion">
                                        <div class="accordion__item js-accordion-item-active">
                                            <div class="accordion__button items-center">
                                                <h5 class="sidebar__title">{{__('Favoritos')}}</h5>

                                                <div class="accordion__icon">
                                                    <div class="icon icon-chevron-down"></div>
                                                    <div class="icon icon-chevron-up"></div>
                                                </div>
                                            </div>

                                            <div class="accordion__content">
                                                <div class="accordion__content__inner">
                                                    <div class="sidebar-checkbox">

                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="rating" value="5" {{request()->rating == 5 ? 'checked' : ''}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title d-flex items-center">
                                                                <div class="d-flex x-gap-5 pr-10">
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                </div>
                                                                5.0
                                                            </div>
                                                            <div class="sidebar-checkbox__count">({{$courses->where('course_feedback_avg_rate',5)->count()}})</div>
                                                        </div>

                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="rating" value="4" {{request()->rating == 4 ? 'checked' : ''}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title d-flex items-center">
                                                                <div class="d-flex x-gap-5 pr-10">
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                </div>
                                                                4.0
                                                            </div>
                                                            <div class="sidebar-checkbox__count">({{$courses->where('course_feedback_avg_rate',4)->count()}})</div>
                                                        </div>

                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="rating" value="3" {{request()->rating == 3 ? 'checked' : ''}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title d-flex items-center">
                                                                <div class="d-flex x-gap-5 pr-10">
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                </div>
                                                                3.0
                                                            </div>
                                                            <div class="sidebar-checkbox__count">({{$courses->where('course_feedback_avg_rate',3)->count()}})</div>
                                                        </div>

                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="rating" value="2" {{request()->rating == 2 ? 'checked' : ''}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title d-flex items-center">
                                                                <div class="d-flex x-gap-5 pr-10">
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                </div>
                                                                2.0
                                                            </div>
                                                            <div class="sidebar-checkbox__count">({{$courses->where('course_feedback_avg_rate',2)->count()}})</div>
                                                        </div>
                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="rating" value="1" {{request()->rating == 1 ? 'checked' : ''}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title d-flex items-center">
                                                                <div class="d-flex x-gap-5 pr-10">
                                                                    <div class="icon-star text-11 text-purple-2"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                    <div class="icon-star text-11 text-dark-7"></div>
                                                                </div>
                                                                1.0
                                                            </div>
                                                            <div class="sidebar-checkbox__count">({{$courses->where('course_feedback_avg_rate',1)->count()}})</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar__item">
                                    <div class="accordion js-accordion">
                                        <div class="accordion__item js-accordion-item-active">
                                            <div class="accordion__button items-center">
                                                <h5 class="sidebar__title">{{__('Instructores')}}</h5>

                                                <div class="accordion__icon">
                                                    <div class="icon icon-chevron-down"></div>
                                                    <div class="icon icon-chevron-up"></div>
                                                </div>
                                            </div>

                                            <div class="accordion__content overflow-auto">
                                                <div class="accordion__content__inner">
                                                    <div class="sidebar-checkbox">

                                                        @foreach($teachers->take(5) as $teacher)
                                                            <div class="sidebar-checkbox__item">
                                                                <div class="form-checkbox">
                                                                    <input type="checkbox"
                                                                           name="teacher[{{$teacher->id}}]"
                                                                           value="{{$teacher->id}}" {{isset(request()->teacher[$teacher->id]) ? 'checked' : null}}>
                                                                    <div class="form-checkbox__mark">
                                                                        <div
                                                                            class="form-checkbox__icon icon-check"></div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="sidebar-checkbox__title">{{$teacher->name}}</div>
                                                                <div class="sidebar-checkbox__count">({{$teacher->teacher_courses()->count()}})</div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="sidebar-checkbox mt-15">
                                                        @if ($teachers->count() > 5)
                                                            <a href="javascript:void(0);"
                                                               class="text-14 fw-500 underline text-purple-1"
                                                               id="view_more_teacher">
                                                                {{__('Ver todos')}}
                                                            </a>

                                                            @foreach ($teachers->slice(5) as $teacher)
                                                                <div class="sidebar-checkbox__item view_teacher"
                                                                     style="display: none">
                                                                    <div class="form-checkbox">
                                                                        <input type="checkbox"
                                                                               name="teacher[{{$teacher->id}}]"
                                                                               value="{{$teacher->id}}" {{isset(request()->teacher[$teacher->id]) ? 'checked' : null}}>
                                                                        <div class="form-checkbox__mark">
                                                                            <div
                                                                                class="form-checkbox__icon icon-check"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="sidebar-checkbox__title">{{$teacher->name}}</div>
                                                                    <div class="sidebar-checkbox__count">({{$teacher->teacher_courses()->count()}})</div>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar__item">
                                    <div class="accordion js-accordion">
                                        <div class="accordion__item js-accordion-item-active">
                                            <div class="accordion__button items-center">
                                                <h5 class="sidebar__title">{{__('Precio')}}</h5>

                                                <div class="accordion__icon">
                                                    <div class="icon icon-chevron-down"></div>
                                                    <div class="icon icon-chevron-up"></div>
                                                </div>
                                            </div>

                                            <div class="accordion__content">
                                                <div class="accordion__content__inner">
                                                    <div class="sidebar-checkbox">

                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="price"
                                                                           value="all" {{isset(request()->price) && request()->price == 'all'  ? 'checked' : null}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title">{{__('Todos')}}</div>
                                                            <div class="sidebar-checkbox__count">({{$courses->count()}})</div>
                                                        </div>

                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="price"
                                                                           value="free" {{isset(request()->price) && request()->price == 'free'  ? 'checked' : null}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title">{{__('Gratis')}}</div>
                                                            <div class="sidebar-checkbox__count">({{$courses->whereNotNull('free')->count()}})</div>
                                                        </div>

                                                        <div class="sidebar-checkbox__item">
                                                            <div class="form-radio mr-10">
                                                                <div class="radio">
                                                                    <input type="radio" name="price"
                                                                           value="paid" {{isset(request()->price) && request()->price == 'paid'  ? 'checked' : null}}>
                                                                    <div class="radio__mark">
                                                                        <div class="radio__icon"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title">{{__('Pagos')}}</div>
                                                            <div class="sidebar-checkbox__count">({{$courses->whereNull('free')->count()}})</div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                    <div data-anim-child="slide-up delay-3" class="col-xl-9 col-lg-8">
                        <div class="accordion__content d-none lg:d-block">
                            <div class="sidebar -courses px-30 py-30 rounded-8 bg-light-3 mb-50">
                                <div class="row x-gap-60 y-gap-40">
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="sidebar__item">
                                            <h5 class="sidebar__title">Category</h5>
                                            <div class="sidebar-checkbox">

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Art</div>
                                                    <div class="sidebar-checkbox__count">(18)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Exercise</div>
                                                    <div class="sidebar-checkbox__count">(12)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Software Development</div>
                                                    <div class="sidebar-checkbox__count">(23)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Music</div>
                                                    <div class="sidebar-checkbox__count">(67)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Material Design</div>
                                                    <div class="sidebar-checkbox__count">(34)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Photography</div>
                                                    <div class="sidebar-checkbox__count">(12)</div>
                                                </div>

                                            </div>
                                            <div class="sidebar__more mt-15">
                                                <a href="#" class="text-14 fw-500 underline text-purple-1">Show more</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="sidebar__item">
                                            <h5 class="sidebar__title">Ratings</h5>
                                            <div class="sidebar-checkbox">

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-radio mr-10">
                                                        <div class="radio">
                                                            <input type="radio" name="radio" checked="checked">
                                                            <div class="radio__mark">
                                                                <div class="radio__icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title d-flex items-center">
                                                        <div class="d-flex x-gap-5 pr-10">
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                        </div>
                                                        4.5 &amp; up
                                                    </div>
                                                    <div class="sidebar-checkbox__count">(1991)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-radio mr-10">
                                                        <div class="radio">
                                                            <input type="radio" name="radio" checked="checked">
                                                            <div class="radio__mark">
                                                                <div class="radio__icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title d-flex items-center">
                                                        <div class="d-flex x-gap-5 pr-10">
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                        </div>
                                                        4.0 &amp; up
                                                    </div>
                                                    <div class="sidebar-checkbox__count">(200)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-radio mr-10">
                                                        <div class="radio">
                                                            <input type="radio" name="radio" checked="checked">
                                                            <div class="radio__mark">
                                                                <div class="radio__icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title d-flex items-center">
                                                        <div class="d-flex x-gap-5 pr-10">
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                        </div>
                                                        3.5 &amp; up
                                                    </div>
                                                    <div class="sidebar-checkbox__count">(300)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-radio mr-10">
                                                        <div class="radio">
                                                            <input type="radio" name="radio" checked="checked">
                                                            <div class="radio__mark">
                                                                <div class="radio__icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title d-flex items-center">
                                                        <div class="d-flex x-gap-5 pr-10">
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                            <div class="icon-star text-11 text-purple-2"></div>
                                                        </div>
                                                        3.0 &amp; up
                                                    </div>
                                                    <div class="sidebar-checkbox__count">(500)</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="sidebar__item">
                                            <h5 class="sidebar__title">Instructors</h5>
                                            <div class="sidebar-checkbox">

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Jane Cooper</div>
                                                    <div class="sidebar-checkbox__count">(18)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Jenny Wilson</div>
                                                    <div class="sidebar-checkbox__count">(12)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Robert Fox</div>
                                                    <div class="sidebar-checkbox__count">(23)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Jacob Jones</div>
                                                    <div class="sidebar-checkbox__count">(67)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Albert Flores</div>
                                                    <div class="sidebar-checkbox__count">(34)</div>
                                                </div>

                                            </div>
                                            <div class="sidebar__more mt-15">
                                                <a href="#" class="text-14 fw-500 underline text-purple-1">Show more</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="sidebar__item">
                                            <h5 class="sidebar__title">Price</h5>
                                            <div class="sidebar-checkbox">

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-radio mr-10">
                                                        <div class="radio">
                                                            <input type="radio" name="radio-2" checked="checked">
                                                            <div class="radio__mark">
                                                                <div class="radio__icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">All</div>
                                                    <div class="sidebar-checkbox__count">(18)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-radio mr-10">
                                                        <div class="radio">
                                                            <input type="radio" name="radio-2" checked="checked">
                                                            <div class="radio__mark">
                                                                <div class="radio__icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">Free</div>
                                                    <div class="sidebar-checkbox__count">(12)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-radio mr-10">
                                                        <div class="radio">
                                                            <input type="radio" name="radio-2" checked="checked">
                                                            <div class="radio__mark">
                                                                <div class="radio__icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">Paid</div>
                                                    <div class="sidebar-checkbox__count">(23)</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="sidebar__item">
                                            <h5 class="sidebar__title">Level</h5>
                                            <div class="sidebar-checkbox">

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">All Levels</div>
                                                    <div class="sidebar-checkbox__count">(18)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Beginner</div>
                                                    <div class="sidebar-checkbox__count">(12)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Intermediate</div>
                                                    <div class="sidebar-checkbox__count">(23)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="sidebar-checkbox__title">Expert</div>
                                                    <div class="sidebar-checkbox__count">(67)</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="sidebar__item">
                                            <h5 class="sidebar__title">Languange</h5>
                                            <div class="sidebar-checkbox">

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">English</div>
                                                    <div class="sidebar-checkbox__count">(18)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">French</div>
                                                    <div class="sidebar-checkbox__count">(12)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">German</div>
                                                    <div class="sidebar-checkbox__count">(23)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">Italian</div>
                                                    <div class="sidebar-checkbox__count">(67)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">Turkish</div>
                                                    <div class="sidebar-checkbox__count">(34)</div>
                                                </div>

                                            </div>
                                            <div class="sidebar__more mt-15">
                                                <a href="#" class="text-14 fw-500 underline text-purple-1">Show more</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="sidebar__item">
                                            <h5 class="sidebar__title">Duration</h5>
                                            <div class="sidebar-checkbox">

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">Less than 3 hours</div>
                                                    <div class="sidebar-checkbox__count">(18)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">4 - 7 hours</div>
                                                    <div class="sidebar-checkbox__count">(12)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">8 -18 hours</div>
                                                    <div class="sidebar-checkbox__count">(23)</div>
                                                </div>

                                                <div class="sidebar-checkbox__item">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>
                                                    <div class="sidebar-checkbox__title">20 + Hours</div>
                                                    <div class="sidebar-checkbox__count">(67)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- fin de filtro -->

                        @if(request()->routeIs('public.courses.search'))
                            <div class="sectionTitle">
                                <h4 class="sectionTitle__title text-30 ">{{__('Filtro Cursos')}}</h4>
                            </div>
                            <div class="row">
                                @foreach($courses as $course)
                                    <div class="col-md-4">
                                        <div data-anim-child="slide-up delay-1">

                                            <a href="{{route('public.course',$course->slug)}}"
                                               class="coursesCard -type-1  rounded-8">
                                                <div class="relative">
                                                    <div class="coursesCard__image overflow-hidden rounded-top-8">
                                                        @if($course->image)
                                                            <img class="w-1/1 " src="{{$course->course_src_image}}"
                                                                 alt="image">
                                                        @else
                                                            <img class="w-1/1"
                                                                 src="{{asset('assets/educrat/img/coursesCards/1.png')}}"
                                                                 alt="image">
                                                        @endif
                                                        <div class="coursesCard__image_overlay rounded-top-8"></div>
                                                    </div>
                                                    <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3"></div>
                                                </div>

                                                <div class="h-100 pt-15 pb-10">
                                                    <div class="d-flex items-center valoration-courses">
                                                        <div
                                                            class="text-14 lh-1  {{$course->avgRating()>=1?'text-purple-2':''}} mr-10">{{$course->avgRating()}}</div>
                                                        <div class="d-flex x-gap-5 items-center">
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=1?'text-purple-2':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=2?'text-purple-2':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=3?'text-purple-2':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=4?'text-purple-2':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=5?'text-purple-2':'text-dark-7'}}"></div>
                                                        </div>
                                                    </div>

                                                    <div class="text-17 lh-15 fw-500 text-dark-1">
                                                        {{$course->list_categories->first()?->name}}
                                                    </div>
                                                    <div
                                                        class="text-16 lh-15 fw-700 text-dark-1 mt-5 ">{{$course->name}}</div>

                                                    <div class="d-flex-new x-gap-10 items-center pt-10">

                                                        <div class="d-flex-new items-center ">
                                                            <div class="mr-8">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/coursesCards/icons/2.svg')}}"
                                                                    alt="icon">
                                                            </div>
                                                            <div
                                                                class="text-14 lh-1">{{$course->duration_label}}</div>
                                                        </div>

                                                        <div class="d-flex-new items-center ">
                                                            <div class="mr-8">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/coursesCards/icons/1.svg')}}"
                                                                    alt="icon">
                                                            </div>
                                                            <div
                                                                class="text-14 lh-1">{{$course->lessons()->count()}} {{__('Lecciones')}}</div>

                                                        </div>
                                                    </div>

                                                    <div class="coursesCard-footer mt-10">
                                                        <a data-barba
                                                           href="{{route('cart.add.item',[$course->slug,'checkout'])}}"
                                                           class="button -sm -purple-2 text-white text-15">{{__('Comprar USD')}}
                                                            &nbsp<span> ${{number_format($course->price,2)}}</span></a>
                                                    </div>
                                                    <br>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                @endforeach
                                    <div class="row justify-center pt-60 lg:pt-40">
                                        <div class="col-auto">
                                            {{$courses->links()}}
                                        </div>
                                    </div>
                            </div>
                        @else

                            <div class="sectionTitle ">
                                <h4 class="sectionTitle__title text-30 ">{{__('Cursos recientes')}}</h4>
                            </div>

                            <div class="relative">
                                <div class="overflow-hidden pt-40 lg:pt-30 js-section-slider" data-gap="30"
                                     data-nav-prev="js-courses-prev" data-nav-next="js-courses-next"
                                     data-slider-cols="xl-3 lg-3 md-2 sm-2">
                                    <div class="swiper-wrapper pb-3">

                                        @foreach($courses as $course)
                                            <div class="swiper-slide">
                                                <div data-anim-child="slide-up delay-1">

                                                    <a href="{{route('public.course',$course->slug)}}"
                                                       class="coursesCard -type-1  rounded-8">
                                                        <div class="relative">
                                                            <div
                                                                class="coursesCard__image overflow-hidden rounded-top-8">
                                                                @if($course->image)
                                                                    <img class="w-1/1 "
                                                                         src="{{$course->course_src_image}}"
                                                                         alt="image">
                                                                @else
                                                                    <img class="w-1/1"
                                                                         src="{{asset('assets/educrat/img/coursesCards/1.png')}}"
                                                                         alt="image">
                                                                @endif
                                                                <div
                                                                    class="coursesCard__image_overlay rounded-top-8"></div>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                            </div>
                                                        </div>

                                                        <div class="h-100 pt-15 pb-10">
                                                            <div class="d-flex items-center valoration-courses">
                                                                <div
                                                                    class="text-14 lh-1  {{$course->avgRating()>=1?'text-purple-2':''}} mr-10">{{$course->avgRating()}}</div>
                                                                <div class="d-flex x-gap-5 items-center">
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=1?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=2?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=3?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=4?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=5?'text-purple-2':'text-dark-7'}}"></div>
                                                                </div>
                                                            </div>

                                                            <div class="text-17 lh-15 fw-500 text-dark-1">
                                                                {{$course->list_categories->first()?->name}}
                                                            </div>
                                                            <div
                                                                class="text-16 lh-15 fw-700 text-dark-1 mt-5 ">{{$course->name}}</div>

                                                            <div class="d-flex-new x-gap-10 items-center pt-10">

                                                                <div class="d-flex-new items-center ">
                                                                    <div class="mr-8">
                                                                        <img
                                                                            src="{{asset('assets/educrat/img/coursesCards/icons/2.svg')}}"
                                                                            alt="icon">
                                                                    </div>
                                                                    <div
                                                                        class="text-14 lh-1">{{$course->duration_label}}</div>
                                                                </div>

                                                                <div class="d-flex-new items-center ">
                                                                    <div class="mr-8">
                                                                        <img
                                                                            src="{{asset('assets/educrat/img/coursesCards/icons/1.svg')}}"
                                                                            alt="icon">
                                                                    </div>
                                                                    <div
                                                                        class="text-14 lh-1">{{$course->lessons()->count()}} {{__('Lecciones')}}</div>

                                                                </div>
                                                            </div>

                                                            <div class="coursesCard-footer mt-10">
                                                                <a data-barba
                                                                   href="{{route('cart.add.item',[$course->slug,'checkout'])}}"
                                                                   class="button -sm -purple-2 text-white text-15">{{__('Comprar USD')}}
                                                                    &nbsp<span> ${{number_format($course->price,2)}}</span></a>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <button
                                    class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-50 rounded-full shadow-5 js-courses-prev">
                                    <i class="icon icon-arrow-left text-24"></i>
                                </button>

                                <button
                                    class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-50 rounded-full shadow-5 js-courses-next">
                                    <i class="icon icon-arrow-right text-24"></i>
                                </button>

                            </div>

                            <div class="sectionTitle ">
                                <h4 class="sectionTitle__title text-30 ">{{__('Favoritos para los estudiantes')}}</h4>
                            </div>

                            <div class="relative">
                                <div class="overflow-hidden pt-40 lg:pt-30 js-section-slider" data-gap="30"
                                     data-nav-prev="js-courses-prev2" data-nav-next="js-courses-next2"
                                     data-slider-cols="xl-3 lg-3 md-2 sm-2">
                                    <div class="swiper-wrapper pb-3">

                                        @foreach($courses as $course)
                                            <div class="swiper-slide">
                                                <div data-anim-child="slide-up delay-1">

                                                    <a href="{{route('public.course',$course->slug)}}"
                                                       class="coursesCard -type-1  rounded-8">
                                                        <div class="relative">
                                                            <div
                                                                class="coursesCard__image overflow-hidden rounded-top-8">
                                                                @if($course->image)
                                                                    <img class="w-1/1 "
                                                                         src="{{$course->course_src_image}}"
                                                                         alt="image">
                                                                @else
                                                                    <img class="w-1/1"
                                                                         src="{{asset('assets/educrat/img/coursesCards/1.png')}}"
                                                                         alt="image">
                                                                @endif
                                                                <div
                                                                    class="coursesCard__image_overlay rounded-top-8"></div>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                            </div>
                                                        </div>

                                                        <div class="h-100 pt-15 pb-10">
                                                            <div class="d-flex items-center valoration-courses">
                                                                <div
                                                                    class="text-14 lh-1 text-purple-2 mr-10">{{$course->avgRating()}}</div>
                                                                <div class="d-flex x-gap-5 items-center">
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=1?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=2?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=3?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=4?'text-purple-2':'text-dark-7'}}"></div>
                                                                    <div
                                                                        class="icon-star text-11 {{floor($course->avgRating())>=5?'text-purple-2':'text-dark-7'}}"></div>

                                                                </div>
                                                            </div>

                                                            <div
                                                                class="text-17 lh-15 fw-500 text-dark-1">{{$course->list_categories->first()?->name}}</div>
                                                            <div
                                                                class="text-16 lh-15 fw-700 text-dark-1 mt-5 ">{{$course->name}}</div>

                                                            <div class="d-flex-new x-gap-10 items-center pt-10">


                                                                <div class="d-flex-new items-center ">
                                                                    <div class="mr-8">
                                                                        <img
                                                                            src="{{asset('assets/educrat/img/coursesCards/icons/2.svg')}}"
                                                                            alt="icon">
                                                                    </div>
                                                                    <div
                                                                        class="text-14 lh-1">{{$course->duration_label}}</div>
                                                                </div>

                                                                <div class="d-flex-new items-center ">
                                                                    <div class="mr-8">
                                                                        <img
                                                                            src="{{asset('assets/educrat/img/coursesCards/icons/1.svg')}}"
                                                                            alt="icon">
                                                                    </div>
                                                                    <div
                                                                        class="text-14 lh-1">{{$course->lessons()->count()}} {{__('Lecciones')}}</div>

                                                                </div>
                                                            </div>

                                                            <div class="coursesCard-footer mt-10">
                                                                <a data-barba
                                                                   href="{{route('cart.add.item',[$course->slug,'checkout'])}}"
                                                                   class="button -sm -purple-2 text-white text-15">{{__('Comprar USD')}}
                                                                    &nbsp<span> ${{number_format($course->price,2)}}</span></a>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <button
                                    class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-50 rounded-full shadow-5 js-courses-prev2">
                                    <i class="icon icon-arrow-left text-24"></i>
                                </button>

                                <button
                                    class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-50 rounded-full shadow-5 js-courses-next2">
                                    <i class="icon icon-arrow-right text-24"></i>
                                </button>


                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <button type="submit" style="display: none;"></button>
    </form>



    <section class="layout-pt-md layout-pb-md mt-30 mb-30 section-bg">
        <div class="section-bg__item bg-membership-silver">
        </div>
        <div class="container">
            <div class="row  ">
                <div class=" col-lg-6 ">
                    <div class="sectionTitle -light">
                        <h2 class="sectionTitle__title ">{{__('MEMBRESIA PLATA')}}</h2>
                        <p class="sectionTitle__text text-30 lh-12">{{__('y accede a todos los cursos de una sola categoría')}}
                            .</p>
                        <p class="text-white f-r mt-20 mr-8 text-18"> {{__('Incluye certificación ')}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 ms-auto">
                    <div class="sectionTitle -light ">
                        <div class="students-active justify-center">
                            <ul class="text-white">
                                <li><span class="text-50 fw-700">{{__('USD $99')}}</span></li>
                                <li><span class="  pl-10" style="    display: inline-block;"> <p
                                            class="text-18"> {{__('PRECIO DE')}} </p> <p
                                            class="text-20">{{__('LANZAMIENTO')}}</p></span></li>
                            </ul>

                        </div>

                        <div>
                            <a data-barba href="#"
                               class="button -md -purple-2 text-white text-18">{{__('COMPRAR AHORA')}} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-lg layout-pb-lg">
        <div class="container">
            <div class="row y-gap-20 justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title ">{{__('Testimonios')}}</h2>
                    </div>

                </div>
            </div>

            <div class="row justify-center pt-60">
                <div class="col-xl-8 col-lg-8 col-md-10">
                    <div class="overflow-hidden js-testimonials-slider">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/1.png')}}"
                                             alt="image">
                                    </div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">Aprendi grandes
                                        habilidades que me ayudaron a alcanzar el exito en mi empresa.
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/2.png')}}"
                                             alt="image">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration
                                        to say this Educrat experience was transformative–both professionally and
                                        personally. This workshop will long remain a high point of my life.
                                    </div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/3.png')}}"
                                             alt="image">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration
                                        to say this Educrat experience was transformative–both professionally and
                                        personally. This workshop will long remain a high point of my life.
                                    </div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/4.png')}}"
                                             alt="image">
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration
                                        to say this Educrat experience was transformative–both professionally and
                                        personally. This workshop will long remain a high point of my life.
                                    </div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide h-100">
                                <div data-anim="slide-up" class="testimonials -type-2 text-center">
                                    <div class="testimonials__icon">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/5.png')}}"
                                             alt="image">
                                        <!-- <img src="{{asset('assets/educrat/img/misc/quote.svg')}}" alt="quote"> -->
                                    </div>
                                    <div class="testimonials__text md:text-20 fw-500 text-dark-1">It is no exaggeration
                                        to say this Educrat experience was transformative–both professionally and
                                        personally. This workshop will long remain a high point of my life.
                                    </div>
                                    <div class="testimonials__author">
                                        <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                        <div class="mt-5">Product Manager, Apple Inc</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="pt-30 lg:pt-40">
                            <div
                                class="pagination -avatars row x-gap-40 y-gap-20 justify-center js-testimonials-pagination">

                                <div class="col-auto">
                                    <div class="pagination__item is-active">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/1.png')}}"
                                             alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/2.png')}}"
                                             alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/3.png')}}"
                                             alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/4.png')}}"
                                             alt="image">
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="pagination__item ">
                                        <img src="{{asset('assets/educrat/img/home-3/testimonials/5.png')}}"
                                             alt="image">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- fin -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#view_more_teacher').click(function (e) {
                e.preventDefault();
                $('.view_teacher').show().removeClass('d-none');
                $(this).remove();
            });
            $('input[type="checkbox"]').change(function () {
                $('#form-search').submit(); // Enviar formulario al cambiar el checkbox
            });
            $('input[type="radio"]').change(function () {
                $('#form-search').submit(); // Enviar formulario al cambiar el checkbox
            });
            let sectionFocus = $('#search-section');
            $('html, body').animate({ scrollTop: sectionFocus.offset().top }, 'slow');
        });
    </script>
@endsection
