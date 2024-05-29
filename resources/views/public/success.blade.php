@extends('layouts.educrat')
@section('content')

    <!-- <section class="page-header -type-1 mt-50">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" class="is-in-view">

                            <h1 class="page-header__title">{{__('Orden de compra')}}</h1>

                        </div>

                        <div data-anim="slide-up delay-2" class="is-in-view">

                            <p class="page-header__text">{{__('Gracias por confiar en nosotros, pronto podrá iniciar sus estudios')}}.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section class="layout-pt-md layout-pb-lg mt-50">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="shopCompleted-header">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-check">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <h2 class="title">
                               {{__('Tu Orden esta completa')}}!
                        </h2>
                        <div class="subtitle">
                               {{__('Gracias por confiar en nosotros, pronto podrá iniciar sus estudios. Una vez se complete su envio le notificaremos por correo los datos se su compra')}}.
                        </div>
                    </div>

                    <div class="shopCompleted-info">
                        <div class="row no-gutters y-gap-32">
                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">{{__('Codigo de transacción')}}</div>
                                    <div class="title text-purple-1 mt-5">{{$bill->uuid}}</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">{{__('Fecha de pago')}}</div>
                                    <div class="title text-purple-1 mt-5">{{$bill->created_at->format('d/m/Y H:i:s')}}</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">{{__('Total')}}</div>
                                    <div class="title text-purple-1 mt-5">${{number_format($bill->amount,2,'.',',')}}</div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="shopCompleted-info__item">
                                    <div class="subtitle">{{__('Metodo de pago')}}</div>
                                    <div class="title text-purple-1 mt-5">{{__('Criptomonedas')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shopCompleted-footer bg-light-4 border-light rounded-8">
                        <div class="shopCompleted-footer__wrap">
                            <h5 class="title">
                                 {{__('Detalle de su Orden')}}
                            </h5>

                            <div class="item">
                                <span class="fw-500">{{__('Producto')}}</span>
                                <span class="fw-500">Subtotal</span>
                            </div>

                            @foreach($bill->courses as $course)
                                <div class="item -border-none">
                                    <span class="">{{$course->title}}</span>
                                    <span class="">${{number_format($course->price,2,'.',',')}}</span>
                                </div>
                              @endforeach

                            <div class="item">
                                <span class="fw-500">Total</span>
                                <span class="fw-500">${{number_format($bill->amount,2,'.',',')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
