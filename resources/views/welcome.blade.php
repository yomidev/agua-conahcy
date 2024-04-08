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
    <div class="container" id="conocenos" data-aos="fade-up" data-aos-duration="3000">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-uppercase title">Bienvienidos</h1>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="w-100 mt-5" height="400" src="https://www.youtube.com/embed/IzDSa6KeyNY?si=nxPooSWb9k8Ek5T1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="subtitle lh-lg">Misión, Visión y Valores</h4>
                <p class="text-blue"><span class="fw-bold">Misión: </span>
                    Ofrecer servicios de excelencia de análisis de calidad de agua a todos los sectores
                    de la sociedad que así lo requieran y desarrollar proyectos de investigación interinstitucionales
                    que puedan incidir en la generación de conocimiento humanístico, científico y tecnológico,
                    alineados a los Programas Nacionales Estratégicos de Agua y  Agentes Tóxicos y Procesos
                    contaminantes y con ello, contribuir con el logro del sexto objetivo del desarrollo
                    sostenible de la agenda 2030 de la ONU (Garantizar la disponibilidad y la gestión sostenible
                    del agua y el saneamiento para todos).
                </p>
                <p class="text-blue"><span class="fw-bold">Visión: </span>
                    Ser un laboratorio líder a nivel nacional e internacional en el desarrollo de proyectos de
                    investigación interinstitucionales que promuevan el cuidado del agua, los métodos de
                    captación de agua de lluvia, el uso eficiente de los métodos de tratamiento de agua
                    potable y residual, y la recuperación y reúso del agua; elegido por nuestra innovación
                    en el uso de tecnologías emergentes y por brindar servicios de excelencia de calidad del
                    agua. Además de ser un laboratorio reconocido por la calidad humana, técnica y profesional
                    del personal y por la contribución a la sociedad.
                </p>
                <p class="text-blue"><span class="fw-bold">Valores: </span>
                    <ul class="text-blue d-flex justify-content-between align-items-center flex-wrap">
                        <li>Calidad</li>
                        <li>Integridad</li>
                        <li>Honestidad</li>
                        <li>Competitividad</li>
                        <li>Transparencia</li>
                        <li>Responsabilidad social</li>
                        <li>Trabajo en equipo</li>
                        <li>Resolución de problemas</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-3" data-aos="fade-up" data-aos-duration="3000">
        <h3 class="subtitle text-center">Instituciones Asociadas y Participantes</h3>
        <div>
            @include('templates.partials.mapa')
        </div>
    </div>
    <div class="slider">
        <div class="slider-track">
            <div class="slide text-center align-items-center">
                <img src="{{asset('pictures/logo_ITA.png')}}" alt="" class="w-75">
            </div>
            <div class="slide text-center">
                <img src="{{asset('pictures/logo-villahermosa.png')}}" alt="" class="h-75">
            </div>
            <div class="slide text-center">
                <img src="{{asset('pictures/logo-toluca.png')}}" alt="" class="h-75">
            </div>
           <div class="slide text-center">
                <img src="{{asset('pictures/logo-etla.png')}}" alt="" class="h-75">
            </div>
            <div class="slide text-center">
                <img src="{{asset('pictures/logo-rio.png')}}" alt="" class="h-75">
            </div>
            <div class="slide text-center">
                <img src="{{asset('pictures/logo_ITT.png')}}" alt="" class="h-75">
            </div>
            <div class="slide text-center">
                <img src="{{asset('pictures/logo-merida.png')}}" alt="" class="h-75">
            </div>
            <div class="slide text-center">
                <img src="{{asset('pictures/logo-cerro.png')}}" alt="" class="h-75">
            </div>
            <div class="slide text-center">
                <img src="{{asset('pictures/logo-juriquilla.png')}}" alt="" class="h-75">
            </div>
            <div class="slide text-center align-items-center">
                <img src="{{asset('pictures/inagua.png')}}" alt="" class="w-50">
            </div>
            <div class="slide text-center align-items-center">
                <img src="{{asset('pictures/logo-miaa.png')}}" alt="" class="w-50">
            </div>
            <div class="slide text-center align-items-center">
                <img src="{{asset('pictures/logo-fundicion.png')}}" alt="" class="w-50">
            </div>
        </div>
    </div>

    @include('templates.partials.contact')
    <footer class="footer-gob">
        @include('templates.partials.footer')
        <div class="img-footer"></div>
    </footer>
</main>
