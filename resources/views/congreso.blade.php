@extends('templates.master')
<header>
    @include('templates.partials.menu-gob')
</header>
<nav id="logos">
    <div class="container-fluid d-flex justify-content-between align-items-center pt-2 logos-congreso">
        <img src="{{asset('pictures/gob-2.png')}}" alt="" class="img-fluid" style="max-width: 125px">
        <img src="{{asset('pictures/sep-2.png')}}" alt=""  class="img-fluid" style="max-width: 200px">
        <img src="{{asset('pictures/2.png')}}" alt="" class="img-fluid" style="max-width: 300px">
        <img src="{{asset('pictures/3.png')}}" alt="" class="img-fluid" style="max-width: 200px">
        <img src="{{asset('pictures/logo-tecnm.png')}}" alt="img-fluid" style="max-width: 100px">
        <img src="{{asset('pictures/5.png')}}" alt="img-fluid" style="max-width: 150px">
    </div>
    <div class="container-fluid cintillo">
        <img src="{{asset('pictures/cintillo.jpg')}}" alt="" class="img-fluid">
    </div>
</nav>
<nav id="enlaces" class="navbar navbar-expand-lg bg-body-tertiary navbar-dark" style="background-color:#344474 !important">
    @include('templates.partials.menu-links')
</nav>
<main>
    <div>
        <img src="{{asset('pictures/banner-congreso.png')}}" alt="" class="img-fluid">
    </div>
    <div id="information-congreso" class="container-fluid d-flex justify-content-between align-items-center p-5 flex-wrap" style="background-color:#344474 !important">
        <h3 class="text-center text-white" style="letter-spacing:2px"><span class="text-uppercase mb-3" style="font-weight:900 !important; display:inline-block">Fecha</span><br>25 y 26 de <br>Septiembre de 2025</h3>
        <h3 class="text-center text-white" style="letter-spacing:2px"><span class="text-uppercase mb-3" style="font-weight:900 !important; display:inline-block">Sede</span> <br>Instituto Tecnológico <br>de Tijuana</h3>
        <h3 class="text-center text-white" style="letter-spacing:2px"><span class="text-uppercase mb-3" style="font-weight:900 !important; display:inline-block">Modalidad </span><br>Híbrida</h3>
    </div>
    <!--contador-->
    <div class="container d-flex justify-content-between countdown-box p-3" style="gap:10px">
        <div class="countdown-item">
            <span id="days" class="countdown-number">00</span>
            <span class="countdown-text">Días</span>
        </div>
        <div class="countdown-item">
            <span id="hours" class="countdown-number">00</span>
            <span class="countdown-text">Horas</span>
        </div>
        <div class="countdown-item">
            <span id="minutes" class="countdown-number">00</span>
            <span class="countdown-text">Minutos</span>
        </div>
        <div class="countdown-item">
            <span id="seconds" class="countdown-number">00</span>
            <span class="countdown-text">Segundos</span>
        </div>
    </div>
    <div class="slider mt-4 align-items-center" style="height: 200px !important">
        <div class="slider-track" style="height: 200px !important">
            @foreach($images as $img)
                <div class="slide text-center align-items-center" style="height: 200px !important">
                    <img src="{{asset($img['src'])}}" alt="logo"class="w-75">
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-2">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner carousel-inner-3"></div>

                    <!-- Controles del Carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="title">Objetivo</h4>
                <p style="text-align: justify;" class="padding-responsive fs-5">
                    Generar espacios de diálogo, análisis, intercambio y formación, entre diversos agentes de la sociedad sobre las
                    <b>contribuciones de la investigación</b> en temas relacionados con el cuidado del agua, los métodos de tratamiento de agua potable y residual, así como las posibles alternativas para la recuperación y reúso del vital líquido. Además de la implementación de tecnologías emergentes en el tratamiento y monitoreo de la calidad del agua.
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <h4 class="title text-center">Áreas Temáticas</h4>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <div class="topic-card" data-id="1">
                <img src="{{asset('pictures/captacion.png')}}" alt="" class="img-fluid">
                Captación de agua
            </div>
            <div class="topic-card" data-id="2">
                <img src="{{asset('pictures/cuidado.png')}}" alt="" class="img-fluid">
                Cuidado del agua
            </div>
            <div class="topic-card" data-id="3">
                <img src="{{asset('pictures/potable.png')}}" alt="" class="img-fluid">
                Métodos de tratamiento de agua potable
            </div>
            <div class="topic-card" data-id="4">
                <img src="{{asset('pictures/residual.png')}}" alt="" class="img-fluid">
                Métodos de tratamiento de aguas residuales
            </div>
            <div class="topic-card" data-id="5">
                <img src="{{asset('pictures/reuso.png')}}" alt="" class="img-fluid">
                Recuperación y reúso del agua
            </div>
            <div class="topic-card" data-id="6">
                <img src="{{asset('pictures/calidad.png')}}" alt="" class="img-fluid">
                Monitoreo de la calidad del agua
            </div>
            <div class="topic-card" data-id="7">
                <img src="{{asset('pictures/tecnologias.png')}}" alt="" class="img-fluid">
                Tecnologías emergentes en materia de agua
            </div>
            <div class="topic-card" data-id="8">
                <img src="{{asset('pictures/desarrollo.png')}}" alt="" class="img-fluid">
                Desarrollo de plataformas tecnológicas para la gestión integral del agua
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h4 class="title text-center">Envío de Trabajos</h4>
        <div class="row align-items-center mt-3">
            <div class="col-md-6">
                <ol class="padding-responsive-ol fs-5" style="text-align: justify;">
                    <li>Descargar el formato para envío de trabajos, ingresando en la siguiente liga o escaneando el código QR <a href="https://bit.ly/congreso_agualys" target="_blank" class="fw-bold">https://bit.ly/congreso_agualys</a></li>
                    <li>Enviar el trabajo al correo: <b>agenda_agua@aguascalientes.tecnm.mx</b></li>
                    <li>La fecha límite para recepción de trabajos es el <b>30 de Mayo de 2025</b></li>
                    <li>La notificación de trabajos aceptados se realizará vía correo electrónico a partir del <b>20 de junio de 2025</b></li>
                    <li>Si el trabajo es aceptado, deberá de registrarse en la página del congreso <a href="{{ route('registro') }}" target="_blank" class="fw-bold">https://lanalimsa.aguascalientes.tecnm.mx/congreso/registro</a> del <b>20 de junio al 31 de julio de 2025</b>.</li>
                </ol>
            </div>
            <div class="col-md-6 text-center">
                <a href="{{ route('registro') }}" class="btn btn-primary fw-bold" target="_blank" style="background-color:#344474 !important; border:none; font-size: 40px; width: 80%; height: 80px; border-radius: 25px">REGISTRO</a><br>
                <br><h2>Registro para Directivos</h2>
                <a href="{{ route('registro.directivos') }}" class="btn btn-primary fw-bold" target="_blank" style="background-color:#344474 !important; border:none; font-size: 40px; width: 80%; height: 80px; border-radius: 25px">CLICK AQUI</a><br>
                <!--<img src="{{asset('pictures/qrcode_3Lx2eXTadT.png')}}" alt="" class="img-fluid w-50"><br>
                <a href="https://bit.ly/congreso_agualys" class="btn btn-primary fw-bold" target="_blank" style="background-color:#344474 !important; border:none">Descargar plantilla</a>-->
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner carousel-inner-2">
                <!-- Las imágenes se insertarán aquí dinámicamente -->
            </div>
            <!-- Botones de navegación -->
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <div class="container mt-4">
        <h4 class="title text-center">Plenarias</h4>
        <div class="d-flex flex-wrap justify-content-center" style="gap:10px">
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/brar.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <!--<p>Título de la plenaria</p>-->
                    <p class="fw-bold">Dr. Satinder <br>Kaur Brar
                        <br><img src="{{asset('pictures/canada.png')}}" alt="Canadá" class="img-fluid" style="max-width: 50px">
                    </p>
                    <a class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal" data-researcher="satinder_kaur_brar">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/eva.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <p class="fw-bold">Dra. Eva Rose <br>Kozak
                        <br><img src="{{asset('pictures/bandera.png')}}" alt="México" class="img-fluid" style="max-width: 50px">
                    </p>
                    <a class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-researcher="eva_rose_kozak">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/natalie.png')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <p class="fw-bold">Dra. Natalie <br>Mladenov
                        <br><img src="{{asset('pictures/estados-unidos-de-america.png')}}" alt="Estados Unidos" class="img-fluid" style="max-width: 50px">
                    </p>
                    <a class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal3">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/amy.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <p class="fw-bold">Prof. Amy M. <br>Bilton
                        <br><img src="{{asset('pictures/canada.png')}}" alt="Canadá" class="img-fluid" style="max-width: 50px">
                    </p>
                    <a class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal4">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/rachelgomes.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <p class="fw-bold">Prof. Rachel Louise Gomes
                        <br><img src="{{asset('pictures/reino-unido.png')}}" alt="Inglaterra" class="img-fluid" style="max-width: 50px">
                    </p>
                    <a class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal5">Curriculum Vitae</a>
                </div>
            </div>
        </div>
    </div>
    @include('templates.congreso._modal')
    @include('templates.congreso._modal2')
    @include('templates.congreso._modal3')
    @include('templates.congreso._modal4')
    @include('templates.congreso._modal5')
    @include('templates.congreso._modalarea')


</main>


@include('templates.partials.contact')

<footer class="footer-gob">
    @include('templates.partials.footer')
    <div class="img-footer"></div>
</footer>

