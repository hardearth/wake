@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Usuarios')}} <span
                            class="badge badge-gradient-success">{{$users->count()}}</span></h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn  btn-sm btn-soft-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                {{__('Nuevo')}}
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="staticBackdropLabel">{{__('Nuevo usuario')}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        {{Form::open(['route'=>'admin.cruds.user.store'])}}
                                        <div class="modal-body">
                                            @include('admin.user._form')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal">{{__('Cancelar')}}</button>
                                            <button type="submit"
                                                    class="btn btn-primary btn-sm">{{__('Continuar')}}</button>
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
                            <th>{{__('Correo')}}</th>
                            <th>{{__('Nombre')}}</th>
                            <th>{{__('Role')}}</th>
                            <th>{{__('Creación')}}</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{route('admin.cruds.user.edit',$user->id)}}"><i
                                            class="ri-link"></i> {{$user->email}}</a></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.cruds.user.edit',$user->id)}}" class="mr-10 text-green-500"
                                       title="{{__('Editar')}}"><i class="ri-edit-box-line"></i></a>
                                    <a href="{{route('admin.cruds.user.edit',$user->id)}}" class="mr-5 text-red-600"
                                       title="{{__('Eliminar')}}"><i class="ri-close-circle-line"></i></a>
                                    <a href="{{route('impersonate',$user->id)}}" class="mr-5 text-blue"
                                       title="{{__('Impersonar')}}"><i class="ri-user-search-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12" style="padding: 0px 30px;">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
