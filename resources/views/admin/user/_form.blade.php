<div class="row">
    <div class="col-12">
        @if(isset($user))
            {{Form::hidden('id',$user->id)}}
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">{{__('Nombre')}}</label>
            <input type="text" name="name" class="form-control {{$errors->has('name')??'is-invalid'}}"
                   placeholder="Ingresa tu nombre" id="name" required="required"
                   value="{{isset($user)?$user->name:''}}">
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{$errors->get('name')}}
                </div>
            @endif
        </div>
    </div><!--end col-->
    <div class="col-12">
        <div class="mb-3">
            <label for="email" class="form-label">{{__('Correo')}}</label>
            <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo" id="email"
                   required="required" value="{{isset($user)?$user->email:''}}">
        </div>
    </div><!--end col-->
    <div class="col-12">
        <div class="mb-3">
            <label for="email" class="form-label">{{__('Clave')}}</label>
            <input type="password" name="password" class="form-control" placeholder="Ingresa tu clave" id="password"
                   {{isset($user)?'':'required="required"'}}>
        </div>
    </div><!--end col-->
    <div class="col-12">
        <div class="mb-3">
            <label for="roles_id" class="form-label">{{__('Rol')}}</label>
            {{Form::select('roles_id',$roles, isset($user)?$user->roles_id:null,['placeholder'=>__('Seleccione...'),'class'=>'form-select mb-3','id'=>'roles_id','required'=>'required'])}}
        </div>
    </div><!--end col-->
</div><!--end row-->
