<div class="modal fade" id="edit{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewRLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewRLabel">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_inv" action="{{route('registro_directivos_update',$r->id)}}" method="POST" enctype="multipart/form-data" id="createInv">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="alert alert-danger" style="display:none"></div>
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="form-step container active" id="step-1">
                        <h4 class="font-weight-bold">1. Información Personal</h4>
                        <div class="row">
                            <div class="col-12 col-md-6 mt-3">
                                <label for="name" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Ej. Juan Carlos" value="{{$r->name}}">
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <label for="lastname" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required placeholder="Ej. Pérez López" value="{{ $r->lastname }}">
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <label for="nacionality" class="form-label">Nacionalidad</label>
                                <input type="text" class="form-control" id="nacionality" name="nacionality" required placeholder="Ej. Mexicana" value="{{ $r->nacionality }}">
                            </div>
                            <div class="col-12 col-md-3 mt-3">
                                <label for="age" class="form-label">Edad</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Ej. 25" value="{{ $r->age }}">
                            </div>
                            <div class="col-12 col-md-3 mt-3">
                                <label for="gender" class="form-label">Género</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" {{ !$r->gender ? 'selected disabled' : '' }}>Selecciona una opción</option>
                                    <option value="Masculino" {{ $r->gender == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Femenino" {{ $r->gender == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="Prefiero no decirlo" {{ $r->gender == 'Prefiero no decirlo' ? 'selected' : '' }}>Prefiero no decirlo</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="email" name="email" required placeholder="Ej. prueba@mail.com" value="{{ $r->email }}">
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <label for="phone" class="form-label">Telefóno(con lada internacional)</label>
                                <input type="text" class="form-control" id="phone" name="phone" required placeholder="Ej. +52 55 1234 5678" value="{{ $r->phone }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-step container" id="step-2">
                        <h4 class="font-weight-bold">2. Afiliación Institucional</h4>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="institution">Institución / Universidad / Empresa</label>
                                <input type="text" class="form-control" id="institution" name="institution" required placeholder="Ej. Instituto Tecnológico de Aguascalientes" value="{{ $r->institution }}">
                            </div>
                            <div class="col-12 col-md-4 mt-3">
                                <label for="position" class="form-label">Puesto/Cargo</label>
                                <input type="text" class="form-control" id="position" name="position" required placeholder="Ej. Estudiante" value="{{ $r->position }}">
                            </div>
                            <div class="col-12 col-md-4 mt-3">
                                <label for="country" class="form-label">País de la institución</label>
                                <select name="country" id="country" class="form-control" required>
                                    <option value="" disabled {{ !$r->country ? 'selected' : '' }}>Selecciona una opción</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country['es_name'] }}" {{ $r->country == $country['es_name'] ? 'selected' : '' }}>{{ $country['es_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="letter">¿Requiere carta de invitación institucional?</label><br>
                                <input type="radio" name="letter" id="letter_yes" value="1" {{ $r->letter == '1' ? 'checked' : '' }} required>
                                <span>Sí</span>&nbsp;
                                <input type="radio" name="letter" id="letter_no" value="0" {{ $r->letter == '0' ? 'checked' : '' }} required>
                                <span>No</span>&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="form-step container" id="step-4">
                        <h4 class="font-weight-bold">3. Logística</h4>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="modality">Modalidad de Asistencia</label><br>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <input type="radio" name="modality" id="modality_1" value="1" {{ $r->modality == '1' ? 'checked' : '' }}  required>&nbsp;
                                        <span>Presencial</span>
                                    </div>
                                    <div>
                                        <input type="radio" name="modality" id="modality_2" value="2" {{ $r->modality == '2' ? 'checked' : '' }} required>&nbsp;
                                        <span>Virtual/En línea</span>
                                    </div>
                                    <div>
                                        <input type="radio" name="modality" id="modality_3" value="3" {{ $r->modality == '3' ? 'checked' : '' }} required>&nbsp;
                                        <span>Híbrida</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="logistics">¿Requiere apoyo de hospedaje?</label><br>
                                <input type="radio" name="logistics" id="logistics_1" value="1" {{ $r->logistics == '1' ? 'checked' : '' }} required>&nbsp;
                                <span>Sí</span>
                                <input type="radio" name="logistics" id="logistics_1" value="0" {{ $r->logistics == '0' ? 'checked' : '' }} required>&nbsp;
                                <span>No</span>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="food">¿Tiene alguna restricción alimentaria o necesidad especial?</label><br>
                                <textarea name="food" id="food" cols="30" rows="5" class="form-control">{{ $r->food }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-step container" id="step-6">
                        <h4 class="font-weight-bold">4. Información de Facturación</h4>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="invoice">¿Requiere factura?</label><br>
                                <input type="radio" name="invoice" id="invoice_yes" value="1" {{ $r->invoice == '1' ? 'checked' : '' }} required>&nbsp;
                                <span>Sí</span>
                                <input type="radio" name="invoice" id="invoice_no" value="0" {{ $r->invoice == '0' ? 'checked' : '' }} required>&nbsp;
                                <span>No</span>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <label for="billing-name">Nombre fiscal/Razón Social</label><br>
                                <input type="text" name="billingName" id="billingName" class="form-control" value="{{ $r->billingName }}"></input>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <label for="rfc">RFC o identificación fiscal</label><br>
                                <input type="text" name="rfc" id="rfc" class="form-control" value="{{ $r->rfc }}"></input>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="billing-address">Dirección fiscal</label><br>
                                <input type="text" name="billingAddress" id="billingAddress" class="form-control" value="{{ $r->billingAddress}}"></input>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="billing-email">Correo electrónico para envío de factura</label><br>
                                <input type="text" name="billingEmail" id="billingEmail" class="form-control" value="{{ $r->billingEmail}}"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-step container" id="step-7">
                        <h4 class="font-weight-bold">5. Consentimientos</h4>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="consent">Autorizo el uso de mis datos personales con fines logísticos y administrativos del evento.</label><br>
                                <input type="radio" name="consent" id="consent_yes" value="1" {{ $r->consent == '1' ? 'checked' : '' }} required>&nbsp;
                                <span>Sí</span>
                                <input type="radio" name="consent" id="consent_yes" value="0" {{ $r->consent == '0' ? 'checked' : '' }} required>&nbsp;
                                <span>No</label>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="record">Autorizo el uso de fotografías o grabaciones en las que pueda aparecer durante el evento para fines de difusión académica</label><br>
                                <input type="radio" name="record" id="record_yes" value="1" {{ $r->record == '1' ? 'checked' : '' }} required>&nbsp;
                                <span>Sí</span>
                                <input type="radio" name="record" id="record_no" value="0" {{ $r->record == '0' ? 'checked' : '' }} required>&nbsp;
                                <span>No</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="formSubmit">
                    <i class="fa fa-save" aria-hidden="true"></i> Guardar
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('input[name="language"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const otherInput = document.getElementById('other_language_input');
            otherInput.classList.toggle('d-none', this.value !== 'Otro');
            //if (this.value !== 'Otro') otherInput.value = '';
        });
    });
     document.addEventListener('DOMContentLoaded', function () {
        const billingFields = ['billingName', 'rfc', 'billingAddress', 'billingEmail'];

        function toggleBillingFields(enabled) {
            billingFields.forEach(field => {
                document.getElementById(field).disabled = !enabled;
            });
        }

        // Verifica el valor actual al cargar la página
        const selectedInvoice = document.querySelector('input[name="invoice"]:checked');
        toggleBillingFields(selectedInvoice && selectedInvoice.value === '1');

        // Asigna el cambio de estado a los radios
        document.querySelectorAll('input[name="invoice"]').forEach(radio => {
            radio.addEventListener('change', function() {
                toggleBillingFields(this.value === '1');
            });
        });
    });
</script>
