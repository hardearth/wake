<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{url('/')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/velzon/images/logo-sm.png')}}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('assets/velzon/images/logo-dark.png')}}" alt="" height="17">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="{{url('/')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/velzon/images/logo-sm.png')}}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('assets/educrat/img/general/logo.png')}}" alt="" height="40">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    @include('layouts.partials.velzon.menu.admin')

                </ul>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
