@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Edición Clase En Vivo')}}</h4>
                </div>
                <form action="{{ route('admin.course.live.update', $liveLesson) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('admin.course_live._form')
                    </div>
                    <div class="card-footer float-end">
                        <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
