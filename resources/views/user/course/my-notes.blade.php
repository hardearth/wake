@extends('layouts.educrat_user')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">{{__('Mis notas')}}</h1>
                <div class="mt-10">{{__('Revisa las notas de tus cursos aquí')}}.</div>

            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex items-center py-20 px-30 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">{{__('Todas las notas')}}</h2>
                    </div>

                    <div class="py-30 px-30">
                        <div class="row y-gap-30">

                            @foreach($userNotes as $note)
                                <div class="md:direction-column">
                                    <div class="d-flex ">

                                        <div class="comments__body md:mt-15">
                                            <div class="comments__header">

                                                <h4 class="text-17 fw-500 lh-15">
                                                    {{$note->course_lesson->course->name}} - {{$note->course_lesson->name}}
                                                    <span class="text-11 text-light-1 fw-400">{{$note->date_create}}</span>
                                                </h4>
                                            </div>

                                            <div class="comments__text mt-10 ml-3">
                                                <p class="text-14 text-light-1 fw-400">{{$note->note}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <div class="col-md-12" style="padding: 0px 30px;">
                                    {{$userNotes->links()}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
