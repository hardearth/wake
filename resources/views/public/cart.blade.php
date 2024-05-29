@extends('layouts.educrat')
@section('content')
    <div class="row mt-30">
        <section class="page-header -type-1">
            <div class="container">
                <div class="page-header__content">
                    <div class="row justify-center text-center">
                        <div class="col-auto">
                            <div data-anim="slide-up delay-1" class="is-in-view">
                                <br><br>
                                <h1 class="page-header__title">{{__('Carrito de compra')}}</h1>

                            </div>
                            <div data-anim="slide-up delay-2" class="is-in-view">

                                <p class="page-header__text">{{__('Visualice todos los articulos que desea adquirir')}}.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row justify-end">
                <div class="col-8">
                    <div class="px-30 pr-60 py-25 rounded-8 bg-light-6 md:d-none">
                        <div class="row justify-between">
                            <div class="col-md-4">
                                <div class="fw-500 text-purple-1"> {{__('Productos')}}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-500 text-purple-1">{{__('Precio')}}</div>
                            </div>
                            <div class="col-md-3">
                                <div class="fw-500 text-purple-1">{{__('Subtotal')}}</div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex justify-end">
                                    <div class="fw-500 text-purple-1">{{__('Remover')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-30 pr-60 md:px-0">
                        @foreach($cart->getDetails()->items as $item)

                            <div class="row y-gap-20 justify-between items-center pt-30 pb-30 border-bottom-light">
                                <div class="col-md-4">
                                    <div class="d-flex items-center">
                                        <div class="">
                                            @if($item->extra_info->image)
                                                <div class="size-100 bg-image rounded-8 js-lazy loaded"
                                                     data-ll-status="loaded"
                                                     style="background-image: url({{$item->extra_info->image}});"></div>
                                            @else
                                                <div class="size-100 bg-image rounded-8 js-lazy loaded"
                                                     data-ll-status="loaded"
                                                     style="background-image: url(/assets/educrat/img/shop/products/1.png;);"></div>
                                            @endif

                                        </div>
                                        <div class="fw-500 text-dark-1 ml-30">{{$item->title}}</div>
                                    </div>
                                </div>

                                <div class="col-md-3 md:mt-15">
                                    <div class="">
                                        <div class="shopCart-products__title d-none md:d-block mb-10">
                                            {{__('Precio')}}
                                        </div>
                                        <p>${{number_format($item->price,2)}}</p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="">
                                        <div class="shopCart-products__title d-none md:d-block mb-10">
                                             {{__('Sub total')}}
                                        </div>
                                        <p>${{number_format($item->price,2)}}</p>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md:d-none d-flex justify-end">
                                        <a href="{{route('cart.remove.item',$item->hash)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-x icon">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                    <!-- <div class="shopCart-footer px-16 mt-30">
                        <div class="row justify-between y-gap-30">
                            <div class="col-xl-5">
                                <form class="" action="post">
                                    <div class="d-flex justify-between border-dark">
                                        <input class="rounded-8 px-25 py-20" type="text" placeholder="Coupon Code">
                                        <button class="text-black fw-500" type="submit">Apply coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->

                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="py-30 bg-light-4 rounded-8 border-light">
                        <h5 class="px-30 text-20 fw-500">
                                {{__('Total en el carrito')}}
                        </h5>

                        <div class="d-flex justify-between px-30 item mt-25">
                            <div class="py-15 fw-500 text-dark-1">{{__('Sub total')}}</div>
                            <div class="py-15 fw-500 text-dark-1">${{number_format($cart->getTotal())}}</div>
                        </div>

                        <div class="d-flex justify-between px-30 item border-top-dark">
                            <div class="pt-15 fw-500 text-dark-1">{{__('Total')}}</div>
                            <div class="pt-15 fw-500 text-dark-1">${{number_format($cart->getTotal())}}</div>
                        </div>
                    </div>

                    <a href="{{route('cart.checkout')}}" class="button -md -purple-1 text-white col-12 mt-30">
                        {{__('Ir a pagar')}}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
