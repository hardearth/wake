@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('Membresia')}}</h4>
                    <span class="text-muted">{{__('Editar')}}</span>
                </div>
                {{Form::open(['route'=>'admin.membership.update'])}}
                {{Form::hidden('id',$membership->id)}}
                <div class="card-body">
                    @include('admin.memberships._form',['m'=>$membership])
                </div>
                <div class="card-footer">
                    <a href="{{route('admin.membership.index')}}" class="btn btn-outline-info mr-4">{{__('Regresar')}}</a>
                    {{Form::submit('Actualizar',['class'=>'btn btn-primary'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-12">
            <div class="card card-height-100">
                <div class="card-header">
                    <h4>{{__('Cursos')}}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{Form::open(['route'=>'admin.membership.course.add'])}}
                            {{Form::hidden('memberships_id',$membership->id)}}
                            <div class="input-group mb-3">
                                {{Form::select('courses_id',$courses,null,['class'=>'form-select','placeholder'=>__('Seleccione...')])}}
                                <button class="btn btn-outline-secondary" type="submit">{{__('Agregar')}}</button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if($membershipCourses->count())
                                <table class="table table-hover table-striped">
                                    @foreach($membershipCourses as $mc)
                                        <tr>
                                            <th>{{$mc->course?->name}}</th>
                                            <td>{{$mc->course?->description}}</td>
                                            <td class="text-center">
                                                {{Form::open(['route'=>'admin.membership.course.delete'])}}
                                                {{Form::hidden('membership_courses_id',$mc->id)}}

                                                <button class="btn btn-link btn-sm" type="submit">
                                                    <i class="ri-close-line"></i>
                                                </button>

                                                {{Form::close()}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                @else
                                <div class="mt-5 text-center">
                                    <h4 class="text-muted">{{__('No posee ningun curso asociado')}}</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
