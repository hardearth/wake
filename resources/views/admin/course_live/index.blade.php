@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Clases en vivo')}} <span
                            class="badge badge-gradient-success">{{$liveLessons->count()}}</span></h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{route('admin.course.live.create')}}"
                               class="btn btn-sm btn-soft-primary"> {{__('Nuevo')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="bg-auto">
                            <th>#</th>
                            <th>{{__('Titulo')}}</th>
                            <th>{{__('Fecha Clase')}}</th>
                            <th>{{__('Profesor')}}</th>
                            <th>{{__('Fecha Creación')}}</th>
                            <th>{{__('Opciones')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($liveLessons->count())
                        @foreach($liveLessons as $lesson)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$lesson->title}}</td>
                                <td>{{$lesson->lesson_date_at}}</td>
                                <td>{{$lesson->teacher->name}}</td>
                                <td>{{$lesson->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.course.live.edit',$lesson->id)}}" class="mr-10 text-green-500"
                                       title="{{__('Editar')}}"><i class="ri-edit-box-line"></i> {{__('Editar')}}
                                    </a>
                                    <a href="{{route('admin.course.live.delete',$lesson->id)}}" class="mr-10 text-green-500"
                                       title="{{__('Eliminar')}}"><i class="ri-delete-bin-3-line"></i> {{__('Eliminar')}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-muted text-center py-5">{{__('Sin registros')}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12" style="padding: 0px 30px;">
                            {{$liveLessons->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
