<div class="container-fluid justify-content-end text-uppercase">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 ms-auto mb-lg-0">
            <li class="nav-item {{ Request::is('/') ? 'active2' : '' }}"><a href="{{route('index')}}" class="nav-link text-white hover-link">Inicio</a></li>
            <li class="nav-item">
                <a href="{{route('index')}}#conocenos" class="nav-link text-white hover-link"  id="conocenos-link">Conócenos</a>
            </li>
            <li class="nav-item {{ Request::is('servicios') ? 'active2' : '' }}"><a href="{{route('services')}}" class="nav-link text-white hover-link">Servicios</a></li>
            <li class="nav-item {{ Request::is('investigacion') ? 'active2' : '' }}"><a href="{{route('investigation')}}" class="nav-link text-white hover-link">Investigación</a></li>
            <li class="nav-item {{ Request::is('posgrados') ? 'active2' : '' }}"><a href="{{route('postgraduate')}}" class="nav-link text-white hover-link">Posgrados</a></li>
            <li class="nav-item {{ Request::is('vinculacion') ? 'active2' : '' }}"><a href="{{route('vinculation')}}" class="nav-link text-white hover-link">Vinculación</a></li>
            <li class="nav-item {{ Request::is('#comunicacion') ? 'active2' : '' }}"><a href="#comunicacion" class="nav-link text-white hover-link">Comunicación Social</a></li>
        </ul>
    </div>
</div>