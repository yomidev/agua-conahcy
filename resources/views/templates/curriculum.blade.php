    <div class="modal fade" id="dataR{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="dataRLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ViewRLabel">Currículum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="clearfix">
                            <img src="https://images.pexels.com/photos/5726706/pexels-photo-5726706.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=" class="col-md-6 float-md-end mb-3 ms-md-3 d-block" style="max-width:250px"alt="...">
                            <h3 class="text-center fw-bold">{{$i->nombre}}</h3>
                            <p><span class="fw-bold">Grado Académico:</span> {{$i->grade}}</p>
                            <p><span class="fw-bold">Especialidad:</span> {{$i->specialization}}</p>
                            <p><span class="fw-bold">Institución asociada de adscripción:</span> {{$i->tecnologico}}</p>
                            <p><span class="fw-bold">Líneas de investigación y/o incidencia de proyectos emblema:</span> <br>
                                {!!$i->investigation!!}
                            </p>
                            <p class="fw-bold">Currículum:</p>
                            <p>
                                {!!$i->cv!!}
                            </p>


                        </div>

                    </div>
                </div>    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                       Cerrar</button>
                </div>
            </div>
        </div>
    </div>