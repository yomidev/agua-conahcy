<div class="modal fade" id="ViewR{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewRLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewRLabel">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h4 class="font-weight-bold">1. Información Personal</h4>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p class="font-weight-bold">Nombre(s)</p>
                            <p>{{$r->name}}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="font-weight-bold">Apellidos</p>
                            <p>{{$r->lastname}}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="font-weight-bold">Nacionalidad</p>
                            <p>{{$r->nacionality}}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <p class="font-weight-bold">Edad</p>
                            <p>{{$r->age ?? 'Sin especificar'}}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <p class="font-weight-bold">Género</p>
                            <p>{{$r->gender ?? 'Sin especificar'}}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="font-weight-bold">Correo Electrónico</p>
                            <p>{{$r->email}}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="font-weight-bold">Teléfono</p>
                            <p>{{$r->phone}}</p>
                        </div>
                    </div>

                    <h4 class="font-weight-bold">2. Afiliación Institucional</h4>
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">Institución / Universidad / Empresa</p>
                            <p>{{$r->institution}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-weight-bold">Puesto/Cargo</p>
                            <p>{{$r->position}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-weight-bold">País de la Institución</p>
                            <p>{{$r->country}}</p>
                        </div>
                        <div class="col-12">
                            <p class="font-weight-bold">¿Requiere carta de invitación institucional?</p>
                            <p>{{$r->letter == 1 ? 'Sí' : 'No'}}</p>
                        </div>
                    </div>

                    <h4 class="font-weight-bold">3. Logística</h4>
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">Modalidad de Asistencia</p>
                            <p>
                                @switch($r->modality)
                                    @case(1) Presencial @break
                                    @case(2) Virtual/En línea @break
                                    @case(3) Híbrida @break
                                @endswitch
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="font-weight-bold">¿Requiere apoyo de hospedaje?</p>
                            <p>{{$r->logistics == 1 ? 'Sí' : 'No'}}</p>
                        </div>
                        <div class="col-12">
                            <p class="font-weight-bold">¿Tiene alguna restricción alimentaria o necesidad especial?</p>
                            <p>{{$r->food ?? 'Sin especificar'}}</p>
                        </div>
                    </div>

                    <h4 class="font-weight-bold">4. Información de Facturación</h4>
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">¿Requiere Factura?</p>
                            <p>{{$r->invoice == 1 ? 'Sí' : 'No'}}</p>
                        </div>
                        @if($r->invoice == 1)
                            <div class="col-12 col-md-6">
                                <p class="font-weight-bold">Nombre fiscal / Razón Social</p>
                                <p>{{$r->billingName}}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="font-weight-bold">RFC o identificación fiscal</p>
                                <p>{{$r->rfc}}</p>
                            </div>
                            <div class="col-12">
                                <p class="font-weight-bold">Dirección fiscal</p>
                                <p>{{$r->billingAddress}}</p>
                            </div>
                            <div class="col-12">
                                <p class="font-weight-bold">Correo electrónico para envío de factura</p>
                                <p>{{$r->billingEmail}}</p>
                            </div>
                        @endif
                    </div>

                    <h4 class="font-weight-bold">5. Consentimientos</h4>
                    <div class="row">
                        <div class="col-12">
                            <p class="font-weight-bold">Autorizo el uso de mis datos personales con fines logísticos</p>
                            <p>{{$r->consent1 == 1 ? 'Sí' : 'No'}}</p>
                        </div>
                        <div class="col-12">
                            <p class="font-weight-bold">Autorizo el uso de imagen con fines de difusión del evento</p>
                            <p>{{$r->consent2 == 1 ? 'Sí' : 'No'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
