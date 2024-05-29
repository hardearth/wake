<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/public.css', 'resources/js/public.js'])
    @yield('styles')
    <title>{{env('app_name')}}</title>
</head>
<body class="preloader-visible" data-barba="wrapper">
<div class="preloader js-preloader">
    <div class="preloader__bg"></div>
</div>
<div class="barba-container" data-barba="container">
    <main class="main-content">
        <header class="header -base-sidebar border-bottom-light bg-white js-header">
            <div class="header__container py-20 px-10">
                <div class="row justify-between items-center">
                    <div class="col-auto">
                        <div class="d-flex items-center">
                            <div class="header__explore text-dark-1">
                                <button class="d-flex items-center js-dashboard-home-9-sidebar-toggle">
                                    <i class="icon -dark-text-white icon-explore"></i>
                                </button>
                            </div>

                            <div class="header__logo ml-30 md:ml-20">
                                <a data-barba href="{{url('/')}}">
                                    <img class="-light-d-none" style="max-width: 130px;" src="{{asset('assets/educrat/img/general/logo.png')}}"
                                         alt="logo">
                                    <img class="-dark-d-none" style="max-width: 130px;"
                                         src="{{asset('assets/educrat/img/general/logo-dark.png')}}" alt="logo">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex items-center">
                            <div class="d-flex items-center sm:d-none">
                                @impersonating($guard = null)
                                <div>
                                    <a href="{{ route('impersonate.leave') }}"
                                       class="text-red-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                        <i class="fa fa-user-times fa-2x" aria-hidden="true"></i>
                                    </a>
                                </div>
                                @endImpersonating
                                <!-- <div class="relative">
                                    <button
                                        class="js-darkmode-toggle text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                        <i class="text-light-1 text-24 icon icon-night"></i>
                                    </button>
                                </div>

                                <div class="relative">
                                    <button data-maximize
                                            class="text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                        <i class="text-24 icon icon-maximize"></i>
                                    </button>
                                </div> -->

