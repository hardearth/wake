@extends('layouts.educrat')
@section ('banner')
    <section class="banner-header-courses masthead -type-1 bg-header-courses js-mouse-move-container">
        <div class="masthead__bg">
        </div>
        <div class="container">
          <div data-anim-wrap class="row y-gap-50 justify-between items-end">
            <div class="col-xl-6 col-lg-6 col-sm-10 order-2 order-sm-1">
              <div class="masthead__content text-center">
                <h1 data-anim-child="slide-up" class="masthead__title">
                    {{__('Sin texto')}}
                </h1>
                <!-- <div class="mt-40" data-anim-child="slide-up">
                    <ul class="count-offert section-launch text-white ">
                        <li>30</li>
                        <li>14</li>
                        <li>50</li>
                        <li>10</li>
                    </ul>
                </div> -->
                <p data-anim-child="slide-up delay-1" class="masthead__text text-24 mt-40">
                      {{__('Sin texto, Sin texto  Sin texto  Sin texto Sin texto  ')}}
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
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">{{__('Eventos')}}</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

                            <p class="page-header__text">{{__('Encuentra toda la información de nuestros eventos gratis y pagos aquí')}}
                                .</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="tabs -pills js-tabs">
                <div class="tabs__pane -tab-item-1 is-active">
                    <div data-anim="slide-up delay-4" class="row y-gap-30 pt-30">
                        @foreach($activities as $act)
                            <div class="col-lg-4 col-md-6">
                                <div class="eventCard -type-1">
                                    <div class="eventCard__img">

                                        <img src="{{asset("/storage/images/$act->featured_image")}}" alt="image">
                                    </div>
                                    <div class="eventCard__bg bg-white">
                                        <div class="eventCard__content y-gap-10">
                                            <div class="eventCard__inner">
                                                <h4 class="eventCard__title text-17 fw-500">
                                                    <a href="{{route('public.event',$act)}}">{{$act->name}}</a>
                                                </h4>
                                                <div class="d-flex x-gap-15 pt-10">
                                                    <div class="d-flex items-center">
                                                        <div class="icon-calendar-2 text-16 mr-8"></div>
                                                        <div
                                                            class="text-14">{{$act->date->translatedFormat('d F, Y')}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="eventCard__button">
                                                @if(Auth::check())
                                                    <a href="{{route('user.register-activity',$act)}}"
                                                       class="button -sm -rounded -outline-purple-1 text-purple-1 px-25">{{__('Inscribirme')}}</a>
                                                @else
                                                    <a href="{{route('register')}}"
                                                       class="button -sm -rounded -outline-purple-1 text-purple-1 px-25">{{__('Registrar mi usuario')}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row justify-center pt-60 lg:pt-40">
                            <div class="col-auto">
                                {{$activities->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
