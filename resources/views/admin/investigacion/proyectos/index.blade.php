@extends('adminlte::page')
 
@section('title', 'Proyectos')
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.Summernote', true)
 
@section('content_header')
    <h1 class="m-0 text-dark fw-bolder">Proyectos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addR">
            <i class="fas fa-plus"></i> Nuevo Registro
        </button>
    </div>
    <div class="card-body">
        <div class="container-fluid table-responsive">
        <table class="table table-striped" id="tecin">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Responsables</th>
                    <th>Tecnologico</th>
                    <th>Fuente de Financiamiento</th>
                    <th>Vigencia</th>
                    <th>Link</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project as $p)
                <tr>
                    <td class="text-center">{{$p->id}}</td>
                    <td class="text-center">{{$p->name}}</td>
                    <td>{!!$p->responsables!!}</td>
                    <td class="text-center">{{$p->tecnologico}}</td>
                    <td class="text-center">{{$p->financiamiento}}</td>
                    <td class="text-center">{{$p->vigencia}}</td>
                    <td>
                        @if($p->link != null)
                        <a class="btn btn-primary" href="{{$p->link}}" target="_blank">
                            <i class="fa fa-eye"></i>
                        </a>
                        @endif
                    </td>
                    <td class="text-center">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editR{{$p->id}}">
                            <i class="fa fa-pen" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger destroy" data-toggle="modal" data-target="#deleteR{{$p->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                @include('admin.investigacion.proyectos.modals.edit')
                @include('admin.investigacion.proyectos.modals.delete')
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@include('admin.investigacion.proyectos.modals.create')
@stop

@section('js')
<script>
    $(document).ready(function() {
        //$('#d').summernote();
        //$('#dedit').summernote();
        $('textarea').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
    $(document).ready( function () {
        $('#tecin').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json',
            },
            responsive: true,
        });


        $('.create_inv').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,  // Evitar que jQuery procese los datos o convierta el objeto FormData en una cadena
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            type: 'success',
                            title: '¡Registro creado!',
                            text: 'El registro creado correctamente.',
                        }).then(function() {
                            window.location.href = "{{ route('proyectos') }}";
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '¡Error!',
                            text: 'Hubo un problema al crear el registro.',
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Hubo un problema al enviar la solicitud al servidor.',
                    });
                }
            });
        });


        $('.update_inv').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,  // Evitar que jQuery procese los datos o convierta el objeto FormData en una cadena
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            type: 'success',
                            title: '¡Registro Actualizado!',
                            text: 'El registro se ha actualizado correctamente.',
                        }).then(function() {
                            window.location.href = "{{ route('proyectos') }}";
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: '¡Error!',
                            text: 'Hubo un problema al actualizar el registro.',
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Hubo un problema al enviar la solicitud al servidor.',
                    });
                }
            });
        });

        $('.delete-confirm').click(function (event) {
            event.preventDefault();
            var url = $(this).attr('href'); // Obtener la URL de eliminación del atributo href
            var modalId = $(this).attr('data-target'); // Obtener el ID del modal asociado al enlace
            $.ajax({
                url: url,
                type: 'GET',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // Incluir el token CSRF
                success: function(response) {
                if (response.success) {
                    // Mostrar Sweet Alert indicando que el registro ha sido eliminado
                    Swal.fire({
                        title: '¡Registro Eliminado!',
                        text: 'El registro ha sido eliminado exitosamente.',
                        type: 'success'
                    }).then(function(){
                        window.location.href = "{{ route('proyectos') }}";
                    });
                } else {
                    // Mostrar Sweet Alert indicando que ha habido un error al eliminar el registro
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al eliminar el registro.',
                        type: 'error'
                    });
                }
            },
            error: function() {
                // Mostrar Sweet Alert indicando que ha habido un error al enviar la solicitud al servidor
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al enviar la solicitud al servidor.',
                    type: 'error'
                });
            }
        });
        });
});
</script>
@endsection