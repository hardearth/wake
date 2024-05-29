<button type="button" class="btn btn-primary btn-label mr-3" data-bs-toggle="modal"
        data-bs-target="#moduleModal{{isset($module)?$module->id:''}}">
    <div class="d-flex">
        <div class="flex-shrink-0">
            <i class="ri-projector-line label-icon"></i>
        </div>
        <div class="flex-grow-1">
            @if(isset($module))
                {{__('Editar modulo')}}
            @else
                {{__('Modulos')}}
            @endif
        </div>
    </div>
</button>

<!-- Modal -->
<div class="modal fade" id="moduleModal{{isset($module)?$module->id:''}}" tabindex="-1"
     aria-labelledby="moduleModal{{isset($module)?$module->id:''}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="moduleModal{{isset($module)?$module->id:''}}Label">
                    @if(isset($module))
                        {{__('Editar modulo')}}
                    @else
                        {{__('Nuevo Módulo')}}
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form
                action="{{isset($module)?route('admin.course.module.store',$module):route('admin.course.module.store')}}"
                method="post">
                <input type="hidden" name="courses_id" value="{{isset($course)?$course->id:''}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="moduleName" class="form-label">{{__('Nombre')}}</label>
                                <input type="text" class="form-control" id="moduleName" name="name" value="{{isset($module)?$module->name:''}}">
                            </div>
                            <div class="mb-3">
                                <label for="moduleDescription" class="form-label">{{__('Descripción')}}</label>
                                <textarea class="form-control form-control-sm" id="moduleDescription" rows="3"
                                          name="description">{{isset($module)?$module->description:''}}</textarea>
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
