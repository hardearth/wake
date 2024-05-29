<header data-anim="fade" data-add-bg="bg-dark-1" class="header -type-1 js-header bg-dark-1">
    <div class="header__container">
        <div class="row justify-between items-center">

            <div class="col-auto">
                <div class="header-left">

                    <div class="header__logo ">
                        <a href="{{route('public.index')}}">
                            <img src={{asset("assets/educrat/img/general/logo.png")}} alt="logo" style="max-width: 155px;">
                        </a>
                    </div>


                    <div class="header__explore text-blue-1 ml-60 xl:ml-30 xl:d-none">
                        <!-- <a href="#" class="d-flex items-center" data-el-toggle=".js-explore-toggle">
                            <i class="icon icon-explore mr-15"></i>
                            {{__('Explorar')}}
                        </a> -->
                        <div class="explore-content py-25 rounded-8 bg-white toggle-element js-explore-toggle">
                            <div class="explore__item">
                                <a href="#" class="d-flex items-center justify-between text-dark-1">
                                    {{__('NFT')}}
                                    <div class="icon-chevron-right text-11"></div>
                                </a>
                                <div class="explore__subnav rounded-8">
                                    <a class="text-dark-1" href="">Web Design</a>
                                    <a class="text-dark-1" href="">Graphic Design</a>

                                </div>
                            </div>
                            <div class="explore__item">
                                <a href="#" class="d-flex items-center justify-between text-dark-1">
                                    {{__('Marketing')}}
                                    <div class="icon-chevron-right text-11"></div>
                                </a>
                                <div class="explore__subnav rounded-8">
                                    <a class="text-dark-1" href="">Web asdasds</a>
                                    <a class="text-dark-1" href="">Graphic Design</a>

                                </div>
                            </div>
                            <div class="explore__item">
                                <a href="#" class="d-flex items-center justify-between text-dark-1">
                                    {{__('Finanzas')}}
                                    <div class="icon-chevron-right text-11"></div>
                                </a>
                                <div class="explore__subnav rounded-8">
                                    <a class="text-dark-1" href="">Web asdasds</a>
                                    <a class="text-dark-1" href="">Graphic Design</a>

                                </div>
                            </div>
                            <div class="explore__item">
                                <a href="#" class="d-flex items-center justify-between text-dark-1">
                                    {{__('Trading')}}
                                    <div class="icon-chevron-right text-11"></div>
                                </a>
                                <div class="explore__subnav rounded-8">
                                    <a class="text-dark-1" href="">Web asdasds</a>
                                    <a class="text-dark-1" href="">Graphic Design</a>

                                </div>
                            </div>
                            <div class="explore__item">
                                <a href="#" class="d-flex items-center justify-between text-dark-1">
                                    {{__('Salud')}}
                                    <div class="icon-chevron-right text-11"></div>
                                </a>
                                <div class="explore__subnav rounded-8">
                                    <a class="text-dark-1" href="">Web asdasds</a>
                                    <a class="text-dark-1" href="">Graphic Design</a>

                                </div>
                            </div>
                            <div class="explore__item">
                                <a href="#" class="d-flex items-center justify-between text-dark-1">
                                    {{__('Coaching')}}
                                    <div class="icon-chevron-right text-11"></div>
                                </a>
                                <div class="explore__subnav rounded-8">
                                    <a class="text-dark-1" href="">Web asdasds</a>
                                    <a class="text-dark-1" href="">Graphic Design</a>

                                </div>
                            </div>

                            <div class="explore__item">
                                <a href="" class="text-purple-1 underline">{{__('Ver todos los cursos')}}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="header-menu js-mobile-menu-toggle ">
                <div class="header-menu__content">
                    <div class="mobile-bg js-mobile-bg"></div>

                    <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                        <a href="{{route('login')}}" class="text-dark-1">{{__('Ingresar')}}</a>
                        <a href="{{route('register')}}" class="text-dark-1 ml-30">{{__('Registrar')}}</a>
                    </div>

                    <div class="menu js-navList">
                        <ul class="menu__nav text-white -is-active">
                            <li>
                                <a href="{{url('/')}}">{{__('Inicio')}}</a>
                            </li>
                            <li>
                                <a href="{{route('public.wake')}}">{{__('Wake')}}</a>
                            </li>

                            <li>
                                <a href="{{route('public.courses')}}">{{__('Programas')}}</a>
                            </li>
                            <li>
                                <a href="{{route('public.events')}}">{{__('Eventos')}}</a>
                            </li>
                            <li>
                                <a href="{{route('binshopsblog.index','es')}}">{{__('Blog')}}</a>
                            </li>

                        </ul>
                    </div>

                    <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                        <div class="mobile-footer__number">
                            <div class="text-17 fw-500 text-dark-1">Llamanos</div>
                            <div class="text-17 fw-500 text-purple-1">800 388 80 90</div>
                        </div>

                        <div class="lh-2 mt-10">
                            <div>329 Queensberry Street,<br> North Melbourne VIC 3051, Australia.</div>
                            <div>hi@educrat.com</div>
                        </div>

                        <div class="mobile-socials mt-10">

                            <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="fa fa-instagram"></i>
                            </a>

                            <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="fa fa-linkedin"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                    <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                        <div class="icon-close text-dark-1 text-16"></div>
                    </div>
                </div>

                <div class="header-menu-bg"></div>
            </div>


            <div class="col-auto">
                <div class="header-right d-flex items-center">
                    <div class="header-right__icons text-white d-flex items-center">

                        <div class="">
                            <!-- <button class="d-flex items-center text-white" data-el-toggle=".js-search-toggle">
                                <i class="text-20 icon icon-search"></i>
                            </button> -->

                            <div class="toggle-element js-search-toggle">
                                <div class="header-search pt-90 bg-white shadow-4">
                                    <div class="container">
                                        <div class="header-search__field">
                                            <div class="icon icon-search text-dark-1"></div>
                                            <input type="text" class="col-12 text-18 lh-12 text-dark-1 fw-500"
                                                   placeholder="¿Qué te gustaría aprender?">

                                            <button
                                                class="d-flex items-center justify-center size-40 rounded-full bg-purple-3"
                                                data-el-toggle=".js-search-toggle">
                                                <img src={{asset("assets/educrat/img/menus/close.svg")}} alt="icon">
                                            </button>
                                        </div>

                                        <div class="header-search__content mt-30">
                                            <div class="text-17 text-dark-1 fw-500">Popular Right Now</div>

                                            <div class="d-flex y-gap-5 flex-column mt-20">
                                                <a href="" class="text-dark-1">The Ultimate Drawing Course - Beginner to
                                                    Advanced</a>
                                                <a href="" class="text-dark-1">Character Art School: Complete Character
                                                    Drawing Course</a>
                                                <a href="" class="text-dark-1">Complete Blender Creator: Learn 3D
                                                    Modelling for Beginners</a>
                                                <a href="" class="text-dark-1">User Experience Design Essentials - Adobe
                                                    XD UI UX Design</a>
                                                <a href="" class="text-dark-1">Graphic Design Masterclass - Learn GREAT
                                                    Design</a>
                                                <a href="" class="text-dark-1">Adobe Photoshop CC – Essentials Training
                                                    Course</a>
                                            </div>

                                            <div class="mt-30">
                                                <button class="uppercase underline">PRESS ENTER TO SEE ALL SEARCH
                                                    RESULTS
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-search__bg" data-el-toggle=".js-search-toggle"></div>
                            </div>
                        </div>

                        @if(count(Cart::getDetails()?->items))
                        <div class="relative ml-30 xl:ml-20">
                            <button class="d-flex items-center text-white" data-el-toggle=".js-cart-toggle">
                                <i class="text-20 icon icon-basket"></i>
                            </button>

                            <div class="toggle-element js-cart-toggle">
                                <div class="header-cart bg-white -dark-bg-dark-1 rounded-8">
                                    <div class="px-30 pt-30 pb-10">
                                        @foreach(Cart::getDetails()->items as $item)

                                            <div class="row justify-between x-gap-40 pb-20">
                                                <div class="col">
                                                    <div class="row x-gap-10 y-gap-10">
                                                        <div class="col-auto">
                                                            @if($item->extra_info->image)
                                                                <img src="{{$item->extra_info->image}}" alt="image"
                                                                     style="width: 60px; height: 60px">
                                                            @else
                                                                <img src="{{asset('assets/educrat/img/misc/1.png')}}"
                                                                     style="width: 60px; height: 60px" alt="image">
                                                            @endif
                                                        </div>

                                                        <div class="col">
                                                            <div class="text-dark-1 lh-15">{{$item->title}}</div>

                                                            <div class="d-flex items-center mt-10">
                                                                <div
                                                                    class="lh-12 fw-500 line-through text-light-1 mr-10">

                                                                </div>
                                                                <div class="text-18 lh-12 fw-500 text-dark-1">
                                                                    ${{number_format($item->price,2)}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto">

                                                    <button onclick="window.location.href = '{{route('cart.remove.item',$item->hash)}}'; $(this).prop('disabled', true);" class="btn btn-link">
                                                        <img src={{asset("assets/educrat/img/menus/close.svg")}} alt="icon">
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="px-30 pt-20 pb-30 border-top-light">
                                        <div class="d-flex justify-between">
                                            <div class="text-18 lh-12 text-dark-1 fw-500">{{__('Total')}}:</div>
                                            <div class="text-18 lh-12 text-dark-1 fw-500">
                                                ${{number_format(Cart::getTotal())}}</div>
                                        </div>

                                        <div class="row x-gap-20 y-gap-10 pt-30">
                                            <div class="col-sm-6">
                                                <a href="{{route('cart.show')}}"
                                                   class="button py-20 -dark-1 text-white -dark-button-white col-12">
                                                    {{__('Ver carrito')}}
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{route('cart.checkout')}}"
                                                   class="button py-20 -purple-1 text-white col-12">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="d-none xl:d-block ml-20">
                            <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                                <i class="text-11 icon icon-mobile-menu"></i>
                            </button>
                        </div>
                    </div>

                    <div class="header-right__buttons d-flex items-center ml-30 md:d-none">
                        @if(Auth::check())
                            <a href="{{route('login')}}" class="button -underline text-white">{{__('Ir a la academia')}}</a>
                        @else
                            <a href="{{route('login')}}" class="button -underline text-white">{{__('Ingresar')}}</a>
                        @endif

                        @if(!Auth::check())
                        <a href="{{route('register')}}"
                           class="button -sm -purple-2 text-white ml-30">{{__('Registrar')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

