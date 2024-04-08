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
        <h1 class="title-red text-uppercase">Oferta Educativa</h1>
        <div class="accordion" id="accordionProgram">
            @foreach($tecnologico as $t)
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                    <button class="accordion-button" style="background-color:#344474; color:#fff" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$t->id}}" aria-controls="collapse{{$t->id}}" aria-expanded="false">
                        {{$t->name}}
                    </button>
                </h2>
                <div id="collapse{{$t->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionProgram">
                    <div class="accordion-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample{{$t->id}}">
                            @foreach($program as $p)
                                @if($p->id_tecnologico == $t->id)
                                    <div class="accordion-item mb-2">
                                        <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                                            <button class="accordion-button collapsed" style="background-color:#344474; color:#fff" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$p->id_program}}" aria-expanded="false" aria-controls="flush-collapse{{$p->id_program}}">
                                                {{$p->programa}}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{$p->id_program}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample{{$t->id}}">
                                            <div class="accordion-body">
                                                @if($p->description)
                                                    <p class="fw-bold">Descripción:</p>
                                                    <p>{!!$p->description!!}</p>
                                                @endif
                                                <p class="fw-bold">Tipo de Programa: <span style="font-weight:400">{{$p->type}}</span></p>
                                                <p class="fw-bold">Convocatoria:</p>
                                                <a href="{{$p->url}}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-convocatoria">Visitar</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
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

