<div class="modal fade" id="editService{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="editServiceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceLabel">Editar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="update_service" action="{{route('services_update',$s->id)}}" method="POST" enctype="multipart/form-data" id="createEqipment">
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Servicio*:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{$s->servicio}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion del Servicio*:</label>
                            <textarea name="dedit" id="dedit" cols="30" rows="10" required class="form-control">{{$s->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Email para cotizacion*:</label>
                            <input type="email" name="email" id="email" class="form-control" required value="{{$s->email_contact}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Tecnologico que ofrece el servicio*:</label>
                            <select name="tec" id="tec" class="select2 form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                                @foreach($tecnologico as $t)
                                <option value="{{$t->id}}" @if($t->id == $s->id_tecnologico) selected @endif>{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>  
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