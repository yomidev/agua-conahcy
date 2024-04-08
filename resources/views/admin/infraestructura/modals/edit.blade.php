<div class="modal fade" id="editEquipment{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="editEquipmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEquipmentLabel">Editar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="update_equipment" action="{{route('equipment_update',$e->id)}}" method="POST" enctype="multipart/form-data" id="createEqipment">
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre del Equipo*:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{$e->nombre_equipo}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Ubicación del equipo (institución en la que se encuentra físicamente)*:</label>
                            <select name="tec" id="tec" class="select2 form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                                @foreach($tecnologico as $t)
                                <option value="{{$t->id}}" @if($t->id == $e->id_tecnologico) selected @endif>{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name">Imagen:</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                       Cancelar</button>
                     <button type="submit" class="btn btn-success" id="formSubmit">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar Cambios
                     </button>
                </div>
                </form>
            </div>
        </div>
    </div>