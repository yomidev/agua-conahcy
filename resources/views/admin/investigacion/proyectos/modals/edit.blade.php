<div class="modal fade" id="editR{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="editRLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRLabel">Editar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="update_inv" action="{{route('proyectos_update',$p->id)}}" method="POST" enctype="multipart/form-data" id="createInv">
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre*:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{$p->name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Responsables*:</label>
                            <textarea name="responsables" id="responsables" cols="30" rows="10" required class="form-control">
                                {{$p->responsables}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Institución*:</label>
                            <select name="tec" id="tec" class="select2 form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                            @foreach($tecnologico as $t)
                                <option value="{{$t->id}}" @if($t->id == $p->id_tecnologico) selected @endif>{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Fuente de Financiamiento*:</label>
                            <input type="text" name="financiamiento" id="Financiamiento" class="form-control" value="{{$p->financiamiento}}">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Vigencia*:</label>
                            <input type="date" id="vigencia" name="vigencia" class="form-control" required value="{{$p->vigencia}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Link:</label>
                            <input type="text" name="link" id="link" class="form-control" value="{{$p->link}}">
                        </div>
                        <br>
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