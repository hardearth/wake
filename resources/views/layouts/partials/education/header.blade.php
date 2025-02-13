<header>
    <div id="header-sticky" class="header__area header__padding-2 header__shadow">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-2 col-sm-4 col-6">
                    <div class="header__left d-flex">
                        <div class="logo">
                            <a href="{{route('public.index')}}">
                                <img src="{{asset('assets/education/img/logo/logo.png')}}" alt="logo">
                            </a>
                        </div>
                        <div class="header__category d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="course-grid.html" class="cat-menu d-flex align-items-center">
                                            <div class="cat-dot-icon d-inline-block">
                                                <svg viewBox="0 0 276.2 276.2">
                                                    <g>
                                                        <g>
                                                            <path class="cat-dot"
                                                                  d="M33.1,2.5C15.3,2.5,0.9,17,0.9,34.8s14.5,32.3,32.3,32.3s32.3-14.5,32.3-32.3S51,2.5,33.1,2.5z"/>
                                                            <path class="cat-dot"
                                                                  d="M137.7,2.5c-17.8,0-32.3,14.5-32.3,32.3s14.5,32.3,32.3,32.3c17.8,0,32.3-14.5,32.3-32.3S155.5,2.5,137.7,2.5    z"/>
                                                            <path class="cat-dot"
                                                                  d="M243.9,67.1c17.8,0,32.3-14.5,32.3-32.3S261.7,2.5,243.9,2.5S211.6,17,211.6,34.8S226.1,67.1,243.9,67.1z"/>
                                                            <path class="cat-dot"
                                                                  d="M32.3,170.5c17.8,0,32.3-14.5,32.3-32.3c0-17.8-14.5-32.3-32.3-32.3S0,120.4,0,138.2S14.5,170.5,32.3,170.5z"/>
                                                            <path class="cat-dot"
                                                                  d="M136.8,170.5c17.8,0,32.3-14.5,32.3-32.3c0-17.8-14.5-32.3-32.3-32.3c-17.8,0-32.3,14.5-32.3,32.3    C104.5,156.1,119,170.5,136.8,170.5z"/>
                                                            <path class="cat-dot"
                                                                  d="M243,170.5c17.8,0,32.3-14.5,32.3-32.3c0-17.8-14.5-32.3-32.3-32.3s-32.3,14.5-32.3,32.3    C210.7,156.1,225.2,170.5,243,170.5z"/>
                                                            <path class="cat-dot"
                                                                  d="M33,209.1c-17.8,0-32.3,14.5-32.3,32.3c0,17.8,14.5,32.3,32.3,32.3s32.3-14.5,32.3-32.3S50.8,209.1,33,209.1z    "/>
                                                            <path class="cat-dot"
                                                                  d="M137.6,209.1c-17.8,0-32.3,14.5-32.3,32.3c0,17.8,14.5,32.3,32.3,32.3c17.8,0,32.3-14.5,32.3-32.3    S155.4,209.1,137.6,209.1z"/>
                                                            <path class="cat-dot"
                                                                  d="M243.8,209.1c-17.8,0-32.3,14.5-32.3,32.3c0,17.8,14.5,32.3,32.3,32.3c17.8,0,32.3-14.5,32.3-32.3    S261.6,209.1,243.8,209.1z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <span>Categorías</span>
                                        </a>
                                        <ul class="cat-submenu">
                                            <li><a href="course-details.html">Salud</a></li>
                                            <li><a href="course-details.html">Trading</a></li>
                                            <li><a href="course-details.html">NFT</a></li>
                                            <li><a href="course-details.html">Coaching</a></li>
                                            <li><a href="course-details.html">Crecimiento Personal</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-10 col-sm-8 col-6">
                    <div class="header__right d-flex justify-content-end align-items-center">
                        <div class="main-menu main-menu-2">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="">
                                        <a href="{{route('public.index')}}">{{__('Inicio')}}</a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('public.courses')}}">{{__('Cursos')}}</a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('public.blog')}}">{{__('Blog')}}</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('public.blog')}}">{{__('Blog')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('public.teachers')}}">{{__('Instructores')}}</a></li>
                                    <li><a href="contact.html">Contacto</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header__btn header__btn-2 ml-50 d-none d-sm-block">
                            <a href="{{route('login')}}" class="e-btn">{{__('Ingresar')}}</a>
                        </div>
                        <div class="sidebar__menu d-xl-none">
                            <div class="sidebar-toggle-btn ml-30" id="sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

