<div class="modal" tabindex="-1" role="dialog" id="deleteTec{{ $t->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Tecnológico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Esta seguro de eliminar este registro?</p>
        <p class="text-center">Esta opción no se puede deshacer</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a  class="btn btn-danger delete-confirm" href="{{ route('schools_delete', $t->id) }}">Eliminar</a>
      </div>
    </div>
  </div>
</div>