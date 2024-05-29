@extends('layouts.educrat_user')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">
                <h1 class="text-30 lh-12 fw-700">{{__('Eventos')}}</h1>
            </div>
        </div>


        <div class="row y-gap-30 pt-30">
            <div class="col-xl-6 col-md-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">{{__('Próximos eventos')}}</h2>
                    </div>
                    <div class="py-30 px-30">
                        <div class="y-gap-40">
                            @foreach($activities as $activity)
                                <div class="d-flex">
                                    <div class="shrink-0">
                                        <img src="{{asset("/storage/images/$activity->featured_image")}}"
                                             style="max-height: 100px" alt="image">
                                    </div>
                                    <div class="ml-15">
                                        <a href="{{route('public.event',$activity)}}"><h4 class="text-15 lh-16 fw-500">{{$activity->name}}</h4></a>

                                        <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                            <div class="d-flex items-center">
                                                <img class="size-16 object-cover mr-8"
                                                     src="/assets/educrat/img/general/avatar-1.png" alt="icon">
                                                <div
                                                    class="text-14 lh-1">{{$activity->presenters()->first()?->name}}</div>
                                            </div>

                                            <div class="d-flex items-center">
                                                <i class="icon-clock-2 text-16 mr-8"></i>
                                                <div
                                                    class="text-14 lh-1">{{$activity->date->translatedFormat('d/F/Y')}}</div>
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
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">{{__('Inscrito')}}</h2>
                    </div>
                    <div class="py-30 px-30">
                        <div class="y-gap-40">
                            @foreach($activitiesRegister as $actr)
                                <div class="d-flex items-center ">
                                    <div class="shrink-0">
                                        <img src="{{asset("/storage/images/".$actr->activity->featured_image)}}" style="max-height: 70px"  alt="image">
                                    </div>
                                    <div class="ml-12">
                                        <h4 class="text-15 lh-1 fw-500">Te has inscrito al evento "{{$actr->activity->name}}"</h4>
                                        <div class="text-13 lh-1 mt-10">{{$actr->activity->date}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
