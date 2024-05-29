@extends('layouts.velzon')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/velzon/libs/filepond/filepond.min.css')}}" type="text/css"/>
    <link rel="stylesheet"
          href="{{asset('assets/velzon/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
    <link rel="stylesheet" href="{{asset('packages/select2/dist/css/select2.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('packages/select2/dist/css/select2-bootstrap-5-theme.min.css')}}"
          type="text/css"/>
    <style>
        span.select2-selection__choice__display {
            color: white;
            margin-left: 5px;
            font-size: 12px;
        }

    </style>
@endsection
@section('content')

<div class="row justify-content-center">
    <div class="col-xl-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body form-steps">

                <div class="text-center pt-3 pb-4 mb-1">
                    <h5>{{__('Crea tu curso')}}</h5>

                </div>
                <div id="custom-progress-bar" class="progress-nav mb-4">
                    <div class="progress" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <ul class="nav nav-pills progress-bar-tab custom-nav" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill done {{Session::has('success')?'done':'active'}}" data-progressbar="custom-progress-bar"
                                    id="pills-gen-info-tab" data-bs-toggle="pill" data-bs-target="#pills-gen-info"
                                    type="button" role="tab" aria-controls="pills-gen-info" aria-selected="{{Session::has('success')?false:true}}">1
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill {{Session::has('success')?'done':''}}" data-progressbar="custom-progress-bar"
                                    id="pills-info-desc-tab" data-bs-toggle="pill" data-bs-target="#pills-info-desc"
                                    type="button" role="tab" aria-controls="pills-info-desc" aria-selected="{{Session::has('success')?false:true}}">2
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill {{Session::has('success')?'active done':''}}" data-progressbar="custom-progress-bar"
                                    id="pills-success-tab" data-bs-toggle="pill" data-bs-target="#pills-success"
                                    type="button" role="tab" aria-controls="pills-success" aria-selected="{{Session::has('success')?true:false}}">3
                            </button>
                        </li>
                    </ul>
                </div>
                {{Form::open(['route'=>'admin.course.store','enctype'=>"multipart/form-data"])}}
                    <div class="tab-content">
                        <div class="tab-pane fade  {{Session::has('success')?'':'show active'}}" id="pills-gen-info" role="tabpanel"
                             aria-labelledby="pills-gen-info-tab">
                            <div>
                                <div class="mb-4">
                                    <div>
                                        <h5 class="mb-1">{{__('Datos generales')}}</h5>
                                        <p class="text-muted">{{__('Complete toda la información de la siguiente manera')}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Nombre')}}</label>
                                            <input name="name" type="text" class="form-control" id="name">
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Precio')}}</label>
                                            <div class="input-group mb-3">
                                                <input name="price" type="number" class="form-control" id="price" required>
                                                <div class="input-group-text">
                                                    {{__('Gratis')}}
                                                    &nbsp;
                                                    <input class="form-check-input mt-0" type="checkbox" value="1" name="course.free"
                                                           aria-label="Checkbox for following text input">
                                                </div>
                                            </div>

                                            @error('price') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Idioma')}}</label>
                                            {{Form::select('language',config('options.language'),null,['class'=>'form-select','placeholder'=>__('Seleccione...')])}}
                                            @error('language') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Nivel requerido')}}</label>
                                            {{Form::select('level',config('options.level'),null,['class'=>'form-select','placeholder'=>__('Seleccione...')])}}
                                            @error('level') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Categorias')}}</label>
                                            {{Form::select('categories[]',$categories,null,['class'=>'form-select select2','multiple','required'])}}
                                            @error('categories') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Profesor')}}</label>
                                            {{Form::select('teacher_id',$teachers,null,['class'=>'form-select','required','placeholder'=>__('Seleccione...')])}}
                                            @error('teacher_id') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-username-input">{{__('Breve descripción')}}</label>
                                            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                                            @error('description') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                        data-nexttab="pills-info-desc-tab"><i
                                        class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                    {{__('Continuar')}}
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-info-desc" role="tabpanel"
                             aria-labelledby="pills-info-desc-tab">
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label" for="image">{{__('Imagen')}}</label>
                                    <input type="file"
                                           class="form-control"
                                           id="image"
                                           name="image"
                                           accept="image/png, image/jpeg, image/gif"
                                           required
                                    />
                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="form-label" for="img_path">{{__('Video de presentación')}}</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-default">URL</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                               aria-describedby="inputGroup-sizing-default" required
                                               name="course.video">
                                        @error('video') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="button" class="btn btn-link text-decoration-none btn-label previestab"
                                        data-previous="pills-gen-info-tab"><i
                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                    {{__('Regresar')}}
                                </button>
                                <button type="submit"
                                        class="btn btn-success btn-label right ms-auto nexttab nexttab">
                                    <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                    {{__('Continuar')}}
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane fade {{Session::has('success')?'show active':''}}" id="pills-success" role="tabpanel"
                             aria-labelledby="pills-success-tab">
                            <div>
                                <div class="text-center">

                                    <div class="mb-4">
                                        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                                   colors="primary:#0ab39c,secondary:#405189"
                                                   style="width:120px;height:120px"></lord-icon>
                                    </div>
                                    <h5>Well Done !</h5>
                                        @if(Session::has('success'))


                                    <p class="text-muted"><a href="{{route('admin.course.show',session('success'))}}" class="btn btn-primary">{{__('Continuar')}}</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')


    <script src='{{asset('assets/velzon/js/pages/form-wizard.init.js')}}'></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: 'Seleccione...',
            maximumSelectionLength: 10
        });
    </script>
@endsection
