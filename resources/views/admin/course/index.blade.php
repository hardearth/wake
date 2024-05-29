@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Cursos')}} <span
                            class="badge badge-gradient-success">{{$courses->count()}}</span></h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{route('admin.course.create')}}"
                               class="btn btn-sm btn-soft-primary"> {{__('Nuevo')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="bg-auto">
                            <th>{{__('Nombre')}}</th>
                            <th>{{__('Modulos')}}</th>
                            <th>{{__('Clases')}}</th>
                            <th>{{__('Usuario')}}</th>
                            <th>{{__('Creación')}}</th>
                            <th>{{__('Opciones')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>
                                    <a href="{{route('admin.course.show',$course->id)}}">
                                        <i class="ri-link"></i> {{$course->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$course->modules->count()}}
                                </td>
                                <td>
                                    {{$course->lessons()->count()}}
                                </td>
                                <td>
                                    <a href="{{route('admin.cruds.user.edit',$course->created_user->id)}}">
                                        {{$course->created_user->name}}
                                    </a>
                                </td>
                                <td>{{$course->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.course.show',$course->id)}}" class="mr-10 text-green-500"
                                       title="{{__('Editar')}}"><i class="ri-edit-box-line"></i> {{__('Editar')}}
                                    </a>
                                    <a href="{{route('admin.course.delete',$course->id)}}" class="mr-10 text-green-500"
                                       title="{{__('Eliminar')}}"><i class="ri-delete-back-fill"></i> {{__('Eliminar')}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12" style="padding: 0px 30px;">
                            {{$courses->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
