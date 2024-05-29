@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Eventos')}}</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
{{--                            <a href="{{route('admin.activities.create')}}"--}}
{{--                               class="btn btn-sm btn-soft-primary"> {{__('Editar')}}</a>--}}
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.activities.store',$activity) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @include('admin.activity._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('Continuar')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
