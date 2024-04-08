<!-- Modal Create Infraestructura-->
<div class="modal fade" id="addR" tabindex="-1" role="dialog" aria-labelledby="addRLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRLabel">Agregar Nuevo Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="create_inv" action="{{route('investigadores_create')}}" method="POST" enctype="multipart/form-data" id="createInv">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre*:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Grado Académico*:</label>
                            <input type="text" name="grade" id="grade" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Especialidad*:</label>
                            <input type="text" name="especialidad" id="especialidad" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Institución*:</label>
                            <select name="tec" id="tec" class="select2 form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                                @foreach($tecnologico as $t)
                                <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Líneas de investigación*:</label>
                            <textarea name="investigacion" id="investigacion" cols="30" rows="10" required class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">CV resumido:</label>
                            <textarea name="cv" id="cv" cols="30" rows="30" class="form-control"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Imagen*:</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
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