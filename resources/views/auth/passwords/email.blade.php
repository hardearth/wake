@extends('layouts.educrat')

@section('content')

    <div class="content-wrapper  js-content-wrapper">

        <section class="form-page js-mouse-move-container">
            <div class="form-page__content lg:py-50 auth-bg">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class=" md:px-25 md:py-25 auth-blue shadow-1 rounded-16 text-white" >
                                <h3 class="text-45 lh-13 text-white text-center fw-300">{{__('Restablecer contraseña')}}</h3>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="contact-form respondForm__form row y-gap-20 pt-60 form-auth" method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="col-12">
                                        <label class="text-24 lh-1  text-dark-1 mb-10" for="email">{{__('Correo')}}</label>
                                        <input class="text-white @error('email') is-invalid @enderror" type="email"
                                               placeholder="{{__('Ingresa tu correo')}}" name="email" id="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit" class="button -md -purple-2 text-white fw-500 w-1/1 text-24 ">
                                            {{__('Restablecer')}}
                                        </button>
                                    </div>
                                </form>

                                <p class="mt-50 text-24 text-center">{{__('¿Aun no estas registrado?')}} <a href="{{route('register')}}" class="text-purple-1  -purple-2 text-white">{{__('Registrarse')}}</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection
