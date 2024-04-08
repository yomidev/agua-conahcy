<div class="modal fade" id="ViewR{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewRLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewRLabel">Logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <img src="{{asset('pictures/admin/institucion/'.$i->logo)}}" alt="" class="img-fluid" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                   Cancelar</button>
            </div>
        </div>
    </div>
</div>
