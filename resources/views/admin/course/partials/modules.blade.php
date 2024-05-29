<div class="col-md-12">
    @include('admin.course.partials.modal_module')
    @include('admin.course.partials.modal_lesson')
    @include('admin.course.partials.modal_document')
</div>
<div class="col-md-12">
    <hr style="border: solid gray 0.2px">
    <div class="accordion" id="accordionExample">
        @foreach($course->modules as $module)

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$module->id}}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$module->id}}" aria-expanded="true"
                            aria-controls="collapseOne">
                        {{$module->name}}
                        &nbsp;
                        &nbsp;
                        <span class="badge badge-outline-primary">
                                {{$module->lessons->count()}}
                        </span>
                    </button>
                </h2>
                <div id="collapse{{$module->id}}" class="accordion-collapse collapse"
                     aria-labelledby="heading{{$module->id}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <a href="{{route('admin.course.module.delete',$module)}}" class="btn btn-outline-danger float-end">Eliminar</a>
                                @include('admin.course.partials.modal_module',['module'=>$module])
                            </div>
                        </div>

                        @foreach($module->lessons as $lesson)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header text-white text-right" style="background-color: #00a5bb">
                                            <h3 class="float-end text-white">{{$lesson->name}}</h3>
                                            @include('admin.course.partials.modal_lesson')
                                            <a href="{{route('admin.course.lesson.delete',$lesson)}}" class="btn btn-danger btn-label mx-3">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="ri-delete-bin-3-fill label-icon"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        {{__('Eliminar')}}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">

{{--                                                    <div style="padding:56.25% 0 0 0;position:relative;">--}}
{{--                                                        <iframe--}}
{{--                                                            src="{{$lesson->url_video}}&title=0&byline=0&portrait=0"--}}
{{--                                                            style="position:absolute;top:0;left:0;width:100%;height:100%;"--}}
{{--                                                            frameborder="0"--}}
{{--                                                            allow="autoplay; fullscreen; picture-in-picture"--}}
{{--                                                            allowfullscreen></iframe>--}}
{{--                                                    </div>--}}
{{--                                                    <script src="https://player.vimeo.com/api/player.js"></script>--}}
                                                </div>
                                                <div class="col-md-8">
                                                    <h4>{{__('Descripción')}}</h4>
                                                    <div>
                                                        {{$lesson->description}}
                                                    </div>
                                                    @if($lesson->documents->count())
                                                        <div class="mt-3">
                                                            @foreach($lesson->documents as $document)
                                                                <a class="btn btn-sm btn-success mr-2" href="{{route('admin.course.document.download',$document)}}">
                                                                    <i class="ri-download-2-line"></i> {{$document->name}}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
