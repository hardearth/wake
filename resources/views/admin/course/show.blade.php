@extends('layouts.velzon')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-xs-12 col-md-12">
            <div class="card">

                <div class="card-body ribbon-box">
                    <div class="ribbon ribbon-success round-shape">{{__('Curso')}}</div>
                    <div class="row mt-4">

                        <div class="col-md-12">
                            <form action="{{route('admin.course.edit',$course)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <dvi class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <img src="{{$course->course_src_image}}" class="img-fluid" alt="">
                                            <label class="form-label" for="image">{{__('Imagen')}}</label>
                                            <input type="file"
                                                   class="form-control  form-control-sm"
                                                   id="image"
                                                   name="image"
                                                   accept="image/png, image/jpeg, image/gif"
                                            />
                                            @error('image') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        @if($course->video)
                                            <div style="padding:56.25% 0 0 0;position:relative;">
                                                <iframe
                                                    src="{{$course->video}}?h=22a613731e&title=0&byline=0&portrait=0"
                                                    {{--                                                    src="https://player.vimeo.com/video/401102477?h=22a613731e&title=0&byline=0&portrait=0"--}}
                                                    style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                                    frameborder="0"
                                                    allow="autoplay; fullscreen; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                            <script src="https://player.vimeo.com/api/player.js"></script>

                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Url del video')}}</label>
                                            <input name="video" type="url" class="form-control form-control-sm"
                                                   placeholder="https://player.vimeo.com/video/401102477"
                                                   value="{{$course?->video}}">
                                            @error('video') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                </dvi>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Nombre')}}</label>
                                            <input name="name" type="text" class="form-control form-control-sm"
                                                   value="{{$course->name}}">
                                            @error('name') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Fecha inicio')}}</label>
                                            <input name="start_date" type="datetime-local"
                                                   class="form-control form-control-sm"
                                                   id="start_date" value="{{$course->start_date}}">
                                            @error('start_date') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-email-input">{{__('Fecha fin')}}</label>
                                            <input name="end_date" type="datetime-local"
                                                   class="form-control form-control-sm"
                                                   id="end_date" value="{{$course->end_date}}">
                                            @error('end_date') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="categories[]">{{__('Categorías')}}</label>

                                            {{Form::select('categories[]',$categories,isset($course)?$course->categories:old('categories'),['class'=>'form-select select2','multiple','required'])}}
                                            @error('categories')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="teacher_id">{{__('Profesor')}}</label>
                                            {{Form::select('teacher_id',$teachers, isset($course)?$course->teacher_id:old('teacher_id'),["class"=>"form-control select2","placeholder"=>__('Seleccione...'), "id"=>"teacher_id",'required'=>'required'])}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                   for="gen-info-username-input">{{__('Breve descripción')}}</label>
                                            <textarea name="description" id="description" rows="3"
                                                      class="form-control form-control-sm"
                                            >{{$course->description}}</textarea>
                                            @error('description') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <button type="submit"
                                                class="btn btn-outline-primary float-end btn-sm">{{__('Actualizar')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @include('admin.course.partials.modules')

                </div><!-- end card-body -->
            </div>

            <div class="card">

                <div class="card-body ribbon-box">
                    <div class="ribbon ribbon-success round-shape">{{__('Usuarios registrados')}}</div>
                    <div class="row mt-4">
                        <div class="col-md-12">

                            <button type="button" class="btn btn-sm btn-dark float-end" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">{{__('Agregar Usuario')}}
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addUserModal" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addUserModalLabel">
                                                {{__('Nuevo Usuario')}}
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('admin.course.add.user',$course->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="user_id" class="form-label">{{__('Usuario')}}</label>
                                                            {{Form::select('user_id',$users,null, ['class' => 'form-control select2', 'required', 'placeholder' => 'Seleccione'])}}
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

                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Nombre')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Estado')}}</th>
                                    <th>{{__('Método de pago')}}</th>
                                    <th>{{__('Fecha de registro')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userBills as $bill)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$bill->user->name}}</td>
                                        <td>{{$bill->user->email}}</td>
                                        <td>{{$bill->status_name}}</td>
                                        <td>{{$bill->payment_method}}</td>
                                        <td>{{$bill->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding: 0px 30px;">
                                {{$userBills->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: 'Seleccione...',
            maximumSelectionLength: 10
        });
    </script>
@endsection
