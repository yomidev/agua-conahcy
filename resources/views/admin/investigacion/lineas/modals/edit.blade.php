<div class="modal fade" id="editR{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="editRLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRLabel">Editar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="update_inv" action="{{route('investigacion_update',$r->id)}}" method="POST" enctype="multipart/form-data" id="createInv">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Titulo*:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{$r->title}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Institución*:</label>
                            <select name="tec" id="tec" class="select2 form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                                @foreach($tecnologico as $t)
                                <option value="{{$t->id}}" @if($t->id == $r->id_tecnologico) selected @endif>{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion:</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$r->description}}</textarea>
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