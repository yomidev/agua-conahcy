<div class="modal fade" id="editTec{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="editTecLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTecLabel">Editar Tecnológico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="update_tec" action="{{route('schools_update',$t->id)}}" method="POST" enctype="multipart/form-data" id="createTec">
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre*:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{$t->name}}">
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