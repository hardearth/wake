@extends('layouts.educrat_user')
@section('content')

    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">
                <h1 class="text-30 lh-12 fw-700">Mis Afiliados</h1>
            </div>
        </div>


        <div class="row y-gap-30">
            <div
                class="d-flex justify-between items-center py-35 px-30 rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                @if($referred->count())
                    <div class="col-12">
                        <ul class="list-referals">

                            @foreach($referred as $r)
                                <li>
                                <span class="has_subs">
                                  <img src="{{asset('assets/educrat/img/general/mini-logo.jpg')}}"
                                       class="img-responsive pull-left mr-xxs" style="border-radius: 50%;">
                                </span>
                                    <h3 class="aff_name"><a href="#">{{$r->name}}</a>
                                    </h3>
                                    <span class="pull-right"></span>
                                    <span class="aff_details">{{__('Directo')}}</span>
                                    <a href="#"
                                       class="text-primary aff_details m-noborder mml-0 mpl-0">{{$r->email}}</a>
                                    <span
                                        class="pull-right hidden">Fecha activación: {{$r->created_at->translatedFormat('d F Y')}}</span>
                                    {{--                            <span class="aff_details">Teléfono: {{$r->detail?->phone_prefix }} {{$r->detail?->phone_number}}  </span>--}}
                                    <span class="aff_details">Afiliados: {{$r->referred->count()}}</span>
                                    @if( $r->referred->count())
                                        <button onclick="actualizarClass('miDiv{{$r->id}}','miClase')">Ver 2do nivel
                                        </button>
                                        <ul class="sub-parent-ul hidden-list" id="miDiv{{$r->id}}">
                                            @foreach($r->referred as $second)
                                                <li>
                                                    <img
                                                        src="{{asset('assets/educrat/img/general/mini-logo.jpg')}}"
                                                        class="img-responsive pull-left mr-xxs"
                                                        style="border-radius: 50%;">
                                                    <h3 class="aff_name">
                                                        <a href="#">{{$second->name}}</a>
                                                    </h3>
                                                    <span class="aff_details">{{__('Indirecto')}} {{$second->referred->count()}}</span>
                                                    <a href="#"
                                                       class="text-primary aff_details m-noborder mml-0 mpl-0">{{$second->email}}</a>
                                                    <span
                                                        class="pull-right hidden">Fecha activación: {{$second->created_at->translatedFormat('d F Y')}}</span>
                                                    {{--                                    <span class="aff_details">Teléfono: 920747181</span>--}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach

                        </ul>
                        <div class="mt-10">
                            {{$referred->links()}}
                        </div>
                    </div>
                @else
                    <div class="col-12 text-center text-muted">
                        <h4 style="color: #B0BEC5">{{__('Sin afiliados')}}</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function actualizarClass(domId, ccsClass) {
            // Obtener el botón y el div por su ID
            var div = document.getElementById(domId);

            // Verificar si el div tiene la clase deseada
            if (div.classList.contains(ccsClass)) {
                // Si la tiene, se la quitamos
                div.classList.remove(ccsClass);
            } else {
                // Si no la tiene, se la agregamos
                div.classList.add(ccsClass);
            }
        }
    </script>
@endsection
