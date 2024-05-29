<button type="button" class="btn btn-primary btn-label" data-bs-toggle="modal" data-bs-target="#lessonModal{{isset($lesson)?$lesson->id:''}}">
    <div class="d-flex">
        <div class="flex-shrink-0">
            <i class="ri-book-line label-icon"></i>
        </div>
        <div class="flex-grow-1">
            @if(isset($lesson))
                {{__('Editar clase')}}
            @else
                {{__('Clases')}}
            @endif
        </div>
    </div>
</button>

<!-- Modal -->
<div class="modal fade" id="lessonModal{{isset($lesson)?$lesson->id:''}}" tabindex="-1" aria-labelledby="lessonModal{{isset($lesson)?$lesson->id:''}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="lessonModal{{isset($lesson)?$lesson->id:''}}Label">
                    @if(isset($lesson))
                        {{__('Editar clase')}}
                    @else
                        {{__('Nueva clase')}}
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{isset($lesson)?route('admin.course.lesson.store',$lesson):route('admin.course.lesson.store')}}" method="post">
                <input type="hidden" name="courses_id" value="{{isset($course)?$course->id:''}}">

                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="lessonName" class="form-label">{{__('Modulo')}}</label>
                                {{Form::select('course_modules_id',$modules->pluck('name','id'),isset($lesson)?$lesson->course_modules_id:'',['class'=>"form-control ".($errors->has('course_modules_id')?'is-invalid':''),'placeholder'=>__('Seleccione...'),'required'=>'required'])}}
                            </div>
                            <div class="mb-3">
                                <label for="lessonName" class="form-label">{{__('Nombre')}}</label>
                                <input type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                       id="lessonName" name="name" value="{{isset($lesson)?$lesson->name:''}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="lessonDescription" class="form-label">{{__('Descripción')}}</label>
                                <textarea class="form-control {{$errors->has('description')?'is-invalid':''}}"
                                          id="lessonDescription" rows="3" name="description" required>{{isset($lesson)?$lesson->description:''}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lessonName" class="form-label">{{__('Url del video')}}</label>
                                <input type="url" class="form-control {{$errors->has('url_video')?'is-invalid':''}}"
                                       placeholder="https://player.vimeo.com/video/55555555" name="url_video" value="{{isset($lesson)?$lesson->url_video:''}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="lessonDuration" class="form-label">{{__('Duración')}}</label>
                                <input type="number" class="form-control {{$errors->has('duration')?'is-invalid':''}}"
                                       id="lessonDuration" name="duration" value="{{isset($lesson)?$lesson->duration:''}}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">{{__('Cancelar')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
