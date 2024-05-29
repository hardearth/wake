@extends('layouts.educrat_user')
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">
                <h1 class="text-30 lh-12 fw-700">{{__('Perfil')}}</h1>
            </div>
        </div>
        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs pt-0">
                        <div
                            class="tabs__controls d-flex x-gap-30 items-center pt-20 px-30 border-bottom-light js-tabs-controls">
                            <button class="tabs__button text-light-1 js-tabs-button is-active"
                                    data-tab-target=".-tab-item-1" type="button">
                                {{__('Editar perfil')}}
                            </button>
                            <button class="tabs__button text-light-1 js-tabs-button" data-tab-target=".-tab-item-2"
                                    type="button">
                                {{__('Clave')}}
                            </button>
                            <button class="tabs__button text-light-1 js-tabs-button" data-tab-target=".-tab-item-3"
                                    type="button">
                                {{__('Redes sociales')}}
                            </button>
                            @if(Auth::user()->role->slug=='teacher')
                                <button class="tabs__button text-light-1 js-tabs-button" data-tab-target=".-tab-item-4"
                                        type="button">
                                    {{__('Profesor')}}
                                </button>
                            @endif
                        </div>

                        <div class="tabs__content py-30 px-30 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <div class="row y-gap-20 x-gap-20 items-center">
                                    <div class="col-3">
                                        @if(isset($detail->img_profile) && $detail->img_profile)
                                            <img class="size-100" src="{{$detail->profile_src_image}}" alt="image">
                                            <div class="d-flex x-gap-10 y-gap-10 flex-wrap pt-15">

                                                <div>
                                                    <a href="{{route('user.profile.remove.image')}}">
                                                    <div
                                                        class="d-flex justify-center items-center size-40 rounded-8 bg-light-3">

                                                            <div class="icon-bin text-16"></div>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <form action="{{route('user.profile.update.image')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="formFile"
                                                           class="form-label">{{__('Imagen de perfil')}}</label>
                                                    <input class="form-control" type="file" id="formFile" name="img"
                                                           accept="image/png, image/jpeg, image/gif"
                                                           required>
                                                </div>

                                                <div class="text-14 lh-1 mt-10">
                                                    <button type="submit" class="btn btn-sm btn-primary float-end">{{__('Actualizar')}}</button>
                                                    PNG or JPG no bigger than 800px wide and tall.
                                                </div>

                                            </form>
                                        @endif

                                    </div>

                                </div>

                                <div class="border-top-light pt-30 mt-30">
                                    <form action="{{route('user.profile.update')}}" class="contact-form row y-gap-30"
                                          method="post">
                                        @csrf
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                                <i class="fa-solid fa-star-of-life text-danger size-12"></i>
                                                {{__('Nombre')}}
                                            </label>
                                            <input type="text" placeholder="{{__('Nombre')}}" name="name"
                                                   value="{{$detail?->name}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                                <i class="fa-solid fa-star-of-life text-danger size-12"></i>
                                                {{__('Apellido')}}
                                            </label>
                                            <input type="text" placeholder="{{__('Apellido')}}" name="lastname"
                                                   value="{{$detail?->lastname}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                                <i class="fa-solid fa-star-of-life text-danger size-12"></i>
                                                {{__('Fecha de nacimiento')}}
                                            </label>
                                            <input type="date" name="birth_date" value="{{$detail?->birth_date}}"
                                                   required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                                <i class="fa-solid fa-star-of-life text-danger size-12"></i>
                                                {{__('Pais')}}
                                            </label>
                                            {{Form::select('countries_id',$countries,$detail?->countries_id,['placeholder'=>'Seleccione...','required'=>'required'])}}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="phone_prefix"
                                                       class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Teléfono celular')}}
                                                    <i class="fa-solid fa-star-of-life text-danger size-12"></i></label>
                                                <div class="col-md-3">
                                                    {{Form::select('phone_prefix',$prefix,$detail?->phone_prefix,['placeholder'=>'Prefijo','required'=>'required'])}}
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="number" name="phone_number" id="phone_number"
                                                           value="{{$detail?->phone_number}}" placeholder="Numero"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="career"
                                                   class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Carrera')}}</label>
                                            <input type="text" name="career" id="career" value="{{$detail?->career}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="about_me"
                                                   class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Acerca de mi')}}</label>
                                            <textarea name="about_me" id="about_me"
                                                      rows="3">{{$detail?->about_me}}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="languages"
                                                   class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Idioma')}}</label>
                                            {{Form::select('languages',$languages,$detail?->languages,['placeholder'=>'Seleccione...','required'=>'required'])}}
                                        </div>
                                        <div class="col-md-6">
                                            <label for="web"
                                                   class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Web')}}</label>
                                            <input type="text" name="web" id="web" value="{{$detail?->web}}">
                                        </div>
                                        <div class="col-12">
                                            <button
                                                class="button -md -purple-1 text-white">{{__('Actualizar')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-2">
                                <form action="{{route('user.profile.update.password')}}"
                                      class="contact-form row y-gap-30" method="post">
                                    @csrf
                                    <div class="col-md-7">
                                        <label
                                            class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Nueva clave')}}</label>
                                        <input type="password" placeholder="{{__('Nueva clave')}}" name="password">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                                            {{__('Confirme su nueva clave')}}
                                        </label>
                                        <input type="password" placeholder="{{__('Confirme su nueva clave')}}"
                                               name="password_confirmation">
                                    </div>

                                    <div class="col-12">
                                        <button class="button -md -purple-1 text-white">{{__('Actualizar')}}</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tabs__pane -tab-item-3">
                                <form action="{{route('user.profile.update.socials')}}"
                                      class="contact-form row y-gap-30" method="post">
                                    @csrf

                                    <div class="col-md-6">
                                        <label for="facebook"
                                               class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Facebook')}}</label>
                                        <input type="text" name="facebook" id="facebook" value="{{$detail?->facebook}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="twitter"
                                               class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Twitter')}}</label>
                                        <input type="text" name="twitter" id="twitter" value="{{$detail?->twitter}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="instagram"
                                               class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Instagram')}}</label>
                                        <input type="text" name="instagram" id="instagram"
                                               value="{{$detail?->instagram}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="linkedin"
                                               class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__(' LinkedIn Profile URL ')}}</label>
                                        <input type="text" name="linkedin" id="linkedin" value="{{$detail?->linkedin}}">
                                    </div>
                                    <div class="col-12">
                                        <button class="button -md -purple-1 text-white">{{__('Continuar')}}</button>
                                    </div>
                                </form>
                            </div>

                            @if(Auth::user()->role->slug=='teacher')
                                <div class="tabs__pane -tab-item-4">
                                    <form action="{{route('user.profile.update.teacher')}}" method="post"
                                          class="contact-form row y-gap-30">
                                        @csrf
                                        <div class="col-md-12">
                                            <label
                                                class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Carrera')}}</label>
                                            <input type="text" placeholder="{{__('Carerra')}}" class="form-control"
                                                   name="career" value="{{$teacher?->career}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label
                                                class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Acerca de mi')}}</label>
                                            <textarea name="about_me" id="" rows="3">{{$teacher?->about_me}}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Facebook</label>
                                            <input type="text" placeholder="https://example.com/facebook"
                                                   name="facebook" value="{{$teacher?->facebook}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Twitter</label>
                                            <input type="text" placeholder="https://example.com/twitter" name="twitter"
                                                   value="{{$teacher?->twitter}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Instagram</label>
                                            <input type="text" placeholder="https://example.com/instagram"
                                                   name="instagram" value="{{$teacher?->instagram}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Tik Tok</label>
                                            <input type="text" placeholder="https://example.com/tiktok" name="tiktok"
                                                   value="{{$teacher?->tiktok}}">
                                        </div>
                                        <div class="col-12 mt-5">
                                            <button class="button -md -purple-1 text-white">{{__('Continuar')}}</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
