<div class="row">
    <div class="col-6">
        @if(isset($detail))
            {{Form::hidden('users_id',$detail->id)}}
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">{{__('Nombre')}}</label>
            <input type="text" name="name" class="form-control {{$errors->has('name')??'is-invalid'}}"
                   placeholder="Ingresa tu nombre" id="name" required="required"
                   value="{{isset($detail)?$detail->name:''}}">
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->get('name')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-6">
        <div class="mb-3">
            <label for="lastname" class="form-label">{{__('Apellido')}}</label>
            <input type="text" name="lastname" class="form-control {{$errors->has('lastname')??'is-invalid'}}"
                   placeholder="Ingresa tu nombre" id="lastname" required="required"
                   value="{{isset($detail)?$detail->lastname:''}}">
            @if($errors->has('lastname'))
                <div class="invalid-feedback">
                    {{$errors->get('lastname')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-6">
        <div class="mb-3">
            <label for="birth_date" class="form-label">{{__('Fecha de nacimiento')}}</label>
            <input type="date" name="birth_date" class="form-control {{$errors->has('lastname')??'is-invalid'}}" placeholder="Ingresa tu fecha de nacimiento" id="birth_date"
                   required="required" value="{{isset($detail)?$detail->birth_date:''}}">
            @if($errors->has('birth_date'))
                <div class="invalid-feedback">
                    {{$errors->get('birth_date')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-6">
        <div class="mb-3">
            <label for="countries_id" class="form-label">{{__('Pais')}}</label>
            {{Form::select('countries_id',$roles, isset($detail)?$detail->countries_id:null,['placeholder'=>__('Seleccione...'),'class'=>'form-select mb-3','id'=>'countries_id','required'=>'required'])}}
        </div>
    </div><!--end col-->
    <div class="col-6">
        <div class="mb-3">
            <label for="phone_prefix" class="form-label">{{__('Prefijo')}}</label>
            <input type="text" name="phone_prefix" class="form-control {{$errors->has('phone_prefix')??'is-invalid'}}"
                   placeholder="Ingresa tu nombre" id="phone_prefix" required="required"
                   value="{{isset($detail)?$detail->phone_prefix:''}}">
            @if($errors->has('phone_prefix'))
                <div class="invalid-feedback">
                    {{$errors->get('phone_prefix')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-6">
        <div class="mb-3">
            <label for="lastname" class="form-label">{{__('Teléfono')}}</label>
            <input type="text" name="phone_number" class="form-control {{$errors->has('phone_number')??'is-invalid'}}"
                   placeholder="Ingresa tu nombre" id="phone_number" required="required"
                   value="{{isset($detail)?$detail->phone_number:''}}">
            @if($errors->has('phone_number'))
                <div class="invalid-feedback">
                    {{$errors->get('phone_number')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-6">
        <div class="mb-3">
            <label for="career" class="form-label">{{__('Carrera')}}</label>
            <input type="text" name="career" class="form-control {{$errors->has('career')??'is-invalid'}}"
                   placeholder="Ingresa tu nombre" id="career" required="required"
                   value="{{isset($detail)?$detail->career:''}}">
            @if($errors->has('career'))
                <div class="invalid-feedback">
                    {{$errors->get('career')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-6">
        <div class="mb-3">
            <label for="languages" class="form-label">{{__('Idioma')}}</label>
            <input type="text" name="languages" class="form-control {{$errors->has('languages')??'is-invalid'}}"
                   placeholder="Ingresa tu nombre" id="languages" required="required"
                   value="{{isset($detail)?$detail->languages:''}}">
            @if($errors->has('languages'))
                <div class="invalid-feedback">
                    {{$errors->get('languages')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-12">
        <div class="mb-3">
            <label for="lastname" class="form-label">{{__('Acerca de mi')}}</label>
            <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
        </div>
    </div><!--end col-->
</div><!--end row-->

'web',
'facebook',
'twitter',
'instagram',
'linkedin',
