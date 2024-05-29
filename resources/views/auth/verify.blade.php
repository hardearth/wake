@extends('layouts.auth')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>{{ __('Verifica tu dirección de correo electrónico.') }}</h3>
            <br>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                <br>
            @endif

            {{ __('Antes de continuar, por favor revisa tu correo electrónico para encontrar el enlace de verificación.') }}
            {{ __('Si no recibiste el email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haz click aqui para reenviar el correo') }}</button>.
            </form>
        </div>
    </div>

@endsection
