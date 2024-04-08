<div class="modal fade" id="editProgram{{$p->id_program}}" tabindex="-1" role="dialog" aria-labelledby="editProgramLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceLabel">Editar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="update_service" action="{{route('posgrados_update',$p->id_program)}}" method="POST" enctype="multipart/form-data" id="createEqipment">
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre del Programa*:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{$p->programa}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion del Programa*:</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                                {{$p->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tipo de programa:*</label>
                            <select name="type" id="type" class="form-control">
                                <option value="Licenciatura" {{ $p->type == "Licenciatura" ? 'selected' : '' }}>Licenciatura</option>
                                <option value="Maestría" {{ $p->type == "Maestría" ? 'selected' : '' }}>Maestría</option>
                                <option value="Doctorado" {{ $p->type == "Doctorado" ? 'selected' : '' }}>Doctorado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">URL de la convocatoria*:</label>
                            <input type="text" name="url" id="url" class="form-control" required value="{{$p->url}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Tecnologico que ofrece el programa*:</label>
                            <select name="tec" id="tec" class="select2 form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                                @foreach($tecnologico as $t)
                                <option value="{{$t->id}}" @if($t->id == $p->id_tecnologico) selected @endif>{{$t->name}}</option>
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