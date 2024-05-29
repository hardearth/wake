@extends('layouts.educrat')

@section('content')

    <div class="content-wrapper  js-content-wrapper">

        <section class="form-page js-mouse-move-container">
            <div class="form-page__content lg:py-50 auth-bg">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class=" md:px-25 md:py-25 auth-blue shadow-1 rounded-16 text-white" >
                                <h3 class="text-45 lh-13 text-white text-center fw-300">{{__('Cambio de contraseña')}}</h3>

                                <form method="POST" action="{{ route('password.update') }}"
                                      class="contact-form respondForm__form row y-gap-20 pt-30" method="POST">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="row">
                                        <div class="col-md-12  mb-3">
                                            <label for="email" class="col-form-label text-md-end">{{ __('Correo') }}</label>

                                            <input id="email" type="email" class="form-control text-white @error('email') is-invalid @enderror"
                                                   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                   autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="password" class="col-form-label text-md-end">{{ __('Contraseña') }}</label>
                                            <input id="password" type="password"
                                                   class="form-control text-white @error('password') is-invalid @enderror" name="password" required
                                                   autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="password-confirm"
                                                   class="col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                                            <input id="password-confirm" type="password" class="form-control text-white" name="password_confirmation"
                                                   required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" name="submit" id="submit" class="button -md -purple-2 text-white fw-500 w-1/1 text-24 ">
                                            {{__('Cambiar contraseña')}}
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>


@endsection
