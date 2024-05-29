@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Eventos')}} <span
                            class="badge badge-gradient-success">{{$activities->count()}}</span></h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{route('admin.activities.create')}}"
                               class="btn btn-sm btn-soft-primary"> {{__('Nuevo')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="bg-auto">
                            <th>{{__('Nombre')}}</th>
                            <th>{{__('Fecha')}}</th>
                            <th>{{__('Creación')}}</th>
                            <th>{{__('Opciones')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($activities->count())
                        @foreach($activities as $activity)
                            <tr>
                                <td>
                                    <a href="{{route('admin.activities.edit',$activity->id)}}">
                                        <i class="ri-link"></i> {{$activity->name}}
                                    </a>
                                </td>
                                <td>
                                    {{$activity->date->format('d/m/Y')}}
                                </td>
                                <td>{{$activity->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.activities.edit',$activity->id)}}" class="mr-10 text-green-500"
                                       title="{{__('Editar')}}"><i class="ri-edit-box-line"></i> {{__('Editar')}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-muted text-center py-5">{{__('Sin registros')}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12" style="padding: 0px 30px;">
                            {{$activities->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
