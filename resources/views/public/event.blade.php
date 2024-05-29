@extends('layouts.educrat')
@section ('banner')
    <section class="banner-header-event masthead bg-header-courses js-mouse-move-container">
        <div class="masthead__bg">
        </div>
        <div class="container">
            <div data-anim-wrap class="row y-gap-50 justify-between items-end">

            </div>
        </div>
        </div>
    </section>
@endsection
@section('content')

    <section class="page-header -type-2">
        <div class="page-header__bg">
            <div class="bg-image js-lazy" data-bg="{{asset("/storage/images/$activity->banner_image")}}"></div>
        </div>
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="page-header__info d-flex items-center">

                            <div class="d-flex items-center text-white mr-15">
                                <div class="icon icon-calendar-2"></div>
                                <div class="text-14 ml-8">{{$activity->date->translatedFormat('d F, Y')}}</div>
                            </div>
                        </div>
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title text-white mt-20">{{$activity->name}}</h1>
                        </div>
                        <div data-anim="slide-up delay-2">
                            @include('components.clock',['date'=>$activity->date])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-50 layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50">
                <div class="col-xl-8 col-lg-8 lg:order-2">
                    <h4 class="text-20">{{__('Acerca del evento')}}</h4>
                    <p class="text-light-1 mt-30" style="text-align: justify">
                        {!! $activity->description !!}
                    </p>
                    <div class="mt-60">
                        <h4 class="text-20 mb-30">{{__('Presentadores')}}</h4>
                        <div class="row y-gap-30">
                            @if($activity->presenters())
                                @foreach($activity->presenters() as $presenter)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="text-center">
                                            <img src="{{asset('assets/educrat/img/speakers/1.png')}}" alt="image">
                                            <h5 class="text-17 fw-500 mt-20">{{$presenter->name}}</h5>
                                            @if(isset($presenter->teacher->career))
                                                <p class="">{{$presenter->teacher->career}}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 lg:order-1">
                    <div class="event-info bg-white rounded-8 px-30 py-30 border-light shadow-1">
                        <div class="d-flex justify-between items-center">
                            <div
                                class="text-24 lh-1 fw-500 text-dark-1">{{$activity->date->translatedFormat('d F')}}</div>

                            <div class="d-flex items-center">

                                @if($activity->category)
                                    <div class="text-14 fw-500 text-dark-1 px-15 py-5 bg-green-1 rounded-4">
                                        {{$activity->category->name}}
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="d-flex justify-between mt-30 pb-10">
                            <div class="d-flex items-center text-dark-1">
                                <div class="icon-location"></div>
                                <div class="ml-10">Cupos totales</div>
                            </div>
                            <div>{{$activity->participants}}</div>
                        </div>

                        <div class="d-flex justify-between pt-10 border-top-light">
                            <div class="d-flex items-center text-dark-1">
                                <div class="icon-location"></div>
                                <div class="ml-10">Inscritos</div>
                            </div>
                            <div>{{$activity->registered->count()}}</div>
                        </div>

                        @if(Auth::check())
                            <a href="{{route('user.register-activity',$activity)}}"
                               class="button -md col-12 -purple-1 text-white mt-30">{{__('Inscribirme')}}</a>

                        @else
                            <a href="{{route('register')}}"
                               class="button -md col-12 -purple-1 text-white mt-30">{{__('Registrar mi usuario')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
