    <div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="name">{{__('Nombre')}}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name"
                   name="name" value="{{isset($activity)?$activity->name:old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="second_name">{{__('Nombre largo')}}</label>
            <input type="text" class="form-control @error('second_name') is-invalid @enderror"
                   id="second_name" name="second_name"
                   value="{{ isset($activity)?$activity->second_name:old('second_name') }}">
            @error('second_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="date">{{__('Fecha y hora')}}</label>
            <input type="datetime-local"
                   class="form-control @error('date') is-invalid @enderror"
                   id="date"
                   name="date" value="{{ isset($activity)?$activity->date:old('date') }}" required>
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="category_id">{{__('Categoria')}}</label>
            {{Form::select('activity_categories_id',$categories,isset($activity)?$activity->activity_categories_id:old('activity_categories_id'),["class"=>"form-control","placeholder"=>__('Seleccione...'), "id"=>"category_id",'required'=>'required'])}}
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="featured_image required">{{__('Cantidad de Participantes')}}</label>
            {{Html::select('participants',config('options.persons'))->id('participants')->class('select2')->required()->value(isset($activity)??$activity->participants)->placeholder('Seleccione...')}}
            @if($errors->has('participants'))
                <div class="invalid-feedback">
                    {{$errors->get('participants')}}
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="banner_image">{{__('Imagen del banner')}}</label>
            <input type="file" class="form-control" id="banner_image" name="banner_image">
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label for="featured_image">{{__('Otra imagen')}}</label>
            <input type="file" class="form-control" id="featured_image"
                   name="featured_image">
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="featured_image required">{{__('Presentadores')}}</label>
            {{Html::select('presenters',$presenters)->id('presenters')->class('select2')->multiple()->required()->value(isset($activity)??$activity->presenters_id)}}
            @if($errors->has('presenters'))
                <div class="invalid-feedback">
                    {{$errors->get('presenters')}}
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="description">{{__('Descripción')}}</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      id="description"
                      name="description" rows="3"
                      required>
                {{ isset($activity)?$activity->description:old('description') }}
            </textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>


</div>

@section('scripts')
    @parent
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: 'Seleccione...',
            maximumSelectionLength: 10
        });

        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

