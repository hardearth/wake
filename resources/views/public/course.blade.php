@extends('layouts.educrat')
@section ('banner')
<section class="page-header -type-5 bg-header-detail-course bg-dark-1 pt-80">
        <div class="container">
            <div class="page-header__content pt-80">
                <div class="row y-gap-30 justify-between">
                    <div class="col-xl-6 col-lg-5">
                        <div data-anim="slide-up delay-1">
                            <h1 class="text-64 lh-14 text-white pr-60 lg:pr-0">{{$course->name}}</h1>
                        </div>
                        <!-- <p class="text-dark-3 mt-20">{{$course->description}}</p> -->
                        <div class="d-flex items-center flex-wrap pt-20">
                            <div class="d-flex items-center text-dark-3">
                                <div class="text-24 lh-1 text-purple-2 mr-10">{{$averageRating}}</div>
                                <div class="d-flex x-gap-5 items-center">
                                    <div class="icon-star text-11 {{$averageRating>=1?'text-yellow-1':'text-dark-7'}}"></div>
                                    <div class="icon-star text-11 {{$averageRating>=2?'text-yellow-1':'text-dark-7'}}"></div>
                                    <div class="icon-star text-11 {{$averageRating>=3?'text-yellow-1':'text-dark-7'}}"></div>
                                    <div class="icon-star text-11 {{$averageRating>=4?'text-yellow-1':'text-dark-7'}}"></div>
                                    <div class="icon-star text-11 {{$averageRating>=5?'text-yellow-1':'text-dark-7'}}"></div>
                                </div>
                            </div>
                            <p class="text-24 text-white pl-10"> (168) </p>
                        <!--
                            <div class="d-flex items-center text-dark-3">
                                <div class="icon icon-person-3 text-13"></div>
                                <div class="text-14 ml-8">853 {{__('Alumnos inscritos')}}</div>
                            </div>
                            <div class="d-flex items-center text-dark-3">
                                <div class="icon icon-wall-clock text-13"></div>
                                <div class="text-14 ml-8">{{__('Última Actualización')}} {{$course->updated_at->format('m/Y')}}</div>
                            </div> -->
                        </div>

                        <!-- <div class="d-flex items-center pt-20">
                            <div class="bg-image size-30 rounded-full js-lazy" data-bg="img/avatars/small-1.png"></div>
                            <div class="text-14 lh-1 ml-10 text-dark-3">{{$course->teacher->name}}</div>
                        </div> -->

                        <div class="d-flex items-center text-purple-2 text-24 mt-20 fw-500">
                            @foreach($course->list_categories as $categorie)
                                {{$categorie->name}}
                            @endforeach
                        </div>


                        <div class="mt-30">
                            <div class="d-flex justify-between py-8 border-bottom-light-2">
                                <div class="d-flex items-center text-white">
                                    <div class="icon-video-file"></div>
                                    <div class="ml-10">{{__('Clases')}}</div>
                                </div>
                                <div class="text-white">{{$course->lessons()->count()}}</div>
                            </div>

                            <div class="d-flex justify-between py-8 border-bottom-light-2">
                                <div class="d-flex items-center text-white">
                                    <div class="icon-clock-2"></div>
                                    <div class="ml-10">{{__('Duración')}}</div>
                                </div>
                                <div class="text-white">{{$course->duration_label}}</div>
                            </div>

                            <div class="d-flex justify-between py-8 border-bottom-light-2">
                                <div class="d-flex items-center text-white">
                                    <div class="icon-bar-chart-2"></div>
                                    <div class="ml-10">{{__('Nivel requerido')}}</div>
                                </div>
                                <div class="text-white">{{$course->level}}</div>
                            </div>

                            <div class="d-flex justify-between py-8 border-bottom-light-2">
                                <div class="d-flex items-center text-white">
                                    <div class="icon-translate"></div>
                                    <div class="ml-10">{{__('Idioma')}}</div>
                                </div>
                                <div class="text-white">{{$course->language}}</div>
                            </div>

                            <div class="d-flex justify-between py-8 border-bottom-light-2">
                                <div class="d-flex items-center text-white">
                                    <div class="icon-badge"></div>
                                    <div class="ml-10">{{__('Certificado')}}</div>
                                </div>
                                <div class="text-white">{{__('Si')}}</div>
                            </div>

                            <div class="d-flex justify-between py-8 border-bottom-light-2">
                                <div class="d-flex items-center text-white">
                                    <div class="icon-infinity"></div>
                                    <div class="ml-10">{{__('Acceso de por vida')}}</div>
                                </div>
                                <div class="text-white">{{__('Si')}}</div>
                            </div>
                        </div>

                        <!-- <div class="d-flex mt-30 text-white">

                            <a href="#" class="d-flex justify-center items-center size-40 rounded-full ">
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="d-flex justify-center items-center size-40 rounded-full ">
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="d-flex justify-center items-center size-40 rounded-full ">
                                <i class="icon-instagram"></i>
                            </a>

                            <a href="#" class="d-flex justify-center items-center size-40 rounded-full ">
                                <i class="icon-linkedin"></i>
                            </a>

                        </div> -->
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="relative">
                            @if($course->image)
                                <img class="w-1/1" src="{{$course->course_src_image}}" alt="image" >
                            @else
                                <img class="w-1/1" src="{{asset('assets/educrat/img/misc/1.png')}}" alt="image">
                            @endif
                            <div class="absolute-full-center d-flex justify-center items-center">
                                <a href="{{$course->video}}" class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery" data-gallery="gallery1">
                                    <div class="icon-play text-18"></div>
                                </a>
                            </div>
                        </div>
                        <div class="mt-30">
                            <div class="d-flex justify-between items-center">
                                <div class="text-24 lh-1 text-white fw-500">${{number_format($course->price,2)}}</div>
                                <div class="lh-1 line-through text-white">${{number_format($course->price+60,2)}}</div>
                            </div>
                            <div class="row x-gap-30 y-gap-20 pt-30">
                                <div class="col-sm-6">
                                    <a href="{{route('cart.add.item',$course->slug)}}"
                                        class="button -md -purple-1 text-white w-1/1">{{__('Agregar al carrito')}}</a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{route('cart.add.item',[$course->slug,'checkout'])}}"
                                        class="button -md -outline-green-1 text-green-1 w-1/1">{{__('Comprar Ahora')}}</a>
                                </div>
                            </div>
                            <div class="text-14 lh-1 text-dark-3 mt-30">{{__('Posee 30 días de garantía')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section class="layout-pt-lg layout-pb-md">
        <div class="container">
            <!-- <div class="tabs -pills js-tabs">
                <div class="tabs__controls d-flex x-gap-20 js-tabs-controls border-button ">
                    <div><button class="tabs__button px-20 py-8 rounded-8 text-purple-2 js-tabs-button fw-500 text-18 is-active" data-tab-target=".-tab-item-1" type="button"> {{__('Sobre el curso')}} </button></div>
                    <div><button class="tabs__button px-20 py-8 rounded-8 text-purple-2 js-tabs-button fw-500 text-18" data-tab-target=".-tab-item-2" type="button">{{__('Lecciones')}}</button></div>
                    <div><button class="tabs__button px-20 py-8 rounded-8 text-purple-2 js-tabs-button fw-500 text-18" data-tab-target=".-tab-item-3" type="button">{{__('FAQ´S')}}</button></div>
                    <div><button class="tabs__button px-20 py-8 rounded-8 text-purple-2 js-tabs-button fw-500 text-18" data-tab-target=".-tab-item-4" type="button">{{__('Acerca del profesor')}}</button></div>
                </div>
                <div class="tabs__content mt-20 js-tabs-content">
                  <div class="tabs__pane -tab-item-1 is-active">
                  <div class="row y-gap-40">
                    <h2 class="fw-700 text-purple-2">{{__('Te damos la bienvenida al curso')}}</h2>

                    <div class="col-lg-3">
                        <div class="card padding-courses section-sm-description shadow-box-description">
                            <div class="section-lg-description ">
                                    <h3 class="text-purple-2">
                                         {{__('Sobre este curso')}}
                                    </h3>
                            </div>
                            <div class="">
                                 <p>
                                    {{__('Profesor')}}
                                 </p>

                                 <div>
                                    <p>
                                        {{$course->teacher->name}}
                                    </p>
                                 </div>
                            </div>

                            <div class="">
                                    <p>
                                         {{__('Estudiantes')}}
                                    </p>

                                    <p>
                                       {{__('Alumnos inscritos')}}
                                    </p>
                            </div>
                            <div class="">
                                    <p>
                                         {{__('Audio')}}
                                    </p>
                                    <p>
                                          {{$course->language}}
                                    </p>
                            </div>
                            <div class="">
                                    <p>
                                         {{__('Última Actualización')}}
                                    </p>
                                    <p>
                                    {{$course->updated_at->format('m - Y')}}
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card padding-courses shadow-box-description">
                             <div class="section-lg-description">
                                <h3 class="text-purple-2">
                                        {{__('Descripción')}}
                                </h3>
                                <p>
                                     {{$course->description}}
                                </p>
                                <h4>
                                        {{__('¿Qué encontrarás en este curso?')}}
                                </h4>
                                <p> Al terminar este curso podrás manejar con facilidad el Fanpage de cualquier empresa y sabrás cómo publicar contenido relevante para su target. </p>
                                <h4>
                                        {{__('¿Qué necesito?')}}
                                </h4>
                                <p>
                                    <ul>
                                        <li>
                                             Una computadora o laptop.
                                        </li>
                                        <li>
                                             Una cuenta o fanpage en facebook.
                                        </li>
                                        <li>
                                            Este curso es de nivel básico ya que repasa conceptos generales de Marketing Digital.
                                        </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                  </div>


                  </div>

                  <div class="tabs__pane -tab-item-2 ">
                    <p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Morbi sed arcu proin quis tortor non risus.</p>
                    <p class="mt-20">Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>
                  </div>

                  <div class="tabs__pane -tab-item-3 ">
                    <p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Morbi sed arcu proin quis tortor non risus.</p>
                    <p class="mt-20">Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>
                  </div>

                  <div class="tabs__pane -tab-item-4 ">
                    <p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Morbi sed arcu proin quis tortor non risus.</p>
                    <p class="mt-20">Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>
                  </div>

                </div>
              </div>

              <br><br><br><br><br><br><br><br><br>

 -->


            <div class="tabs -side js-tabs">
                <div class="row y-gap-40">
                    <div class="col-lg-4">
                        <div class="tabs__controls y-gap-5 js-tabs-controls">
                            <div>
                                <button class="tabs__button text-18 fw-500 js-tabs-button is-active" data-tab-target=".-tab-item-1" type="button">General</button>
                            </div>
                            <div>
                                <button class="tabs__button text-18 fw-500 js-tabs-button " data-tab-target=".-tab-item-2" type="button">{{__('Contenido del curso')}}</button>
                            </div>
                            <div>
                                <button class="tabs__button text-18 fw-500 js-tabs-button " data-tab-target=".-tab-item-3" type="button">{{__('Instructor')}}</button>
                            </div>
                            <div>
                                <button class="tabs__button text-18 fw-500 js-tabs-button " data-tab-target=".-tab-item-4" type="button">{{__('Valoraciones')}}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="tabs__content js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <h4 class="text-20 mb-30 fw-500">{{__('Descripción')}}</h4>
                                <p class="">
                                    {{$course->description}}
                                </p>
                            </div>

                            <div class="tabs__pane -tab-item-2">
                                <h4 class="text-20 fw-500">{{__('Contenido del curso')}}</h4>

                                <div class="d-flex justify-between items-center mt-30">
                                    <div class="">{{$course->modules->count()}} {{__('modulos')}} • {{$course->lessons()->count()}} {{__('clases')}}</div>
                                    <a href="#" class="underline text-purple-1">Expand All Sections</a>
                                </div>

                                <div class="mt-10">
                                    <div class="accordion -block-2 text-left js-accordion">

                                        @foreach($course->modules as $module)
                                            <div class="accordion__item">
                                                <div class="accordion__button py-20 px-30 bg-light-4">
                                                    <div class="d-flex items-center">
                                                        <div class="accordion__icon">
                                                            <div class="icon" data-feather="chevron-down"></div>
                                                            <div class="icon" data-feather="chevron-up"></div>
                                                        </div>
                                                        <span
                                                            class="text-17 fw-500 text-dark-1">{{$module->name}}</span>
                                                    </div>

                                                    <div>{{$module->lessons->count()}} clases
                                                        • {{$module->duration_label}}</div>
                                                </div>

                                                <div class="accordion__content">
                                                    <div class="accordion__content__inner px-30 py-30">
                                                        <div class="y-gap-20">
                                                            @foreach($module->lessons as $lesson)
                                                                <div class="d-flex justify-between">
                                                                    <div class="d-flex items-center">
                                                                        <div
                                                                            class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                                                            <div class="icon-play text-9"></div>
                                                                        </div>
                                                                        <div>
                                                                            {{$lesson->name}}
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex x-gap-20 items-center">
                                                                        <a href="#"
                                                                           class="text-14 lh-1 text-purple-1 underline">{{$lesson->duration_label}}</a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-3">
                                <h2 class="text-20 fw-500">{{__('Instructor')}}</h2>

                                <div class="mt-30">
                                    <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                                        <div class="size-120">

                                            @if(isset($course->teacher->detail->img_profile) && $course->teacher->detail->img_profile)
                                                <img src="{{$course->teacher->detail->profile_src_image}}" class="img-ratio-2" style="height: 100px;  object-fit: cover;"
                                                     alt="image" >
                                            @else
                                                <img class="object-cover" src="{{asset('assets/educrat/img/misc/verified/1.png')}}" alt="image">
                                            @endif
                                        </div>

                                        <div class="">
                                            <h5 class="text-17 lh-14 fw-500">{{$course->teacher->name}} {{$course->teacher->name}}</h5>
                                            @if(isset($teacher->career) && $teacher->career)
                                                <p class="mt-5">{{$teacher->career}}</p>
                                            @endif
                                                    <div class="d-flex x-gap-20 y-gap-10 flex-wrap items-center pt-10">
{{--                                                                                            <div class="d-flex items-center">--}}
{{--                                                                                                <div class="d-flex items-center mr-8">--}}
{{--                                                                                                    <div class="icon-star text-11 text-yellow-1"></div>--}}
{{--                                                                                                    <div class="text-14 lh-12 text-yellow-1 ml-5">4.5</div>--}}
{{--                                                                                                </div>--}}
{{--                                                                                                <div class="text-13 lh-1">Instructor Rating</div>--}}
{{--                                                                                            </div>--}}

{{--                                                                                            <div class="d-flex items-center text-light-1">--}}
{{--                                                                                                <div class="icon-comment text-13 mr-8"></div>--}}
{{--                                                                                                <div class="text-13 lh-1">23,987 Reviews</div>--}}
{{--                                                                                            </div>--}}

{{--                                                                                            <div class="d-flex items-center text-light-1">--}}
{{--                                                                                                <div class="icon-person-3 text-13 mr-8"></div>--}}
{{--                                                                                                <div class="text-13 lh-1">692 Students</div>--}}
{{--                                                                                            </div>--}}

{{--                                                                                            <div class="d-flex items-center text-light-1">--}}
{{--                                                                                                <div class="icon-wall-clock text-13 mr-8"></div>--}}
{{--                                                                                                <div class="text-13 lh-1">15 Course</div>--}}
{{--                                                                                            </div>--}}
                                                    </div>
                                        </div>
                                    </div>
                                    @if(isset($teacher->about_me) && $teacher->about_me)
                                        <div class="mt-30">
                                            <p>
                                                {{$teacher->about_me}}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-4">
                                <div class="blogPost -comments">
                                    <div class="blogPost__content">
                                        <h2 class="text-20 fw-500">Student feedback</h2>
                                        <div class="row x-gap-10 y-gap-10 pt-30">
                                            <div class="col-md-4">
                                                <div
                                                    class="d-flex items-center justify-center flex-column py-50 text-center bg-light-6 rounded-8">
                                                    <div class="text-60 lh-11  {{$course->avgRating()>=1?'text-dark-1':''}} fw-500">{{$averageRating}}</div>
                                                    <div class="d-flex x-gap-5 mt-10">
                                                        <div class="icon-star text-11 {{$averageRating>=1?'text-yellow-1':'text-dark-7'}}"></div>
                                                        <div class="icon-star text-11 {{$averageRating>=2?'text-yellow-1':'text-dark-7'}}"></div>
                                                        <div class="icon-star text-11 {{$averageRating>=3?'text-yellow-1':'text-dark-7'}}"></div>
                                                        <div class="icon-star text-11 {{$averageRating>=4?'text-yellow-1':'text-dark-7'}}"></div>
                                                        <div class="icon-star text-11 {{$averageRating>=5?'text-yellow-1':'text-dark-7'}}"></div>
                                                    </div>
                                                    <div class="mt-10">Course Rating</div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="py-20 px-30 bg-light-6 rounded-8">
                                                    <div class="row y-gap-15">

                                                        <div class="col-12">
                                                            <div class="d-flex items-center">
                                                                <div class="progress-bar w-1/1 mr-15">
                                                                    <div class="progress-bar__bg bg-light-12"></div>
                                                                    <div
                                                                        class="progress-bar__bar bg-purple-1" style="width: {{$statistic[5]}}%"></div>
                                                                </div>
                                                                <div class="d-flex x-gap-5 pr-15">
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                </div>
                                                                <div class="text-dark-1">{{$statistic[5]}}%</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="d-flex items-center">
                                                                <div class="progress-bar w-1/1 mr-15">
                                                                    <div class="progress-bar__bg bg-light-12"></div>
                                                                    <div
                                                                        class="progress-bar__bar bg-purple-1" style="width: {{$statistic[4]}}%"></div>
                                                                </div>
                                                                <div class="d-flex x-gap-5 pr-15">
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                </div>
                                                                <div class="text-dark-1">{{$statistic[4]}}%</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="d-flex items-center">
                                                                <div class="progress-bar w-1/1 mr-15">
                                                                    <div class="progress-bar__bg bg-light-12"></div>
                                                                    <div
                                                                        class="progress-bar__bar bg-purple-1" style="width: {{$statistic[3]}}%"></div>
                                                                </div>
                                                                <div class="d-flex x-gap-5 pr-15">
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                </div>
                                                                <div class="text-dark-1">{{$statistic[3]}}%</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="d-flex items-center">
                                                                <div class="progress-bar w-1/1 mr-15">
                                                                    <div class="progress-bar__bg bg-light-12"></div>
                                                                    <div
                                                                        class="progress-bar__bar bg-purple-1" style="width: {{$statistic[2]}}%"></div>
                                                                </div>
                                                                <div class="d-flex x-gap-5 pr-15">
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                </div>
                                                                <div class="text-dark-1">{{$statistic[2]}}%</div>

                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="d-flex items-center">
                                                                <div class="progress-bar w-1/1 mr-15">
                                                                    <div class="progress-bar__bg bg-light-12"></div>
                                                                    <div
                                                                        class="progress-bar__bar bg-purple-1" style="width: {{$statistic[1]}}%"></div>
                                                                </div>
                                                                <div class="d-flex x-gap-5 pr-15">
                                                                    <div class="icon-star text-11 text-yellow-1"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                    <div class="icon-star text-11 text-muted"></div>
                                                                </div>
                                                                <div class="text-dark-1">{{$statistic[1]}}%</div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h2 class="text-20 fw-500 mt-60 lg:mt-40">{{__('Comentarios')}}</h2>
                                        <ul class="comments__list mt-30">
                                            @foreach($comments as $comment)
                                            <li class="comments__item">
                                                <div class="comments__item-inner md:direction-column">
                                                    <div class="comments__img mr-20">
                                                        <div class="bg-image rounded-full js-lazy"
                                                             data-bg="img/avatars/1.png"></div>
                                                    </div>

                                                    <div class="comments__body md:mt-15">
                                                        <div class="comments__header">
                                                            <h4 class="text-17 fw-500 lh-15">
                                                                {{$comment->user->name}}
                                                                <span
                                                                    class="text-13 text-light-1 fw-400">{{$comment->created_at->diffForHumans()}}</span>
                                                            </h4>
                                                        </div>

                                                        <h5 class="text-15 fw-500 mt-15">{{$comment->title}}</h5>
                                                        <div class="comments__text mt-10">
                                                            <p>{{$comment->comment}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
