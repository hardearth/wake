<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{env('app_name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/education/img/favicon.png')}}">
    @include('layouts.partials.education.styles')
</head>
<body>
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="loading-content-2 text-center">
                <img class="loading-logo-icon-2" src="{{asset('assets/education/img/logo/logo-icon.png')}}" alt="">
                <img class="loading-logo-text-2" src="{{asset('assets/education/img/logo/logo-text-2.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
@include('layouts.partials.education.header')
<div class="cartmini__area">
    <div class="cartmini__wrapper">
        <div class="cartmini__title">
            <h4>Shopping cart</h4>
        </div>
        <div class="cartmini__close">
            <button type="button" class="cartmini__close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="cartmini__widget">
            <div class="cartmini__inner">
                <ul>
                    <li>
                        <div class="cartmini__thumb">
                            <a href="#">
                                <img src="{{asset('assets/education/img/course/sm/cart-1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="cartmini__content">
                            <h5><a href="#">Strategy law and organization Foundation </a></h5>
                            <div class="product-quantity mt-10 mb-10">
                                <span class="cart-minus">-</span>
                                <input class="cart-input" type="text" value="1"/>
                                <span class="cart-plus">+</span>
                            </div>
                            <div class="product__sm-price-wrapper">
                                <span class="product__sm-price">$46.00</span>
                            </div>
                        </div>
                        <a href="#" class="cartmini__del"><i class="fal fa-times"></i></a>
                    </li>
                    <li>
                        <div class="cartmini__thumb">
                            <a href="#">
                                <img src="{{asset('assets/education/img/course/sm/cart-2.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="cartmini__content">
                            <h5><a href="#">Fundamentals of music theory Learn new</a></h5>
                            <div class="product-quantity mt-10 mb-10">
                                <span class="cart-minus">-</span>
                                <input class="cart-input" type="text" value="1"/>
                                <span class="cart-plus">+</span>
                            </div>
                            <div class="product__sm-price-wrapper">
                                <span class="product__sm-price">$32.00</span>
                            </div>
                        </div>
                        <a href="#" class="cartmini__del"><i class="fal fa-times"></i></a>
                    </li>
                    <li>
                        <div class="cartmini__thumb">
                            <a href="#">
                                <img src="{{asset('assets/education/img/course/sm/cart-3.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="cartmini__content">
                            <h5><a href="#">Strategy law and organization Foundation </a></h5>
                            <div class="product-quantity mt-10 mb-10">
                                <span class="cart-minus">-</span>
                                <input class="cart-input" type="text" value="1"/>
                                <span class="cart-plus">+</span>
                            </div>
                            <div class="product__sm-price-wrapper">
                                <span class="product__sm-price">$62.00</span>
                            </div>
                        </div>
                        <a href="#" class="cartmini__del"><i class="fal fa-times"></i></a>
                    </li>
                </ul>
            </div>
            <div class="cartmini__checkout">
                <div class="cartmini__checkout-title mb-30">
                    <h4>Subtotal:</h4>
                    <span>$113.00</span>
                </div>
                <div class="cartmini__checkout-btn">
                    <a href="cart.html" class="e-btn e-btn-border mb-10 w-100"> <span></span> view cart</a>
                    <a href="checkout.html" class="e-btn w-100"> <span></span> checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<div class="sidebar__area">
    <div class="sidebar__wrapper">
        <div class="sidebar__close">
            <button class="sidebar__close-btn" id="sidebar__close-btn">
                <span><i class="fal fa-times"></i></span>
                <span>close</span>
            </button>
        </div>
        <div class="sidebar__content">
            <div class="logo mb-40">
                <a href="index.html">
                    <img src="{{asset('assets/education/img/logo/logo.png')}}" alt="logo">
                </a>
            </div>
            <div class="mobile-menu fix"></div>

            <div class="sidebar__search p-relative mt-40 ">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><i class="fad fa-search"></i></button>
                </form>
            </div>
            <div class="sidebar__cart mt-30">
                <a href="#">
                    <div class="header__cart-icon">
                        <svg viewBox="0 0 24 24">
                            <circle class="st0" cx="9" cy="21" r="1"/>
                            <circle class="st0" cx="20" cy="21" r="1"/>
                            <path class="st0" d="M1,1h4l2.7,13.4c0.2,1,1,1.6,2,1.6h9.7c1,0,1.8-0.7,2-1.6L23,6H6"/>
                        </svg>
                    </div>
                    <span class="cart-item">2</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<main>
    @yield('content')
</main>
@include('layouts.partials.education.footer')
</body>
</html>

