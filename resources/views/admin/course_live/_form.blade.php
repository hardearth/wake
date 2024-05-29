<div class="row">

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="title">{{__('Nombre')}}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title"
                   name="title" value="{{isset($liveLesson)?$liveLesson->title:old('title') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="teacher_id">{{__('Profesor')}}</label>
            {{Form::select('teacher_id',$teachers, isset($liveLesson)?$liveLesson->teacher_id:old('teacher_id'),["class"=>"form-control select2","placeholder"=>__('Seleccione...'), "id"=>"teacher_id",'required'=>'required'])}}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="categories[]">{{__('Categorías')}}</label>
            {{Form::select('categories[]',$categories,isset($liveLesson)?$liveLesson->categories:old('categories'),['class'=>'form-select select2','multiple','required'])}}
            @error('categories')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="lesson_date_at">{{__('Fecha y hora')}}</label>
            <input type="datetime-local"
                   class="form-control @error('lesson_date_at') is-invalid @enderror"
                   id="lesson_date_at"
                   name="lesson_date_at"
                   @if(!isset($liveLesson))
                    min="{{date('Y-m-d H:i:s')}}"
                   @endif
                   value="{{ isset($liveLesson)?$liveLesson->lesson_date_at:date('Y-m-d H:i:s') }}" required>
            @error('lesson_date_at')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="url_video">{{__('Url Video Introducción')}}</label>
            <input type="url" class="form-control {{$errors->has('url_video')?'is-invalid':''}}"
                   name="url_video"
                   value="{{isset($liveLesson)?$liveLesson->url_video:''}}" >
            @error('url_video')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="url_meeting">{{__('Url Meeting')}}</label>
            <input type="url" class="form-control {{$errors->has('url_meeting')?'is-invalid':''}}"
                   name="url_meeting"
                   value="{{isset($liveLesson)?$liveLesson->url_meeting:''}}" required>
            @error('url_meeting')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="description">{{__('Descripción')}}</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      id="description"
                      name="description" rows="3"
                      required>{{ isset($liveLesson)?$liveLesson->description:old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

@section('scripts')
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: 'Seleccione...',
        });
    </script>
@endsection
