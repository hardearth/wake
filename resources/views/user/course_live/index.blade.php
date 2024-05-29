@section('styles')
    <link rel="stylesheet" href="{{asset('assets/btn-in-live/btn_in_live.css')}}" type="text/css"/>
@endsection
@extends('layouts.educrat_user')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row">
            <div class="col-xl-8 col-md-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">{{__('Clases en Vivo')}}</h2>
                    </div>
                    <div class="tabs__content py-30 px-30 js-tabs-content">
                        <div class="tabs__pane -tab-item-1 is-active">
                            <div class="row y-gap-30 pt-30">

                                @if($courseLive->count())
                                    @foreach($courseLive as $lesson)
                                        @php($categories = implode(", ", $lesson->getCategories()->toArray()))
                                        <div class="w-1/3 xl:w-1/3 lg:w-1/2 sm:w-1/1">
                                            <div class="relative">
                                                @if($lesson->url_video)
                                                    <div style="padding:56.25% 0 0 0;position:relative;">
                                                        <iframe
                                                            src="{{$lesson->url_video}}?h=22a613731e&title=0&byline=0&portrait=0"
                                                            style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                            frameborder="0"
                                                            allow="autoplay; fullscreen; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                @endif
                                                @if($lesson->is_register)
                                                    <button class="absolute-button" data-el-toggle=".js-more-1-toggle">
                                                        <span class="d-flex items-center justify-center size-35 bg-white shadow-1 rounded-8">
                                                            <i class="icon-check"></i>
                                                        </span>
                                                    </button>
                                                @endif
                                            </div>
                                            <div class="pt-15">
                                                <div class="d-flex y-gap-10 justify-between items-center">
                                                        <span class="badge bg-secondary" data-toggle="tooltip"
                                                              data-placement="top" title="{{$categories}}">
                                                            @if(strlen($categories >= 15))
                                                                {{substr($categories, 0, 15)}} ...
                                                            @else
                                                                {{$categories}}
                                                            @endif
                                                        </span>
                                                    <div class="d-flex items-center">
                                                        <div class="text-14 lh-1">{{__('Inscritos')}}
                                                            : {{$lesson->course_registered_total()}}</div>
                                                    </div>
                                                </div>
                                                <h3 class="text-16 fw-500 lh-15 mt-10">{{$lesson->title}}</h3>
                                                <div class="d-flex y-gap-10 justify-between items-center mt-10">
                                                    <div class="text-dark-1">
                                                        Fecha: {{$lesson->lesson_date_at->translatedFormat('d-M h:i')}}</div>
                                                </div>
                                                <div class="col-12 mt-10 " style="width: 100%; text-align: center;">
                                                    @if(!$lesson->is_register)
                                                        <a href="javascript:void(0)"
                                                           onclick="registerLesson('{{$lesson->slug}}','{{$lesson->title}}')"
                                                           class="button -sm -purple-1 text-white d-inline-block">
                                                            {{__('Registrarse')}}
                                                        </a>
                                                    @endif
                                                    @if($lesson->in_live() && $lesson->is_register)
                                                        <div class="d-flex mt-0">
                                                            <div class="col-md-12">
                                                                <div class="d-flex items-center">
                                                                    <i class="icon-creative-web text-16 mr-8"></i>
                                                                    <div class="text-14 lh-1">{{__('Meeting')}}:
                                                                        <a id="live-button" class="btn btn-danger text-white"
                                                                           href="{{$lesson->url_meeting}}" target="_blank">
                                                                            <div id="circle"></div>
                                                                            <span class="button-label">{{'En Vivo'}}</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div class="row justify-center pt-30">
                                            <div class="col-auto">
                                                {{$courseLive->links()}}
                                            </div>
                                        </div>
                                @else
                                    <div class="d-flex">
                                        <div class="ml-15">
                                            <h4 class="text-15 lh-16 fw-500">{{__('Sin registros')}}</h4>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">{{__('Inscritos')}}</h2>
                    </div>
                    <div class="py-30 px-30">
                        <div class="y-gap-40">
                            @php($j = 0)
                            @forelse(Auth::user()->course_live_register as $live)
                                @php($j++)
                                <div class="d-flex items-center @if($j > 1) border-top-light @endif">
                                    <div class="shrink-0">
                                        <i class="icon-check text-16 mr-8"></i>
                                    </div>
                                    <div class="ml-12">
                                        <h4 class="text-15 lh-1 fw-500">{{__('Te inscribiste al evento')}}
                                            "{{$live->course_live->title}}"</h4>
                                        <div class="text-13 lh-1 mt-10"><i
                                                class="icon-person-3 text-16 mr-8"></i>{{$live->course_live->teacher->name}}
                                        </div>
                                        <div class="text-13 lh-1 mt-10"><i
                                                class="icon-clock-2 text-16 mr-8"></i>{{$live->course_live->lesson_date_at->translatedFormat('d-M h:i')}}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex items-center">
                                    <div class="ml-12">
                                        <h4 class="text-15 lh-1 fw-500">{{__('No hay Eventos Inscritos')}}</h4>
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        function registerLesson(slug, name) {
            Swal.fire({
                title: name,
                text: "{{__('¿Está seguro que desea registrarse a la clase?')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{__('Si, registrarme')}}",
                cancelButtonText: "{{__('No, Cancelar')}}"
            }).then((result) => {
                if (result.isConfirmed) {
                    let route = "{{route('user.live.register','%slug')}}";
                    route = route.replace('%slug', slug)
                    window.location.href = route;
                }
            })
        }
    </script>
@endsection
