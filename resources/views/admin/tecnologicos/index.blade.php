@extends('adminlte::page')
 
@section('title', 'Tecnológicos')
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)
 
@section('content_header')
    <h1 class="m-0 text-dark fw-bolder">Tecnológicos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addTec">
            <i class="fas fa-plus"></i> Nuevo Tecnológico
        </button>
    </div>
    <div class="card-body">
        <div class="container-fluid table-responsive">
        <table class="table table-striped" id="tec">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tecnologico as $t)
                <tr>
                    <td class="text-center">{{$t->id}}</td>
                    <td class="text-center">{{$t->name}}</td>
                    <td class="text-center">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editTec{{$t->id}}">
                            <i class="fa fa-pen" aria-hidden="true"></i> Editar
                        </button>
                        <button class="btn btn-danger destroy" data-toggle="modal" data-target="#deleteTec{{$t->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i> Eliminar
                        </button>
                    </td>
                </tr>
                @include('admin.tecnologicos.modals.edit')
                @include('admin.tecnologicos.modals.delete')
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@include('admin.tecnologicos.modals.create')
@stop

@section('js')
<script>
    $(document).ready( function () {
        $('#tec').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json',
            },
            responsive: true,
        });


        $('.create_tec').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            type: 'success',
                            title: '¡Registro creado!',
                            text: 'El registro creado correctamente.',
                        }).then(function() {
                            window.location.href = "{{ route('schools') }}";
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


        $('.update_tec').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            type: 'success',
                            title: '¡Registro Actualizado!',
                            text: 'El registro se ha actualizado correctamente.',
                        }).then(function() {
                            window.location.href = "{{ route('schools') }}";
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
                        window.location.href = "{{ route('schools') }}";
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