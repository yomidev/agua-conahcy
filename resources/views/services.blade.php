@extends('templates.master')
<header>
    @include('templates.partials.menu-gob')
</header>
<nav id="logos">
    @include('templates.partials.menu-logos')
</nav>
<nav id="enlaces" class="navbar navbar-expand-lg bg-body-tertiary navbar-dark" style="background-color:#344474 !important">
    @include('templates.partials.menu-links')
</nav>
<main>
    <div class="container-fluid">
        <div class="row justify-content-around align-items-center">
            <div class="col-4">
                <img src="{{asset('pictures/logo-lab.png')}}" alt="" srcset="" class="img-fluid">
            </div>
            <div class="col-4"> 
                <img src="{{asset('pictures/logo-conahcyt.png')}}" alt="" srcset="" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <h1 class="title-red text-uppercase">Servicios</h1>
        <div class="accordion" id="accordionService">
            @foreach($tecnologico as $t)
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                    <button class="accordion-button" style="background-color:#344474; color:#fff" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$t->id}}" aria-controls="collapse{{$t->id}}" aria-expanded="false">
                        {{$t->name}}
                    </button>
                </h2>
                <div id="collapse{{$t->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionService">
                    <div class="accordion-body">
                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs nav-fill mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active fw-bold" id="ex2-tab-services-{{$t->id}}" data-bs-toggle="tab" href="#ex2-tabs-services-{{$t->id}}" role="tab" aria-controls="ex2-tabs-services-{{$t->id}}" aria-selected="true">
                                    Servicios
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link fw-bold" id="ex2-tab-infrastructure-{{$t->id}}" data-bs-toggle="tab" href="#ex2-tabs-infrastructure-{{$t->id}}" role="tab" aria-controls="ex2-tabs-infrastructure-{{$t->id}}" aria-selected="false">
                                    Infraestructura y Equipo
                                </a>
                            </li>
                        </ul>
                        <!-- Tabs content -->
                        <div class="tab-content container" id="ex2-content">
                            <div class="tab-pane fade show active" id="ex2-tabs-services-{{$t->id}}" role="tabpanel" aria-labelledby="ex2-tab-services-{{$t->id}}">
                                <div class="accordion accordion-flush" id="accordionFlushExample{{$t->id}}">
                                    @php
                                        $service_exist = false;
                                    @endphp
                                    @foreach($service as $s)
                                    @if($s->id_tecnologico == $t->id)
                                    @php
                                        $service_exist = true;
                                    @endphp
                                    <div class="accordion-item mb-2">
                                        <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                                            <button class="accordion-button collapsed" style="background-color:#344474; color:#fff" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$s->id}}" aria-expanded="false" aria-controls="flush-collapse{{$s->id}}">
                                                {{$s->servicio}}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{$s->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample{{$t->id}}">
                                            <div class="accordion-body">
                                                <p class="fw-bold">Descripción:</p>
                                                <p>{!!$s->description!!}</p>
                                                <p class="fw-bold">Para solicitar una cotizacion de este servicio, favor de comunicarse al correo: 
                                                    <a href="mailto::{{$s->email_contact}}">{{$s->email_contact}}</a>
                                                </p>
                                            </div>
                                        </div>  
                                    </div>
                                    @endif
                                    @endforeach
                                    @if($service_exist == false)
                                        <p class="fw-bold">Por el momento no se ofrece ningún servicio en esta institución.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ex2-tabs-infrastructure-{{$t->id}}" role="tabpanel" aria-labelledby="ex2-tab-infrastructure-{{$t->id}}">
                                <div class="row">
                                    @foreach($equipment as $e)
                                    @if($e->id_tecnologico == $t->id)
                                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                        <div class="bg-white rounded shadow-sm h-100">
                                            <img src="{{asset('pictures/admin/infraestructura/'.$e->route)}}" alt="" class="img-fluid card-img-top">
                                            <div class="p-4">
                                                <p class="fw-bold text-center">{{$e->nombre_equipo}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@include('templates.partials.contact')
<footer class="footer-gob">
    @include('templates.partials.footer')
    <div class="img-footer"></div>
</footer>
</main>
