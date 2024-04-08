<div class="modal fade" id="editR{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="editRLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRLabel">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_inv" action="{{route('dependencias_update',$d->id)}}" method="POST" enctype="multipart/form-data" id="createInv">
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre*:</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{$d->name}}">
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
