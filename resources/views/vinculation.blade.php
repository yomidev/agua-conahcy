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
    <div id="banner" style="background-image:url({{asset('pictures/line.png')}})">
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
        <img src="{{asset('pictures/banner-1.png')}}" class="img-fluid " alt="..." data-aos="fade-right" data-aos-duration="3000">
    </div>
    <div class="container">
        <h1 class="title-red text-uppercase">Vinculación</h1>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color:#344474; color:#fff">
                        Instituciones Nacionales:
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($institucion as $i)
                                <div class="col-lg-4">
                                    <div class="card mb-3 text-center" style="max-width: 540px; box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
                                        <div class="row g-0">
                                            <div class="col-md-4 p-2">
                                                <img src="{{asset('pictures/admin/institucion/'.$i->logo)}}" class="rounded" alt="..." width="150" height="150">
                                            </div>
                                            <div class="col-md-8 p-2">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{$i->name}}</h6>
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
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color:#344474; color:#fff">
                  Dependencias Nacionales
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach ($dependencia as $d)
                            <div class="col-lg-4">
                                <div class="card mb-3 text-center" style="max-width: 540px; box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
                                    <div class="row g-0 d-flex align-items-center">
                                        <div class="col-md-4 p-2">
                                            <img src="{{asset('pictures/admin/dependencia/'.$d->logo)}}" class="rounded mx-auto d-block" alt="..." width="100">
                                        </div>
                                        <div class="col-md-8 p-2">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$d->name}}</h6>
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
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" style="background-color:#344474; color:#fff">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color:#344474; color:#fff">
                  Instituciones Internacionales
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach ($internacional as $i)
                            <div class="col-lg-4">
                                <div class="card mb-3 text-center" style="max-width: 540px; box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
                                    <div class="row g-0">
                                        <div class="col-md-4 p-2">
                                            <img src="{{asset('pictures/admin/internacional/'.$i->logo)}}" class="rounded" alt="..." width="130" height="130">
                                        </div>
                                        <div class="col-md-8 p-2">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$i->name}}</h6>
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
    </div>
</main>
@include('templates.partials.contact')
<footer class="footer-gob">
    @include('templates.partials.footer')
    <div class="img-footer"></div>
</footer>
