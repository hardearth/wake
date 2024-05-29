@extends('layouts.educrat_user')
@section('content')
    @include('user.course.partials.accordion-lessons')

    <section class="layout-pb-lg lg:pt-40">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xxl-8 col-xl-7 col-lg-8">
                    <div class="relative pt-40">
                        <div class="pb-30">
                            <a href="{{route('user.home')}}"
                               class="btn btn-outline-primary float-end">{{__('Regresar')}}</a>
                            @if(!$lesson && $course)
                                <h1 class="mb-3">{{__('Introducción')}}</h1>
                                <img class="w-1/1 rounded-8" src="{{$course->course_src_image}}" alt="image">
                            @endif
                            <h2>{{$lesson?$lesson->name:$course->name}}</h2>
                            <p class="text-muted">{{$course->name}} / {{$module?$module->name: $course->title}}</p>

                        </div>

                        @if($lesson)

                            @if($lesson->url_video)
                                <div id="vimeo-player"></div>
                            @endif
                            @if($lesson->documents->count())
                                <div class="row mt-4">
                                    <div class="col-md-12 mb-15">
                                        <h4 class="text-18 fw-500">{{__('Documentos')}}</h4>
                                    </div>
                                    @foreach($lesson->documents as $document)
                                        <a href="{{route('user.course.document-download',$document)}}" target="_blank"
                                           class="bg-blue-light rounded-8 mb-4">
                                            <div class="col-md-12 w-100 p-3 rounded-3">
                                                <p class="text-15"><i
                                                        class="fa fa-download float-end"></i>{{$document->name}}</p>
                                                <span>{{$document->description}}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        @elseif($course)
                            @if($course->url_video)
                                <div style="padding:56.25% 0 0 0;position:relative;">
                                    <iframe
                                        src="{{$course->url_video}}?h=22a613731e&title=0&byline=0&portrait=0"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                        frameborder="0"
                                        allow="autoplay; fullscreen; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                        @endif

                    </div>

                    <div class="mt-5 lg:mt-3">
                        <h4 class="text-18 fw-500">{{__('Descripción')}}</h4>
                        <p class="mt-30 mb-5">
                            {{$lesson?$lesson->description:$course->description}}
                        </p>
                        @include('user.course.partials.comment-modal')
                    </div>
                </div>
            </div>

            @if($lesson)
                <div class="row justify-center mt-10">
                    <div class="col-xxl-8 col-xl-7 col-lg-8">
                        <div class="card">
                            <div class="card-title mt-10 d-inline-flex">
                                <h4 class="text-18 fw-500 ml-10">{{__('Mis notas')}}</h4>
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-success ml-3" id="btn_add_note"><i class="fa fa-plus"></i>{{__('Nueva nota')}}</a>
                            </div>
                            <div class="card-body">

                                <div class="d-none" id="add-new-note" >
                                    <div class="form-group">
                                        <textarea class="form-control" name="name_note" id="name_note" cols="30" placeholder="{{__('Descripción')}}" rows="3"></textarea>
                                    </div>
                                    <div class="d-inline-flex float-end mt-5">
                                        <button class="btn btn-sm btn-secondary ml-3" id="cancel">{{__('Cancelar')}}</button>
                                        <button class="btn btn-sm btn-dark ml-3" id="save_note">{{__('Guardar')}}</button>
                                    </div>
                                </div>
                                <div class="d-none" id="edit-note" >
                                    <input type="hidden" name="note_id" id="note_id">
                                    <div class="form-group">
                                        <textarea class="form-control" name="name_edit_note" id="name_edit_note" cols="30" rows="3" data-value=""></textarea>
                                    </div>
                                    <div class="d-inline-flex float-end mt-5">
                                        <button class="btn btn-sm btn-secondary ml-3" id="cancel_edit">{{__('Cancelar')}}</button>
                                        <button class="btn btn-sm btn-dark ml-3" id="edit_note">{{__('Guardar')}}</button>
                                    </div>
                                </div>
                                <div id="lesson_note">
                                    @component('user.lesson.notes')
                                        @slot('lesson_notes',$lesson->LessonNotes)
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </section>

@endsection

@section('scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        $(document).ready(function() {

            let timePlay = 0;

            @if($lesson?->url_video)
                //Agregamos el video de la session
                var player = new Vimeo.Player('vimeo-player', {
                    url: "{{$lesson->url_video}}?h=22a613731e&title=0&byline=0&portrait=0",
                    autoplay: true,
                    controls: true,
                    responsive: true,
                    title: false,
                    byline: false,
                    portrait: false,
                });

                setInterval(function() {
                    player.getCurrentTime().then(function(seconds) {
                        timePlay = seconds; // Guardamos el tiempo actual en la variable
                    });
                }, 1000);
            @endif

            window.reproducirEnSegundo = function (segundos) {
                player.setCurrentTime(segundos).then(function (seconds) {
                    player.pause()
                },
            )}

            $( "#btn_add_note" ).on( "click", function() {
                $("#add-new-note").removeClass('d-none')
                $("#name_note").val('')
                player.pause()
            } );

            $("#save_note").on("click", function () {

                $.post("{{route('user.course.new-note.store')}}",
                    {
                        _token: "{{csrf_token()}}",
                        name_note: $("#name_note").val(),
                        lesson_id: "{{$lesson?->id}}",
                        time_video: timePlay,
                    })
                    .done(function (data) {
                        $('#lesson_note').html(data)
                        $("#add-new-note").addClass('d-none')
                        player.play()
                    })
                    .fail(function (error) {
                        alert(error.responseJSON.message);
                    })
                ;
            });

            $( "#cancel" ).on( "click", function() {
                $("#add-new-note").addClass('d-none')
            } );

            $( "#cancel_edit" ).on( "click", function() {
                $("#edit-note").addClass('d-none')
            } );

            window.editNote = function (note_id, note) {
                $("#add-new-note").addClass('d-none')
                $("#edit-note").removeClass('d-none')
                $("#name_edit_note").val(note)
                $("#note_id").val(note_id)
            }

            window.deleteNote = function (note_id) {
                let url = "{{route('user.course.note.delete','%note_id')}}"
                url = url.replace('%note_id', note_id)
                $.get(url)
                    .done(function (data) {
                        $('#lesson_note').html(data)
                    })
                    .fail(function (error) {
                        alert(error.responseJSON.message);
                    })
                ;
            }

            $("#edit_note").on("click", function () {

                $.post("{{route('user.course.note.update')}}",
                    {
                        _token: "{{csrf_token()}}",
                        name_note: $("#name_edit_note").val(),
                        note_id: $("#note_id").val(),
                    })
                    .done(function (data) {
                        $('#lesson_note').html(data)
                        $("#edit-note").addClass('d-none')
                    })
                    .fail(function (error) {
                        alert(error.responseJSON.message);
                    })
                ;
            });

        });
    </script>

@endsection
