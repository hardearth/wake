<li class="nav-item">
    <a class="nav-link menu-link" href="{{route('admin.dashboard')}}">
        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">{{__('Dashboard')}}</span>
    </a>
</li>

<li class="nav-item">
    <a href="#adminUser" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false"
       aria-controls="adminUser" data-key="t-ecommerce">
        <i class="ri-honour-line"></i> {{__('Administrador')}}
    </a>
    <div class="collapse menu-dropdown" id="adminUser">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{route('admin.cruds.user')}}" class="nav-link" data-key="t-products">{{__('Usuarios')}}</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.membership.index')}}" class="nav-link"
                   data-key="t-products">{{__('Membresías')}}</a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a href="#courseCreate" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false"
       aria-controls="courseCreate" data-key="t-ecommerce">
        <i class="ri-book-3-fill"></i> {{__('Cursos')}}
    </a>
    <div class="collapse menu-dropdown" id="courseCreate">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{route('admin.course.create')}}" class="nav-link" data-key="t-products">{{__('Crear')}}</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.course.index')}}" class="nav-link"
                   data-key="t-products">{{__('Administrar')}}</a>
            </li>

        </ul>
    </div>
</li>
<li class="nav-item">
    <a href="{{route('admin.activities.index')}}" class="nav-link" data-key="t-products"><i
            class="ri-calendar-2-fill"></i> {{__('Eventos')}}</a>
</li>
<li class="nav-item">
    <a href="{{route('admin.course.live.index')}}" class="nav-link" data-key="t-products"><i
            class="ri-calendar-2-fill"></i> {{__('Clases en vivo')}}</a>
</li>
<li class="nav-item">

    <a href="{{route('languages.index')}}" class="nav-link" data-key="t-products"><i
            class="ri-translate-2"></i> {{__('Traducciones')}}</a>
</li>
<li class="nav-item">
    <a href="{{route('binshopsblog.admin.index')}}" class="nav-link" data-key="t-products"><i
            class="ri-calendar-2-fill"></i> {{__('Blog')}}</a>

</li>
