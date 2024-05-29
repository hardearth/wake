@extends('layouts.velzon')
@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header"></div>--}}
{{--                {{Form::open(['route'=>'admin.membership.create'])}}--}}
{{--                <div class="card-body">--}}
{{--                    @include('admin.memberships._form')--}}
{{--                </div>--}}
{{--                <div class="card-footer text-right">--}}
{{--                    {{Form::submit('Continuar',['class'=>'btn btn-primary'])}}--}}
{{--                </div>--}}
{{--                {{Form::close()}}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Membresias')}} <span class="badge badge-outline-primary">{{$memberships->count()}}</span></h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn  btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                {{__('Nuevo')}}
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{__('Nueva membresía')}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        {{Form::open(['route'=>'admin.membership.create'])}}
                                        <div class="modal-body">
                                            @include('admin.memberships._form')
                                        </div>
                                        <div class="modal-footer text-right">
                                            {{Form::submit('Continuar',['class'=>'btn btn-primary'])}}
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="bg-auto">
                            <th>{{__('Nombre')}}</th>
                            <th>{{__('Precio')}}</th>
                            <th>{{__('Creación')}}</th>
                            <th>{{__('Opciones')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memberships as $membership)
                            <tr>
                                <td><a href="{{route('admin.membership.edit',$membership->id)}}"><i class="ri-link"></i> {{$membership->name}}</a></td>
                                <td>$ {{$membership->price}}</td>
                                <td>{{$membership->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.membership.edit',$membership->id)}}" class="mr-5 text-green-500" title="{{__('Editar')}}">
                                    {{__('Editar')}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 px-6 py-3">
                            {{$memberships->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
