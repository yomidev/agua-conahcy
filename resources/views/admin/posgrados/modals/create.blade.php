<!-- Modal Create Infraestructura-->
<div class="modal fade" id="addPosgrado" tabindex="-1" role="dialog" aria-labelledby="addPosgradoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPosgradoLabel">Agregar Nuevo Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="create_posgrado" action="{{route('posgrados_create')}}" method="POST" enctype="multipart/form-data" id="createService">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre del Programa*:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion del Programa*:</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tipo de programa:*</label>
                            <select name="type" id="type" class="form-control">
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">URL de la convocatoria*:</label>
                            <input type="text" name="url" id="url" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Tecnologico que ofrece el programa*:</label>
                            <select name="tec" id="tec" class="select2 form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                                @foreach($tecnologico as $t)
                                <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar</button>
                        <button type="submit" class="btn btn-success" id="formSubmit">
                            <i class="fa fa-save" aria-hidden="true"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>