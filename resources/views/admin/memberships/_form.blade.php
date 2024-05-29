<div class="mb-3">
    <label for="">{{__('Nombre')}}</label>
    {{Form::text('name',isset($m->name)?$m->name:old('name'),['class'=>'form-control','id'=>'name','required'])}}
    @error('name') <span style="color: red">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="">{{__('Descripción')}}</label>
    {{Form::textarea('description',isset($m->description)?$m->description:old('description'),['class'=>'form-control','id'=>'description','rows'=>3])}}
    @error('description') <span style="color: red">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="">{{__('Permite la reventa de los cursos')}}</label>
    <br>
    <div class="form-check-inline">
        {{Form::radio('reseller',0,true,['class'=>'form-check-input','id'=>'reseller-no','required'])}}
        <label class="form-check-label" for="reseller-no">
            {{__('No')}}
        </label>
    </div>
    <div class="form-check-inline">
        {{Form::radio('reseller',1,null,['class'=>'form-check-input','id'=>'reseller-yes','required'])}}
        <label class="form-check-label" for="reseller-yes">
            {{__('Si')}}
        </label>
    </div>
    @error('reseller') <span style="color: red">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="">{{__('Precio')}}</label>

    <div class="input-group mb-3">
        {{Form::number('price',isset($m)?$m->price:old('price'),['class'=>'form-control','id'=>'price','required'])}}
        <span class="input-group-text">$</span>
    </div>
    @error('price') <span style="color: red">{{ $message }}</span> @enderror

</div>

