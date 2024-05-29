@extends('layouts.educrat_user')
@section('content')

    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">
                <h1 class="text-30 lh-12 fw-700">Mercado de Cursos</h1>
            </div>
        </div>
        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white shadow-4 h-100">
                    <div class="py-30 px-30">
                        <h4 class="text-24 lh-12 fw-500">{{__('Copia tu enlace e invita<')}}</h4>
                            <br>
                            <div class="d-flex justify-content-between">
                                <!-- <p class="mt-3 fw-medium text-muted mb-0">{{__('Comparte este link de Referidos con tus contactos para obtener más beneficios')}}</p> -->
                            </div>
                            <div class="mt-3 mb-10 alert alert-success d-none" role="alert">
                                {{'Se ha copiado url en portapapeles'}}
                            </div>
                            <div class="col-md-12 d-inline-flex">
                                <input type="text" id="text_url" style="background-color: #E0F7FA; cursor: pointer"
                                       value="{{route('public.index.referred',Auth::user()->getUrlReferred())}}"
                                       class="form-control" readonly>
                                <button class="button -blue-1 text-white col-md-4" type="button" id="copyUrl"
                                        style="border-radius: 0 5px 5px 0">
                                    {{__('Copiar')}}
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row y-gap-30">
        <div class="col-12">
            <div class="rounded-16 bg-white shadow-4 h-100">
                <div class="py-30 px-30">
                    <h4 class="text-24 lh-12 fw-500">Cursos mas vendidos</h4>
                    <div class="mt-10">{{__('Aquí encontrarás los cursos mas vendidos el mes pasado.')}}</div>
                    <div data-anim-wrap class="container">
                        <div class="relative">
                            <div class="overflow-hidden pt-40 lg:pt-30 js-section-slider" data-gap="30" data-loop
                                 data-pagination data-nav-prev="js-courses-prev" data-nav-next="js-courses-next"
                                 data-slider-cols="xl-4 lg-3 md-2 sm-2 ">
                                <div class="swiper-wrapper pb-20">

                                    @foreach($courses as $course)
                                        <div class="swiper-slide">

                                            <div data-anim-child="slide-up delay-1">
                                                <a href=""{{route('user.course.lesson',$course->slug)}}"
                                                class="coursesCard -type-1 px-10 py-10 border-light bg-white
                                                rounded-8">
                                                <div class="relative">
                                                    <div class="coursesCard__image overflow-hidden rounded-8">
                                                        @if($course->image)
                                                            <img class="w-1/1 rounded-8"
                                                                 src="{{$course->course_src_image}}" alt="image"
                                                                 style="width: 325px;">
                                                        @else
                                                            <img class="w-1/1 rounded-8"
                                                                 src="{{asset('assets/educrat/img/coursesCards/1.png')}}"
                                                                 alt="image">
                                                        @endif
                                                        <div class="coursesCard__image_overlay rounded-8"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                    </div>
                                                </div>

                                                <div class="h-100 px-10 pt-10">
                                                    <div class="d-flex items-center">
                                                        <div
                                                            class="text-14 lh-1 {{$course->avgRating()>=1?'text-yellow-1':''}} mr-10">{{$course->avgRating()}}</div>
                                                        <div class="d-flex x-gap-5 items-center">
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=1?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=2?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=3?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=4?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=5?'text-yellow-1':'text-dark-7'}}"></div>
                                                        </div>
                                                        <div class="text-13 lh-1 ml-10">(?)</div>
                                                    </div>

                                                    <div
                                                        class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{$course->name}}</div>

                                                    <div class="d-flex x-gap-10 items-center pt-10">

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/coursesCards/icons/1.svg')}}"
                                                                    alt="icon">
                                                            </div>
                                                            <!-- cantidad de ventas -->
                                                            <div class="text-14 lh-1">390 Ventas</div>
                                                        </div>

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/coursesCards/icons/2.svg')}}"
                                                                    alt="icon">
                                                            </div>
                                                            <!-- Tiempo publicado -->
                                                            <div
                                                                class="text-14 lh-1">{{$course->created_at->diffForHumans()}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="coursesCard-footer">
                                                        <div class="coursesCard-footer__author">
                                                            @if(isset($course->teacher->detail->img_profile) && $course->teacher->detail->img_profile)
                                                                <img
                                                                    src="{{$course->teacher->detail->profile_src_image}}"
                                                                    class="img-ratio-2"
                                                                    style="height: 30px;  object-fit: cover; border-radius: 16px;"
                                                                    alt="image">
                                                            @else
                                                                <img class="object-cover"
                                                                     src="{{asset('assets/educrat/img/misc/verified/1.png')}}"
                                                                     alt="image">
                                                            @endif
                                                            <div>{{$course->name}}</div>
                                                        </div>

                                                        <div class="coursesCard-footer__price">
                                                            <div></div>
                                                            <div>{{$course->price}}$</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button
                                class="section-slider-nav -prev -dark-bg-dark-2 -outline-dark-1 -absolute-out size-50 rounded-full xl:d-none js-courses-prev">
                                <i class="icon icon-arrow-left text-24"></i>
                            </button>

                            <button
                                class="section-slider-nav -next -dark-bg-dark-2 -outline-dark-1 -absolute-out size-50 rounded-full xl:d-none js-courses-next">
                                <i class="icon icon-arrow-right text-24"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row y-gap-30">
        <div class="col-12">
            <div class="rounded-16 bg-white shadow-4 h-100">
                <div class="py-30 px-30">
                    <h4 class="text-24 lh-12 fw-500">Cursos mejor valorados</h4>
                    <div class="mt-10">Aquí encontrarás los cursos con mas valoraciones.</div>
                    <div data-anim-wrap class="container">
                        <div class="relative">
                            <div class="overflow-hidden pt-40 lg:pt-30 js-section-slider" data-gap="30" data-loop
                                 data-pagination data-nav-prev="js-courses-prev" data-nav-next="js-courses-next"
                                 data-slider-cols="xl-4 lg-3 md-2 sm-2 ">
                                <div class="swiper-wrapper pb-20">
                                    @foreach($courses as $course)
                                        <div class="swiper-slide">

                                            <div data-anim-child="slide-up delay-1">
                                                <a href=""{{route('user.course.lesson',$course->slug)}}"
                                                class="coursesCard -type-1 px-10 py-10 border-light bg-white
                                                rounded-8">
                                                <div class="relative">
                                                    <div class="coursesCard__image overflow-hidden rounded-8">
                                                        @if($course->image)
                                                            <img class="w-1/1 rounded-8"
                                                                 src="{{$course->course_src_image}}" alt="image"
                                                                 style="width: 325px;">
                                                        @else
                                                            <img class="w-1/1 rounded-8"
                                                                 src="{{asset('assets/educrat/img/coursesCards/1.png')}}"
                                                                 alt="image">
                                                        @endif
                                                        <div class="coursesCard__image_overlay rounded-8"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                    </div>
                                                </div>

                                                <div class="h-100 px-10 pt-10">
                                                    <div class="d-flex items-center">
                                                        <div
                                                            class="text-14 lh-1 {{$course->avgRating()>=1?'text-yellow-1':''}} mr-10">{{$course->avgRating()}}</div>
                                                        <div class="d-flex x-gap-5 items-center">
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=1?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=2?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=3?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=4?'text-yellow-1':'text-dark-7'}}"></div>
                                                            <div
                                                                class="icon-star text-11 {{floor($course->avgRating())>=5?'text-yellow-1':'text-dark-7'}}"></div>
                                                        </div>
                                                        <div class="text-13 lh-1 ml-10">(?)</div>
                                                    </div>

                                                    <div
                                                        class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{$course->name}}</div>

                                                    <div class="d-flex x-gap-10 items-center pt-10">

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/coursesCards/icons/1.svg')}}"
                                                                    alt="icon">
                                                            </div>
                                                            <!-- cantidad de ventas -->
                                                            <div class="text-14 lh-1">390 Ventas</div>
                                                        </div>

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/coursesCards/icons/2.svg')}}"
                                                                    alt="icon">
                                                            </div>
                                                            <!-- Tiempo publicado -->
                                                            <div
                                                                class="text-14 lh-1">{{$course->created_at->diffForHumans()}}</div>
                                                        </div>
                                                    </div>

                                                    <div class="coursesCard-footer">
                                                        <div class="coursesCard-footer__author">
                                                            @if(isset($course->teacher->detail->img_profile) && $course->teacher->detail->img_profile)
                                                                <img
                                                                    src="{{$course->teacher->detail->profile_src_image}}"
                                                                    class="img-ratio-2"
                                                                    style="height: 30px;  object-fit: cover; border-radius: 16px;"
                                                                    alt="image">
                                                            @else
                                                                <img class="object-cover"
                                                                     src="{{asset('assets/educrat/img/misc/verified/1.png')}}"
                                                                     alt="image">
                                                            @endif
                                                            <div>{{$course->name}}</div>
                                                        </div>

                                                        <div class="coursesCard-footer__price">
                                                            <div></div>
                                                            <div>{{$course->price}}$</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <button
                                class="section-slider-nav -prev -dark-bg-dark-2 -outline-dark-1 -absolute-out size-50 rounded-full xl:d-none js-courses-prev">
                                <i class="icon icon-arrow-left text-24"></i>
                            </button>

                            <button
                                class="section-slider-nav -next -dark-bg-dark-2 -outline-dark-1 -absolute-out size-50 rounded-full xl:d-none js-courses-next">
                                <i class="icon icon-arrow-right text-24"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $("#copyUrl, #text_url").click(function() {
            // Obtiene el valor del input
            let inputValue = $("#text_url").val();

            // Crea un elemento temporal de tipo textarea
            let tempTextarea = $("<textarea>");
            $("body").append(tempTextarea);
            tempTextarea.val(inputValue);

            // Selecciona y copia el contenido del textarea
            tempTextarea.select();
            document.execCommand("copy");

            // Elimina el textarea temporal
            tempTextarea.remove();
            $('.alert-success').removeClass('d-none')
        });
    </script>
@endsection
