@extends('layouts.velzon')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{__('Evento')}}</h4>
                </div>
                <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
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
