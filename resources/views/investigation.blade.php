@extends('templates.master')
<header>
    @include('templates.partials.menu-gob')
</header>
<nav id="logos">
    @include('templates.partials.menu-logos')
</nav>
<nav id="enlaces" class="navbar navbar-expand-lg bg-body-tertiary navbar-dark"
    style="background-color:#344474 !important">
    @include('templates.partials.menu-links')
</nav>
<main>
    <div class="container-fluid">
        <div class="row justify-content-around align-items-center">
            <div class="col-4">
                <img src="{{asset('pictures/logo-lab.png')}}" alt="" srcset="" class="img-fluid">
            </div>
            <!--<div class="col-4">
                <img src="{{asset('pictures/logo-conahcyt.png')}}" alt="" srcset="" class="img-fluid">
            </div>-->
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <h1 class="title-red text-uppercase">Investigación</h1>
        <br>
        <div class="accordion" id="accordionProgram">
            @foreach($tecnologico as $t)
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                    <button class="accordion-button" style="background-color:#344474; color:#fff" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse{{$t->id}}"
                        aria-controls="collapse{{$t->id}}" aria-expanded="false">
                        {{$t->name}}
                    </button>
                </h2>
                <div id="collapse{{$t->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionProgram">
                    <div class="accordion-body">
                        <ul class="nav nav-tabs nav-fill mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active fw-bold" id="ex2-tab-investigadores-{{$t->id}}"
                                    data-bs-toggle="tab" href="#ex2-tabs-investigadores-{{$t->id}}" role="tab"
                                    aria-controls="ex2-tabs-investigadores-{{$t->id}}" aria-selected="true">
                                    Investigadores
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link fw-bold" id="ex2-tab-lineas-{{$t->id}}" data-bs-toggle="tab"
                                    href="#ex2-tabs-lineas-{{$t->id}}" role="tab"
                                    aria-controls="ex2-tabs-lineas-{{$t->id}}" aria-selected="false">
                                    Líneas de Investigación
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link fw-bold" id="ex2-tab-articulos-{{$t->id}}" data-bs-toggle="tab"
                                    href="#ex2-tabs-articulos-{{$t->id}}" role="tab"
                                    aria-controls="ex2-tabs-articulos-{{$t->id}}" aria-selected="false">
                                    Artículos
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link fw-bold" id="ex2-tab-proyectos-{{$t->id}}" data-bs-toggle="tab"
                                    href="#ex2-tabs-proyectos-{{$t->id}}" role="tab"
                                    aria-controls="ex2-tabs-proyectos-{{$t->id}}" aria-selected="false">
                                    Proyectos
                                </a>
                            </li>
                        </ul>
                        <!--Tabs-->
                        <div class="tab-content container" id="ex2-content">
                            <div class="tab-pane fade show active" id="ex2-tabs-investigadores-{{$t->id}}"
                                role="tabpanel" aria-labelledby="ex2-tab-investigadores-{{$t->id}}">
                                <div class="container-fluid">
                                    <div class="row">
                                        @foreach($investigadores as $i)
                                        @if($i->id_tecnologico == $t->id)
                                        <div class="col-lg-4">
                                            <div class="card mb-3"
                                                style="max-width: 540px; box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
                                                <div class="row g-0">
                                                    <div class="col-md-4 p-2">
                                                        <img src="https://images.pexels.com/photos/5726706/pexels-photo-5726706.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                                            class="img-fluid rounded" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{$i->nombre}}</h5>
                                                            <p class="card-text"><span class="fw-bold">Grado
                                                                    Académico:</span> {{$i->grade}}</p>
                                                            <p class="card-text"><span class="fw-bold">Institución
                                                                    asociada:</span> {{$i->tecnologico}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-convocatoria text-white w-100"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#dataR{{$i->id}}">Currículum</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('templates.curriculum')
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--Tab 2-->
                            <div class="tab-pane fade" id="ex2-tabs-lineas-{{$t->id}}" role="tabpanel"
                                aria-labelledby="ex2-tab-lineas-{{$t->id}}">
                                <div class="container-fluid d-flex justify-content-center">
                                    <ul class="list-group text-white list-group-inv">
                                        @foreach($research as $r)
                                        @if($r->id_tecnologico == $t->id)
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center text-center">
                                            <div class="d-flex flex-row">
                                                <img src="https://img.icons8.com/color/100/000000/folder-invoices.png"
                                                    width="40" class="img-l" />
                                                <div>
                                                    <h6 class="text-white text-center p-2">{{$r->title}}</h6>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--Tab 3-->
                            <div class="tab-pane fade" id="ex2-tabs-articulos-{{$t->id}}" role="tabpanel"
                                aria-labelledby="ex2-tab-articulos-{{$t->id}}">
                                <div class="container-fluid">
                                    @foreach($articlesGroupedByYear as $year => $articles)
                                    <div class="accordion mb-3" id="accordion-{{ $year }}-{{$t->id}}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header text-white" id="heading-{{ $year }}-{{$t->id}}"
                                                style="background-color:#344474 !important">
                                                <button class="accordion-button text-white" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ $year }}-{{$t->id}}"
                                                    aria-expanded="true" aria-controls="collapse-{{ $year }}-{{$t->id}}"
                                                    style="background-color:#344474 !important">
                                                    {{ $year }}
                                                </button>
                                            </h2>
                                            <div id="collapse-{{ $year }}-{{$t->id}}"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="heading-{{ $year }}-{{$t->id}}"
                                                data-bs-parent="#accordion-{{ $year }}-{{$t->id}}">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        @php
                                                        $service_exist = false;
                                                        @endphp
                                                        @foreach($article as $a)
                                                        @if($a->id_tecnologico == $t->id)
                                                        @if(date('Y', strtotime($a->date)) == $year)
                                                        @php
                                                        $service_exist = true;
                                                        @endphp
                                                        <div class="col-lg-8" style="margin: 0 auto">
                                                            <div class="card mb-3 w-100"
                                                                style=" box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
                                                                <a href="{{ $a->link }}" target="_blank"
                                                                    style="text-decoration:none;cursor:pointer;color:inherit">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title fw-bold">{{ $a->name }}
                                                                        </h5>
                                                                        <p class="card-subtitle mb-2 fw-bold"
                                                                            style="color: #9a2d4e">{{ $a->type }}</p>
                                                                        <p><em
                                                                                class="font-size: 1px !important">{!!$a->cita!!}</em>
                                                                        </p>
                                                                    </div>
                                                                    <div class="p-2 text-end">
                                                                        @if($a->link != null)
                                                                        <a href="{{ $a->link }}" target="_blank"
                                                                            class="btn btn-convocatoria text-white">Ir</a>
                                                                        @endif
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        @if($service_exist == false)
                                                        <p class="fw-bold">No hay artículos disponibles.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--Tab 4-->
                            <div class="tab-pane fade" id="ex2-tabs-proyectos-{{$t->id}}" role="tabpanel"
                                aria-labelledby="ex2-tab-proyectos-{{$t->id}}">
                                <div class="container-fluid">
                                    @foreach($projectsGroupedByYear as $year => $projects)
                                    <div class="accordion mb-3" id="accordionproject-{{ $year }}-{{$t->id}}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header text-white"
                                                id="headingproject-{{ $year }}-{{$t->id}}"
                                                style="background-color:#344474 !important">
                                                <button class="accordion-button text-white" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseproject-{{ $year }}-{{$t->id}}"
                                                    aria-expanded="true"
                                                    aria-controls="collapseproject-{{ $year }}-{{$t->id}}"
                                                    style="background-color:#344474 !important">
                                                    {{ $year }}
                                                </button>
                                            </h2>
                                            <div id="collapseproject-{{ $year }}-{{$t->id}}"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="headingproject-{{ $year }}-{{$t->id}}"
                                                data-bs-parent="#accordionproject-{{ $year }}-{{$t->id}}">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        @php
                                                        $service_exist = false;
                                                        @endphp
                                                        @foreach($project as $p)
                                                        @if($p->id_tecnologico == $t->id)
                                                        @if(date('Y', strtotime($p->vigencia)) == $year)
                                                        @php
                                                        $service_exist = true;
                                                        @endphp
                                                        <div class="col-lg-8" style="margin: 0 auto">
                                                            <div class="card mb-3 w-100"
                                                                style=" box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
                                                                <div class="card-body">
                                                                    <h5 class="card-title fw-bold">{{ $p->name }}</h5>
                                                                    <p class="card-subtitle mb-2 fw-bold"
                                                                        style="color: #9a2d4e">{{ $p->tecnologico }}</p>
                                                                    <p><span class="fw-bold">Responsables:
                                                                        </span>{!!$p->responsables!!}</p>
                                                                    <p><span class="fw-bold">Fuente de Financiamiento:
                                                                        </span>{{$p->financiamiento}}</p>
                                                                    <p><span class="fw-bold">Vigencia:
                                                                        </span>{{$p->vigencia}}</p>
                                                                </div>
                                                                <div class="p-2 text-end">
                                                                    @if($p->link != null)
                                                                    <a href="{{ $p->link }}" target="_blank"
                                                                        class="btn btn-convocatoria text-white">Ir</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        @if($service_exist == false)
                                                        <p class="fw-bold">No hay proyectos disponibles.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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