<!--
                                <div class="relative ">
                                    <button
                                        class="d-flex items-center text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light"
                                        data-el-toggle=".js-cart-toggle">
                                        <i class="text-20 icon icon-basket"></i>
                                    </button>

                                    <div class="toggle-element js-cart-toggle">
                                        <div class="header-cart bg-white -dark-bg-dark-1 rounded-8">
                                            <div class="px-30 pt-30 pb-10">

                                                <div class="row justify-between x-gap-40 pb-20">
                                                    <div class="col">
                                                        <div class="row x-gap-10 y-gap-10">
                                                            <div class="col-auto">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/menus/cart/1.png')}}"
                                                                    alt="image">
                                                            </div>

                                                            <div class="col">
                                                                <div class="text-dark-1 lh-15">The Ultimate Drawing
                                                                    Course Beginner to Advanced...
                                                                </div>

                                                                <div class="d-flex items-center mt-10">
                                                                    <div
                                                                        class="lh-12 fw-500 line-through text-light-1 mr-10">
                                                                        $179
                                                                    </div>
                                                                    <div class="text-18 lh-12 fw-500 text-dark-1">$79
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button><img
                                                                src="{{asset('assets/educrat/img/menus/close.svg')}}"
                                                                alt="icon"></button>
                                                    </div>
                                                </div>

                                                <div class="row justify-between x-gap-40 pb-20">
                                                    <div class="col">
                                                        <div class="row x-gap-10 y-gap-10">
                                                            <div class="col-auto">
                                                                <img
                                                                    src="{{asset('assets/educrat/img/menus/cart/2.png')}}"
                                                                    alt="image">
                                                            </div>

                                                            <div class="col">
                                                                <div class="text-dark-1 lh-15">User Experience Design
                                                                    Essentials - Adobe XD UI UX...
                                                                </div>

                                                                <div class="d-flex items-center mt-10">
                                                                    <div
                                                                        class="lh-12 fw-500 line-through text-light-1 mr-10">
                                                                        $179
                                                                    </div>
                                                                    <div class="text-18 lh-12 fw-500 text-dark-1">$79
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button><img src="assets/educrat/img/menus/close.svg"
                                                                     alt="icon"></button>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="px-30 pt-20 pb-30 border-top-light">
                                                <div class="d-flex justify-between">
                                                    <div class="text-18 lh-12 text-dark-1 fw-500">Total:</div>
                                                    <div class="text-18 lh-12 text-dark-1 fw-500">$659</div>
                                                </div>

                                                <div class="row x-gap-20 y-gap-10 pt-30">
                                                    <div class="col-sm-6">
                                                        <button
                                                            class="button py-20 -dark-1 text-white -dark-button-white col-12">
                                                            View Cart
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button class="button py-20 -purple-1 text-white col-12">
                                                            Checkout
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="relative">
                                    <a href="#"
                                       class="d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light"
                                       data-el-toggle=".js-msg-toggle">
                                        <i class="text-24 icon icon-email"></i>
                                    </a>
                                </div> -->

                                <!-- <div class="relative">
                                    <a href="#"
                                       class="d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light"
                                       data-el-toggle=".js-notif-toggle">
                                        <i class="text-24 icon icon-notification"></i>
                                    </a>

                                    <div class="toggle-element js-notif-toggle">
                                        <div
                                            class="toggle-bottom -notifications bg-white shadow-4 border-light rounded-8 mt-10">
                                            <div class="py-30 px-30">
                                                <div class="y-gap-40">



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                            <div class="relative d-flex items-center ml-10">
                                <a href="#" data-el-toggle=".js-profile-toggle">
                                    @if(Auth::user()->detail?->img_profile)
                                        <img class="size-50 img-ratio-2" src="{{Auth::user()->detail->profile_src_image}}"
                                             alt="image" style="border-radius: 50px">
                                    @else
                                        <img class="size-50" src="{{asset('assets/educrat/img/misc/user-profile.png')}}"
                                             alt="image">
                                    @endif
                                </a>

                                <div class="toggle-element js-profile-toggle">
                                    <div class="toggle-bottom -profile bg-white shadow-4 border-light rounded-8 mt-10">
                                        <div class="px-30 py-30">
                                            <div class="sidebar -dashboard">
                                                <div class="sidebar__item {{request()->routeIs('user.profile')?'-is-active -dark-bg-dark-2':''}}">
                                                    <a href="{{ route('user.profile') }}"
                                                       class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                                        <i class="text-20 icon-discovery mr-15"></i>
                                                        {{__('Mi perfil')}}
                                                    </a>
                                                </div>
                                                <div class="sidebar__item {{request()->routeIs('user.course.my-notes')?'-is-active -dark-bg-dark-2':''}}">
                                                    <a href="{{route('user.course.my-notes')}}"
                                                       class="d-flex items-center text-17 lh-1 fw-500 ">
                                                        <i class="text-20 icon-bookmark mr-15"></i>
                                                        {{__('Mis notas')}}
                                                    </a>
                                                </div>
                                                <div class="sidebar__item {{request()->routeIs('user.shopping')?'-is-active -dark-bg-dark-2':''}}">
                                                    <a href="{{route('user.shopping')}}"
                                                       class="d-flex items-center text-17 lh-1 fw-500 ">
                                                        <i class="text-20 icon-setting mr-15"></i>
                                                        {{__('Mis compras')}}
                                                    </a>
                                                </div>
                                                <div class="sidebar__item {{request()->routeIs('onboard')?'-is-active -dark-bg-dark-2':''}}">
                                                    <a href="{{route('onboard')}}"
                                                       class="d-flex items-center text-17 lh-1 fw-500 ">
                                                        <i class="text-20 icon-setting mr-15"></i>
                                                        {{__('Wallets')}}
                                                    </a>
                                                </div>
                                                <div class="sidebar__item {{request()->routeIs('logout')?'-is-active -dark-bg-dark-2':''}}">
                                                    <a class="d-flex items-center text-17 lh-1 fw-500 "
                                                       href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        <i class="text-20 icon-power mr-15"></i>
                                                        {{__('Cerrar sesión')}}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="content-wrapper js-content-wrapper">
            <div class="dashboard -home-9 px-0 js-dashboard-home-9">
                <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30">

                    <div class="sidebar -base-sidebar">
                        <div class="sidebar__inner">
                            <div>
                                <div class="text-16 lh-1 fw-500 text-dark-1 mb-30">General</div>
                                <div>
                                    <div class="sidebar__item {{request()->routeIs('user.home')?'-is-active':''}} -base-sidebar-menu-hover">


                                        <a href="{{route('user.home')}}"
                                           class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                                            <i class="text-20 icon-discovery mr-15"></i>
                                            {{__('Inicio')}}
                                        </a>
                                    </div>
                                    <div class="sidebar__item {{request()->routeIs('user.course.my-courses')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{route('user.course.my-courses')}}"
                                           class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                                            <i class="text-20 icon-play-button mr-15"></i>
                                            {{__('Mis Cursos')}}
                                        </a>
                                    </div>

                                    <div class="sidebar__item {{request()->routeIs('user.course.my-notes')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{route('user.course.my-notes')}}" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                                            <i class="text-20 icon-book mr-15"></i>
                                            {{__('Mis Notas')}}
                                        </a>
                                    </div>

                                    <div class="sidebar__item {{request()->routeIs('user.activities.index')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{ route('user.activities.index') }}" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500">
                                            <i class="text-20 icon-time-management mr-15"></i>
                                            {{__('Eventos')}}
                                        </a>
                                    </div>

                                    <div class="sidebar__item {{request()->routeIs('user.live.index')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{ route('user.live.index') }}" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500 ">
                                            <i class="text-20 icon-bookmark mr-15"></i>
                                            {{__('Clases en Vivo')}}
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-60">
                                <div class="text-16 lh-1 fw-500 text-dark-1 mb-30">{{__('Mi negocio')}}</div>
                                <div class="">


                                    <div class="sidebar__item {{request()->routeIs('user.affiliates')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{route('user.affiliates')}}"  class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500 ">
                                             {{__('Mis Afiliados')}}
                                        </a>
                                    </div>

                                    <div class="sidebar__item {{request()->routeIs('user.sales')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{route('user.sales')}}"  class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500 ">
                                             {{__('Gestión de ventas y Pagos')}}
                                        </a>
                                    </div>
                                    <div class="sidebar__item {{request()->routeIs('user.markets')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{route('user.markets')}}"  class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500 ">
                                             {{__('Mercado de afiliación')}}
                                        </a>
                                    </div>

                                    <div class="sidebar__item {{request()->routeIs('onboard')?'-is-active':''}} -base-sidebar-menu-hover">
                                        <a href="{{route('onboard')}}"  class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500 ">
                                             {{__('Asociar Wallet')}}
                                        </a>
                                    </div>
                                </div>
                        </div>

                            @if(Auth::user()->roles_id==4)

                                <div class="mt-60">
                                        <div class="text-16 lh-1 fw-500 text-dark-1 mb-30">{{__('Ventas Instructor ')}}</div>
                                        <div class="">


                                        <div class="sidebar__item {{request()->routeIs('admin.teacher.payment')?'-is-active':''}} -base-sidebar-menu-hover">
                                                <a href="{{route('admin.teacher.payments')}}" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500 ">
                                                   {{__('Gestión de ventas y Pagos')}}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="sidebar__item {{request()->routeIs('user.live.index')?'-is-active':''}} -base-sidebar-menu-hover">
                                                <a href="{{route('admin.teacher.students')}}" class="-dark-sidebar-white d-flex items-center text-17 lh-1 fw-500 ">
                                                   {{__('Listado de Alumnos')}}
                                                </a>
                                            </div>
                                        </div>
                                </div>
                        @endif
                        </div>
                    </div>

                </div>

                <div class="dashboard__main mt-0">
                    <div class="dashboard__main  px-20 pb-0 ">
                        @if(count($errors) > 0)

                            <div style="position: absolute; top: 80px; right: 30px; z-index: 9999; ">
                                <div class="toast show">
                                    <div class="toast-header">
                                        <i class="fa-solid fa-square text-danger ml-3">&nbsp;</i>
                                        &nbsp;
                                        &nbsp;
                                        <strong class="me-auto">

                                            {{__('Error')}}
                                        </strong>

                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        @foreach($errors->all() as $error)
                                            <div>
                                                {{$error}}
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                    <footer class="footer">
                        <div class="container">
                            <div class="py-30 border-top-light">
                                <div class="row items-center justify-between">
                                    <div class="col-auto">
                                        <div class="text-13 lh-1">© 2023 Wake Education. {{__('Todos los derechos reservados')}}.</div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="d-flex items-center flex-wrap x-gap-20">
                                                <div>
                                                    <a href="help-center.html" class="text-13 lh-1">{{__('Centro de ayuda')}}</a>
                                                </div>
                                                <div>
                                                    <a href="terms.html" class="text-13 lh-1">{{__('Politica y privacidad')}}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-13 lh-1">{{__('Noticias')}}</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-13 lh-1">{{__('Garantía')}}</a>
                                                </div>
                                            </div>

                                            <button class="button -md -rounded bg-light-4 text-light-1 ml-30">{{__('English')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

    </main>

    <aside class="sidebar-menu toggle-element js-msg-toggle js-dsbh-sidebar-menu">
        <div class="sidebar-menu__bg"></div>

        <div class="sidebar-menu__content scroll-bar-1 py-30 px-40 sm:py-25 sm:px-20 bg-white -dark-bg-dark-1">
            <div class="row items-center justify-between mb-30">
                <div class="col-auto">
                    <div class="-sidebar-buttons">
                        <button data-sidebar-menu-button="messages"
                                class="text-17 text-dark-1 fw-500 -is-button-active">
                            Messages
                        </button>

                        <button data-sidebar-menu-button="messages-2" data-sidebar-menu-target="messages"
                                class="d-flex items-center text-17 text-dark-1 fw-500">
                            <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                            Messages
                        </button>

                        <button data-sidebar-menu-button="settings" data-sidebar-menu-target="messages"
                                class="d-flex items-center text-17 text-dark-1 fw-500">
                            <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                            Settings
                        </button>

                        <button data-sidebar-menu-button="contacts" data-sidebar-menu-target="messages"
                                class="d-flex items-center text-17 text-dark-1 fw-500">
                            <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                            Contacts
                        </button>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="row x-gap-10">
                        <div class="col-auto">
                            <button data-sidebar-menu-target="settings"
                                    class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                                <i class="icon-setting text-16"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button data-sidebar-menu-target="contacts"
                                    class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                                <i class="icon-friend text-16"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button data-el-toggle=".js-msg-toggle"
                                    class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                                <i class="icon-close text-14"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative js-menu-switch">
                <div data-sidebar-menu-open="messages" class="sidebar-menu__item -sidebar-menu -sidebar-menu-opened">
                    <form class="search-field rounded-8 h-50" action="post">
                        <input class="bg-light-3 pr-50" type="text" placeholder="Search Courses">
                        <button class="" type="submit">
                            <i class="icon-search text-light-1 text-20"></i>
                        </button>
                    </form>

                    <div class="accordion -block text-left pt-20 js-accordion">

                        <div class="accordion__item border-light rounded-16">
                            <div class="accordion__button">
                                <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                                    <div class="icon d-flex items-center justify-center">
                                        <span class="lh-1 fw-500">2</span>
                                    </div>
                                    <div class="icon d-flex items-center justify-center">
                                        <span class="lh-1 fw-500">2</span>
                                    </div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1 pt-3">Starred</span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner pl-20 pr-20 pb-20">
                                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pointer">
                                        <div class="col-auto">
                                            <img src="assets/educrat/img/dashboard/right-sidebar/messages/1.png"
                                                 alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                                            <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-13 lh-12 pt-8">35 mins</div>
                                        </div>
                                    </div>

                                    <div data-sidebar-menu-target="messages-2"
                                         class="row x-gap-10 y-gap-10 pt-15 pointer">
                                        <div class="col-auto">
                                            <img src="assets/educrat/img/dashboard/right-sidebar/messages/1.png"
                                                 alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                                            <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-13 lh-12 pt-8">35 mins</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item border-light rounded-16">
                            <div class="accordion__button">
                                <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                                    <div class="icon d-flex items-center justify-center">
                                        <span class="lh-1 fw-500">2</span>
                                    </div>
                                    <div class="icon d-flex items-center justify-center">
                                        <span class="lh-1 fw-500">2</span>
                                    </div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1 pt-3">Group</span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner pl-20 pr-20 pb-20">
                                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pointer">
                                        <div class="col-auto">
                                            <img src="assets/educrat/img/dashboard/right-sidebar/messages/1.png"
                                                 alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                                            <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-13 lh-12 pt-8">35 mins</div>
                                        </div>
                                    </div>

                                    <div data-sidebar-menu-target="messages-2"
                                         class="row x-gap-10 y-gap-10 pt-15 pointer">
                                        <div class="col-auto">
                                            <img src="assets/educrat/img/dashboard/right-sidebar/messages/1.png"
                                                 alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                                            <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-13 lh-12 pt-8">35 mins</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item border-light rounded-16">
                            <div class="accordion__button">
                                <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                                    <div class="icon d-flex items-center justify-center">
                                        <span class="lh-1 fw-500">2</span>
                                    </div>
                                    <div class="icon d-flex items-center justify-center">
                                        <span class="lh-1 fw-500">2</span>
                                    </div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1 pt-3">Private</span>
                            </div>

                            <div class="accordion__content">
                                <div class="accordion__content__inner pl-20 pr-20 pb-20">
                                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pointer">
                                        <div class="col-auto">
                                            <img src="assets/educrat/img/dashboard/right-sidebar/messages/1.png"
                                                 alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                                            <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-13 lh-12 pt-8">35 mins</div>
                                        </div>
                                    </div>

                                    <div data-sidebar-menu-target="messages-2"
                                         class="row x-gap-10 y-gap-10 pt-15 pointer">
                                        <div class="col-auto">
                                            <img src="assets/educrat/img/dashboard/right-sidebar/messages/1.png"
                                                 alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                                            <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-13 lh-12 pt-8">35 mins</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div data-sidebar-menu-open="messages-2" class="sidebar-menu__item -sidebar-menu">
                    <div class="row x-gap-10 y-gap-10">
                        <div class="col-auto">
                            <img src="assets/educrat/img/dashboard/right-sidebar/messages-2/1.png" alt="image">
                        </div>
                        <div class="col">
                            <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Arlene McCoy</div>
                            <div class="text-14 lh-1 mt-5">Active</div>
                        </div>
                    </div>

                    <div class="mt-20 pt-30 border-top-light">
                        <div class="row y-gap-20">
                            <div class="col-12">
                                <div class="row x-gap-10 y-gap-10 items-center">
                                    <div class="col-auto">
                                        <img
                                            src="{{asset('assets/educrat/img/dashboard/right-sidebar/messages-2/2.png')}}"
                                            alt="image">
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500 text-dark-1">Albert Flores</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-14 lh-1 ml-3">35 mins</div>
                                    </div>
                                </div>
                                <div class="bg-light-3 rounded-8 px-30 py-20 mt-15">
                                    How likely are you to recommend our company to your friends and family?
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row x-gap-10 y-gap-10 items-center justify-end">
                                    <div class="col-auto">
                                        <div class="text-14 lh-1 mr-3">35 mins</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500 text-dark-1">You</div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="assets/educrat/img/dashboard/right-sidebar/messages-2/3.png"
                                             alt="image">
                                    </div>
                                </div>
                                <div
                                    class="text-right bg-light-7 -dark-bg-dark-2 text-purple-1 rounded-8 px-30 py-20 mt-15">
                                    How likely are you to recommend our company to your friends and family?
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row x-gap-10 y-gap-10 items-center">
                                    <div class="col-auto">
                                        <img src="assets/educrat/img/dashboard/right-sidebar/messages-2/3.png"
                                             alt="image">
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500 text-dark-1">Cameron Williamson</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-14 lh-1 ml-3">35 mins</div>
                                    </div>
                                </div>
                                <div class="bg-light-3 rounded-8 px-30 py-20 mt-15">
                                    Ok, Understood!
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-30 pb-20">
                        <form class="contact-form row y-gap-20" action="post">

                            <div class="col-12">

                                <textarea placeholder="Write a message" rows="7"></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="button -md -purple-1 text-white">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div data-sidebar-menu-open="contacts" class="sidebar-menu__item -sidebar-menu">
                    <div class="tabs -pills js-tabs">
                        <div class="tabs__controls d-flex js-tabs-controls">

                            <button class="tabs__button px-15 py-8 rounded-8 text-dark-1 js-tabs-button is-active"
                                    data-tab-target=".-tab-item-1" type="button">Contacts
                            </button>

                            <button class="tabs__button px-15 py-8 rounded-8 text-dark-1 js-tabs-button "
                                    data-tab-target=".-tab-item-2" type="button">Request
                            </button>

                        </div>
                        }
                        <div class="tabs__content pt-30 js-tabs-content">

                            <div class="tabs__pane -tab-item-1 is-active">
                                <div class="row x-gap-10 y-gap-10 items-center">
                                    <div class="col-auto">
                                        <img src="assets/educrat/img/dashboard/right-sidebar/contacts/1.png"
                                             alt="image">
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500 text-dark-1">Darlene Robertson</div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-2 ">
                                <div class="row x-gap-10 y-gap-10 items-center">
                                    <div class="col-auto">
                                        <img src="assets/educrat/img/dashboard/right-sidebar/contacts/1.png"
                                             alt="image">
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-15 lh-12 fw-500 text-dark-1">Darlene Robertson</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div data-sidebar-menu-open="settings" class="sidebar-menu__item -sidebar-menu">
                    <div class="text-17 text-dark-1 fw-500">Privacy</div>
                    <div class="text-15 mt-5">You can restrict who can message you</div>
                    <div class="mt-30">

                        <div class="form-radio d-flex items-center ">
                            <div class="radio">
                                <input type="radio">
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="lh-1 text-13 text-dark-1 ml-12">My contacts only</div>
                        </div>


                        <div class="form-radio d-flex items-center mt-15">
                            <div class="radio">
                                <input type="radio">
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="lh-1 text-13 text-dark-1 ml-12">My contacts and anyone in my courses</div>
                        </div>


                        <div class="form-radio d-flex items-center mt-15">
                            <div class="radio">
                                <input type="radio">
                                <div class="radio__mark">
                                    <div class="radio__icon"></div>
                                </div>
                            </div>
                            <div class="lh-1 text-13 text-dark-1 ml-12">Anyone on the site</div>
                        </div>

                    </div>

                    <div class="text-17 text-dark-1 fw-500 mt-30 mb-30">Notification preferences</div>
                    <div class="form-switch d-flex items-center">
                        <div class="switch">
                            <input type="checkbox">
                            <span class="switch__slider"></span>
                        </div>
                        <div class="text-13 lh-1 text-dark-1 ml-10">Email</div>
                    </div>

                    <div class="text-17 text-dark-1 fw-500 mt-30 mb-30">General</div>
                    <div class="form-switch d-flex items-center">
                        <div class="switch">
                            <input type="checkbox">
                            <span class="switch__slider"></span>
                        </div>
                        <div class="text-13 lh-1 text-dark-1 ml-10">Use enter to send</div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
<!-- barba container end -->

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
@include('layouts.partials.educrat.scripts')
</body>

</html>
