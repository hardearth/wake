<button type="button" class="btn btn-primary btn-label mr-3" data-bs-toggle="modal" data-bs-target="#documentModal{{isset($document)?$document->id:''}}">
    <div class="d-flex">
        <div class="flex-shrink-0">
            <i class="ri-file-text-line  label-icon"></i>
        </div>
        <div class="flex-grow-1">
            @if(isset($document))
                {{__('Editar documento')}}
            @else
                {{__('Documentos')}}
            @endif
        </div>
    </div>
</button>

<!-- Modal -->
<div class="modal fade" id="documentModal{{isset($document)?$document->id:''}}" tabindex="-1" aria-labelledby="documentModal{{isset($document)?$document->id:''}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="documentModal{{isset($document)?$document->id:''}}Label">
                    @if(isset($document))
                        {{__('Editar documento')}}
                    @else
                        {{__('Nuevo documento')}}
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.course.document.store')}}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                {{Form::select('lessons_lists',$lessonsList,null,['class'=>"form-control ".($errors->has('lessons_lists')?'is-invalid':''),'placeholder'=>__('Seleccione...'),'required'=>'required'])}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="documents">{{__('Material de apoyo')}}</label>
                                <input type="file"
                                       class="filepond form-control"
                                       id="documents"
                                       name="documents"
                                       accept="image/png, image/jpeg, image/gif, application/pdf"
                                       multiple
                                       data-max-files="3" />
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
