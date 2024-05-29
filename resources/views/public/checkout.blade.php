@extends('layouts.educrat')
@section('content')

    <section data-anim="fade" class="breadcrumbs is-in-view">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="#">{{__('Inicio')}}</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="#">{{__('Checkout')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">

                            <h1 class="page-header__title">{{__('Checkout')}}</h1>

                        </div>

                        <div data-anim="slide-up delay-2" class="is-in-view">

                            <p class="page-header__text">{{__('Faltan pocos pasos para finalizar tu compra')}}.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">

            <div class="row y-gap-50">
                <div class="col-lg-8">
                    <div class="shopCheckout-form">

                        <form action="{{route('cart.placer.order',['depay'])}}" method="post"
                              class="contact-form row x-gap-30 y-gap-30">
                            @csrf
                            <div class="col-12">
                                <h5 class="text-20">{{__('Datos de la facturación')}}</h5>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Nombre')}}</label>
                                <input type="text" name="name" placeholder="{{__('Nombre')}}" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Apellido')}}</label>
                                <input type="text" name="lastname" placeholder="{{__('Apellido')}}">
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Región')}} *</label>
                                {{Form::select('countries_id',$countries,null,['class'=>'selectize wide js-selectize'])}}
                            </div>

                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Ciudad')}} *</label>
                                <input type="text" name="city" placeholder="{{__('Ciudad')}} *" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Celular')}}</label>
                                <input type="text" name="cellphone" placeholder="{{__('Teléfono')}} *" required>
                            </div>

                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('Correo')}}</label>
                                <input type="email" name="email" placeholder="{{__('Correo')}}*" required>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">{{__('Continuar')}}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="">
                        <div class="pt-30 pb-15 border-light rounded-8 bg-light-4">
                            <h5 class="px-30 text-20 fw-500">
                                {{__('Tu Orden')}}
                            </h5>

                            <div class="d-flex justify-between px-30 mt-25">
                                <div class="py-15 fw-500 text-dark-1">{{__('Productos')}}</div>
                                <div class="py-15 fw-500 text-dark-1">{{__('Subtotal')}}</div>
                            </div>
                            @foreach($cart->getDetails()->items as $item)
                                <div class="d-flex justify-between border-top-dark px-30">
                                    <div class="py-15 text-grey">{{$item->title}}</div>
                                    <div class="py-15 text-grey">${{number_format($item->price,2,'.',',')}}</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="py-30 px-30  mt-30 border-light rounded-8 bg-light-4">
                            <h5 class="text-20 fw-500">
                                {{__('Pago')}}
                            </h5>

                            <div class="mt-30">
                                <div class="form-radio d-flex items-center">
                                    <div class="radio">
                                        <input type="radio" name="radio" checked="checked">
                                        <div class="radio__mark">
                                            <div class="radio__icon"></div>
                                        </div>
                                    </div>
                                    <h5 class="ml-15 text-15 lh-1 fw-500 text-dark-1">{{__('Criptomonedas')}}</h5>
                                </div>
                                <p class="ml-25 pl-5 mt-25">Puedes hacer pagos con distintos tipos de criptomonedas, algunas de las monedas que aceptamos "Bitcoin, Litecoin, USDT trc20".</p>

                            </div>
                        </div>

                        <div class="mt-30">
                            <button class="button -md -accent col-12 -uppercase text-white">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
