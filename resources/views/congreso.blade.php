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
    <div>
        <img src="{{asset('pictures/banner-congreso.png')}}" alt="" class="img-fluid">
    </div>
    <div class="container-fluid d-flex justify-content-between align-items-center p-5 flex-wrap" style="background-color:#344474 !important">
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
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="{{ asset('pictures/banner-1.png') }}" alt="Banner" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h4 class="title">Objetivo</h4>
                <p style="text-align: justify;">
                    Generar espacios de diálogo, análisis, intercambio y formación, entre diversos agentes de la sociedad sobre las
                    <b>contribuciones de la investigación</b> en temas relacionados con el cuidado del agua, los métodos de tratamiento de agua potable y residual, así como las posibles alternativas para la recuperación y reúso del vital líquido. Además de la implementación de tecnologías emergentes en el tratamiento y monitoreo de la calidad del agua.
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <h4 class="title text-center">Áreas Tématicas</h4>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <div class="topic-card">
                <img src="{{asset('pictures/captacion.png')}}" alt="" class="img-fluid">
                Captación de agua
            </div>
            <div class="topic-card">
                <img src="{{asset('pictures/cuidado.png')}}" alt="" class="img-fluid">
                Cuidado del agua
            </div>
            <div class="topic-card">
                <img src="{{asset('pictures/potable.png')}}" alt="" class="img-fluid">
                Métodos de tratamiento de agua potable
            </div>
            <div class="topic-card">
                <img src="{{asset('pictures/residual.png')}}" alt="" class="img-fluid">
                Métodos de tratamiento de aguas residuales
            </div>
            <div class="topic-card">
                <img src="{{asset('pictures/reuso.png')}}" alt="" class="img-fluid">
                Recuperación y reúso del agua
            </div>
            <div class="topic-card">
                <img src="{{asset('pictures/calidad.png')}}" alt="" class="img-fluid">
                Monitoreo de la calidad del agua
            </div>
            <div class="topic-card">
                <img src="{{asset('pictures/tecnologias.png')}}" alt="" class="img-fluid">
                Tecnologías emergentes en materia de agua
            </div>
            <div class="topic-card">
                <img src="{{asset('pictures/desarrollo.png')}}" alt="" class="img-fluid">
                Desarrollo de plataformas tecnológicas para la gestión integral del agua
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h4 class="title text-center">Envío de Trabajos</h4>
        <div class="row align-items-center mt-3">
            <div class="col-md-6">
                <ol class="list-group" style="text-align: justify;">
                    <li>Descargar el formato para envío de trabajos, ingresando en la siguiente liga o escaneando el código QR <a href="https://bit.ly/congreso_agualys" target="_blank" class="fw-bold">https://bit.ly/congreso_agualys</a></li>
                    <li>Enviar el trabajo al correo: agenda_agua@aguascalientes.tecnm.mx</li>
                    <li>La fecha límite para recepción de trabajos es el <b>30 de abril de 2025</b></li>
                    <li>La notificación de trabajos aceptados se realizará vía correo electrónico a partir del <b>20 de junio de 2025</b></li>
                    <li>Si el trabajo es aceptado, deberá de registrarse en la página del congreso <a href="https://lanalimsa.aguascalientes.tecnm.mx/" target="_blank" class="fw-bold">https://lanalimsa.aguascalientes.tecnm.mx/</a> del <b>20 de junio al 31 de julio de 2025</b>.</li>
                </ol>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('pictures/qrcode_3Lx2eXTadT.png')}}" alt="" class="img-fluid w-50"><br>
                <a href="https://bit.ly/congreso_agualys" class="btn btn-primary fw-bold" target="_blank" style="background-color:#344474 !important; border:none">Descargar plantilla</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <h4 class="title text-center">Plenarias</h4>
        <div class="d-flex flex-wrap justify-content-center" style="gap:10px">
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/e52a97681aa1d2077e6afc4e53667ae6.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <!--<p>Título de la plenaria</p>
                    <p>Nombre del ponenente.</p>--> <a href="#" class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/c1946580d9755f4da4d2c3e1dc5e8148.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <!--<h5 class="card-title
                    ">Título de la plenaria</h5>
                    <p class="card-text">Nombre del ponenente.</p>--> <a href="#" class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/e52a97681aa1d2077e6afc4e53667ae6.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <!--<h5 class="card-title
                    ">Título de la plenaria</h5>
                    <p class="card-text">Nombre del ponenente.</p>--> <a href="#" class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/c1946580d9755f4da4d2c3e1dc5e8148.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <!--<h5 class="card-title
                    ">Título de la plenaria</h5>
                    <p class="card-text">Nombre del ponenente.</p>--> <a href="#" class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal">Curriculum Vitae</a>
                </div>
            </div>
            <div class="card plenary-card text-center">
                <img src="{{asset('pictures/e52a97681aa1d2077e6afc4e53667ae6.jpg')}}" alt="" class="img-fluid">
                <div class="card-body">
                    <!--<h5 class="card-title
                    ">Título de la plenaria</h5>
                    <p class="card-text">Nombre del ponenente.</p>--><a class="btn btn-primary" style="background-color:#344474 !important; border:none !important" data-bs-toggle="modal" data-bs-target="#exampleModal">Curriculum Vitae</a>
                </div>
            </div>
        </div>
    </div>
    @include('templates.congreso._modal')


</main>


@include('templates.partials.contact')

<footer class="footer-gob">
    @include('templates.partials.footer')
    <div class="img-footer"></div>
</footer>

