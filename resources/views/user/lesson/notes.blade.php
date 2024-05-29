<div class="py-30 px-30">
    <div class="row y-gap-30">

        @forelse($lesson_notes as $lesson_note)
            <div class="md:direction-column">
                <div class="d-flex">
                    <div class="comments__body md:mt-15">
                        <div class="comments__header d-inline-flex">
                            <h4 class="text-17 fw-500 lh-15">
                                <a href="javascript:void(0);" onclick="reproducirEnSegundo('{{$lesson_note->time_video}}')">
                                    <i class="fa fa-play-circle"></i> {{__('Tiempo')}}: {{$lesson_note->time_video}} {{__('Seg')}}
                                </a>
                                <span class="text-13 text-light-1 fw-400 ml-5">{{$lesson_note->date_create}}</span>
                            </h4>

                        </div>
                        <div class="ml-10 float-end">
                            <a href="javascript:void(0);" class="btn btn-sm btn-ghost-primary" title="{{__('Editar')}}" onclick="editNote('{{$lesson_note->id}}', '{{$lesson_note->note}}')"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-ghost-primary" title="{{__('Eliminar')}}" onclick="deleteNote('{{$lesson_note->id}}')"><i class="fa fa-trash"></i></a>
                        </div>
                        <div class="comments__text mt-10 ml-10">
                            <p id="note_{{$lesson_note->id}}">{{$lesson_note->note}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>{{'Sin registros'}}</p>
        @endforelse
    </div>
</div>
