@extends('templates.master')
<header>
    @include('templates.partials.menu-gob')
</header>
<nav id="logos">
    <div class="container-fluid d-flex justify-content-between align-items-center pt-2 logos-congreso">
        <img src="{{asset('pictures/gob-2.png')}}" alt="" class="img-fluid" style="max-width: 125px">
        <img src="{{asset('pictures/sep-2.png')}}" alt=""  class="img-fluid" style="max-width: 200px">
        <img src="{{asset('pictures/2.png')}}" alt="" class="img-fluid" style="max-width: 300px">
        <img src="{{asset('pictures/3.png')}}" alt="" class="img-fluid" style="max-width: 200px">
        <img src="{{asset('pictures/logo-tecnm.png')}}" alt="img-fluid" style="max-width: 100px">
        <img src="{{asset('pictures/5.png')}}" alt="img-fluid" style="max-width: 150px">
    </div>
    <div class="container-fluid cintillo">
        <img src="{{asset('pictures/cintillo.jpg')}}" alt="" class="img-fluid">
    </div>
</nav>
<section class="container-fluid">
    <div class="language-selector-container mb-3">
        <!-- Widget mejorado -->
        <div id="google_translate_element" class="custom-translate-widget"></div>

        <!-- Créditos (opcional, puedes quitarlo) -->
        <div class="google-credit mt-1">
            <small class="text-muted">
                Powered by
                <a href="https://translate.google.com" target="_blank" rel="noopener noreferrer">
                <img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png"
                     width="37px" height="14px"
                     style="vertical-align: middle; padding-right: 3px"
                     alt="Google Translate">
                Translate
                </a>
            </small>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <h2 class="text-center fw-bold mb-5">Registro exclusivo para Directivos</h2>
        <div class="progress-steps flex-wrap">
            <div class="step active" data-step="1">Información Personal</div>
            <div class="step" data-step="2">Afiliación Institucional</div>
            <div class="step" data-step="3">Logística</div>
            <div class="step" data-step="4">Información de Facturación</div>
            <div class="step" data-step="5">Consentimientos</div>
        </div>
        <form action="{{ route('registro.directivos.complete') }}" method="post" id="multiStepForm">
            @csrf
            <div class="form-step container active" id="step-1">
                <div class="row">
                    <div class="col-12 col-md-6 mt-3">
                        <label for="name" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Ej. Juan Carlos" value="{{ old('name', $formData['name'] ?? '') }}">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="lastname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required placeholder="Ej. Pérez López" value="{{ old('lastname', $formData['lastname'] ?? '') }}">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="nacionality" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control" id="nacionality" name="nacionality" required placeholder="Ej. Mexicana" value="{{ old('nacionality', $formData['nacionality'] ?? '') }}">
                    </div>
                    <div class="col-12 col-md-3 mt-3">
                        <label for="age" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Ej. 25" value="{{ old('age', $formData['age'] ?? '') }}">
                    </div>
                    <div class="col-12 col-md-3 mt-3">
                        <label for="gender" class="form-label">Género</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="" {{ old('gender', session('form_data.gender')) ? '' : 'selected disabled' }}>Selecciona una opción</option>
                            <option value="Masculino" {{ old('gender', session('form_data.gender')) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('gender', session('form_data.gender')) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Prefiero no decirlo" {{ old('gender', session('form_data.gender')) == 'Prefiero no decirlo' ? 'selected' : '' }}>Prefiero no decirlo</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="text" class="form-control" id="email" name="email" required placeholder="Ej. prueba@mail.com" value="{{ old('email', $formData['email'] ?? '') }}">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="phone" class="form-label">Telefóno(con lada internacional)</label>
                        <input type="text" class="form-control" id="phone" name="phone" required placeholder="Ej. +52 55 1234 5678" value="{{ old('phone', $formData['phone'] ?? '') }}">
                    </div>
                    <div class="btn-container">
                        <button type="button" class="btn btn-primary btn-next">Siguiente</button>
                    </div>
                </div>
            </div>
            <div class="form-step container" id="step-2">
                <div class="row">
                    <div class="col-12 mt-3">
                        <label for="institution">Institución</label>
                        <input type="text" class="form-control" id="institution" name="institution" required placeholder="Ej. Instituto Tecnológico de Aguascalientes" value="{{ old('institution', $formData['institution'] ?? '') }}">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="position" class="form-label">Puesto/Cargo</label>
                        <input type="text" class="form-control" id="position" name="position" required placeholder="Ej. Estudiante" value="{{ old('position', $formData['position'] ?? '') }}">
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="country" class="form-label">País de la institución</label>
                        <select name="country" id="country" class="form-select" required>
                            <option value="" selected disabled>Selecciona una opción</option>
                            @foreach($countries as $country)
                                <option value="{{ $country['es_name'] }}"  {{ old('country', session('form_data.country'))== $country['es_name'] ? 'selected' : '' }}>{{ $country['es_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="letter">¿Requiere carta de invitación institucional?</label><br>
                        <input type="radio" name="letter" id="letter_yes" value="1" {{ old('letter', session('form_data.letter')) == '1' ? 'checked' : '' }} required>
                        <span>Sí</span>&nbsp;
                        <input type="radio" name="letter" id="letter_no" value="0" {{ old('letter', session('form_data.letter')) == '0' ? 'checked' : '' }} required>
                        <span>No</span>&nbsp;
                    </div>
                    <div class="btn-container">
                        <button type="button" class="btn btn-primary btn-prev">Anterior</button>
                        <button type="button" class="btn btn-primary btn-next">Siguiente</button>
                    </div>
                </div>
            </div>
            <div class="form-step container" id="step-3">
                <div class="row">
                    <div class="col-12 mt-3">
                        <label for="modality">Modalidad de Asistencia</label><br>
                        <div class="d-flex justify-content-between">
                            <div>
                                <input type="radio" name="modality" id="modality_1" value="1" {{ old('modality', session('form_data.modality')) == '1' ? 'checked' : '' }}  required>&nbsp;
                                <span>Presencial</span>
                            </div>
                            <div>
                                <input type="radio" name="modality" id="modality_2" value="2" {{ old('modality', session('form_data.modality')) == '2' ? 'checked' : '' }} required>&nbsp;
                                <span>Virtual/En línea</span>
                            </div>
                            <div>
                                <input type="radio" name="modality" id="modality_3" value="3" {{ old('modality', session('form_data.modality')) == '3' ? 'checked' : '' }} required>&nbsp;
                                <span>Híbrida</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="logistics">¿Requiere apoyo de hospedaje?</label><br>
                        <input type="radio" name="logistics" id="logistics_1" value="1" {{ old('logistics', session('form_data.logistics')) == '1' ? 'checked' : '' }} required>&nbsp;
                        <span>Sí</span>
                        <input type="radio" name="logistics" id="logistics_1" value="0" {{ old('logistics', session('form_data.logistics')) == '2' ? 'checked' : '' }} required>&nbsp;
                        <span>No</span>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="food">¿Tiene alguna restricción alimentaria o necesidad especial?</label><br>
                        <textarea name="food" id="food" cols="30" rows="5" class="form-control">{{ old('food', $formData['food'] ?? '') }}</textarea>
                    </div>
                    <div class="btn-container">
                        <button type="button" class="btn btn-primary btn-prev" onclick="">Anterior</button>
                        <button type="button" class="btn btn-primary btn-next" onclick="">Siguiente</button>
                    </div>
                </div>
            </div>
            <div class="form-step container" id="step-4">
                <div class="row">
                    <div class="col-12 mt-3">
                        <label for="invoice">¿Requiere factura?</label><br>
                        <input type="radio" name="invoice" id="invoice_yes" value="1" {{ old('invoice', session('form_data.invoice')) == '1' ? 'checked' : '' }} required>&nbsp;
                        <span>Sí</span>
                        <input type="radio" name="invoice" id="invoice_no" value="0" {{ old('invoice', session('form_data.invoice')) == '0' ? 'checked' : '' }} required>&nbsp;
                        <span>No</span>
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="billing-name">Nombre fiscal/Razón Social</label><br>
                        <input type="text" name="billingName" id="billingName" class="form-control" disabled value="{{ old('billingName', $formData['billingName'] ?? '') }}"></input>
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label for="rfc">RFC o identificación fiscal</label><br>
                        <input type="text" name="rfc" id="rfc" class="form-control" disabled value="{{ old('rfc', $formData['rfc'] ?? '') }}"></input>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="billing-address">Dirección fiscal</label><br>
                        <input type="text" name="billingAddress" id="billingAddress" class="form-control" disabled value="{{ old('billingAddress', $formData['billingAddress'] ?? '') }}"></input>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="billing-email">Correo electrónico para envío de factura</label><br>
                        <input type="text" name="billingEmail" id="billingEmail" class="form-control" disabled value="{{ old('billingEmail', $formData['billingEmail'] ?? '') }}"></input>
                    </div>
                    <div class="btn-container">
                        <button type="button" class="btn btn-primary btn-prev">Anterior</button>
                        <button type="button" class="btn btn-primary btn-next">Siguiente</button>
                    </div>
                </div>
            </div>
            <div class="form-step container" id="step-5">
                <div class="row">
                    <div class="col-12 mt-3">
                        <label for="consent">Autorizo el uso de mis datos personales con fines logísticos y administrativos del evento.</label><br>
                        <input type="radio" name="consent" id="consent_yes" value="1" {{ old('consent', session('form_data.consent')) == '1' ? 'checked' : '' }} required>&nbsp;
                        <span>Sí</span>
                        <input type="radio" name="consent" id="consent_yes" value="0" {{ old('consent', session('form_data.consent')) == '0' ? 'checked' : '' }} required>&nbsp;
                        <span>No</label>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="record">Autorizo el uso de fotografías o grabaciones en las que pueda aparecer durante el evento para fines de difusión académica</label><br>
                        <input type="radio" name="record" id="record_yes" value="1" {{ old('record', session('form_data.record')) == '1' ? 'checked' : '' }} required>&nbsp;
                        <span>Sí</span>
                        <input type="radio" name="record" id="record_no" value="0" {{ old('record', session('form_data.record')) == '0' ? 'checked' : '' }} required>&nbsp;
                        <span>No</span>
                    </div>
                    <div class="btn-container">
                        <button type="button" class="btn btn-primary btn-prev">Anterior</button>
                        <button type="button" class="btn btn-success" id="btn-save-final">Guardar mis datos</button>
                        <button type="submit" class="btn btn-success btn-submit d-none">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@include('templates.partials.contact')
<footer class="footer-gob">
    @include('templates.partials.footer')
    <div class="img-footer"></div>
</footer>
<script>
    document.querySelectorAll('input[name="invoice"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const billingFields = ['billingName', 'rfc', 'billingAddress', 'billingEmail'];
            billingFields.forEach(field => {
                document.getElementById(field).disabled = this.value === '0';
            });
        });
    });
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'es',
            includedLanguages: 'en',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
            autoDisplay: false,
            multilanguagePage: true
        }, 'google_translate_element');

        // Cambiar texto del botón por defecto
        var $googleSelect = $(".goog-te-combo");
        $googleSelect.addClass('form-control');
        $googleSelect.css({
            'padding': '0.375rem 0.75rem',
            'border-radius': '0.25rem',
            'border': '1px solid #ced4da'
        });
    }
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    if (!document.getElementById('multiStepForm')) return;

    initFormSteps();
    setupButtonListeners();
    setupFormSubmit();
    });

    function initFormSteps() {
        const formSteps = document.querySelectorAll('.form-step');
        if (formSteps.length === 0) return;

        formSteps.forEach((step, index) => {
            step.classList.toggle('active', index === 0);
            step.classList.toggle('d-none', index !== 0);
        });

        updateProgressSteps(1);
    }

    function setupButtonListeners() {
        document.querySelectorAll('.btn-next').forEach(button => {
            button.addEventListener('click', async function() {
                const currentStepContainer = this.closest('.form-step');
                if (!currentStepContainer) return;

                const currentStep = parseInt(currentStepContainer.id.split('-')[1]);
                if (isNaN(currentStep)) return;

                await handleNextStep(currentStep);
            });
        });
        // Botones "Anterior"
        document.querySelectorAll('.btn-prev').forEach(button => {
            button.addEventListener('click', function() {
                const currentStepContainer = this.closest('.form-step');
                if (!currentStepContainer) return;

                const currentStep = parseInt(currentStepContainer.id.split('-')[1]);
                if (isNaN(currentStep)) return;

                handlePrevStep(currentStep);
            });
        });
    }

    async function handleNextStep(currentStep) {
        const form = document.getElementById('multiStepForm');
        if (!form) return;

        let token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!token) {
            token = document.querySelector('input[name="_token"]')?.value;
        }

        if (!token) {
            console.error('CSRF token not found');
            await Swal.fire({
                title: 'Error de seguridad',
                text: 'No se encontró el token de seguridad. Por favor recarga la página.',
                icon: 'error'
            });
            return;
        }

        const formData = new FormData(form);
        formData.append('_token', token);

        try {
            const loader = Swal.fire({
                title: 'Procesando',
                html: 'Por favor espera...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const response = await fetch(`/registro/directivos/step/${currentStep}`, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });
            await loader.close();

            if (response.status === 419) {
                // Token CSRF expirado
                await Swal.fire({
                    title: 'Sesión expirada',
                    text: 'Por favor recarga la página e intenta nuevamente',
                    icon: 'error',
                    confirmButtonText: 'Recargar'
                }).then(() => {
                    window.location.reload();
                });
                return;
            }

            const data = await response.json();

            if (!response.ok) {
                // Mostrar errores con SweetAlert
                let errorMessages = '';
                if (data.errors) {
                    for (const [field, errors] of Object.entries(data.errors)) {
                        // Buscar el label correspondiente al campo
                        const label = document.querySelector(`label[for="${field}"]`)?.textContent || field;
                        errorMessages += `<strong>${label}:</strong> ${errors.join(', ')}<br>`;
                        const input = document.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('is-invalid');
                            const errorElement = document.createElement('div');
                            errorElement.className = 'invalid-feedback';
                            errorElement.innerHTML = errors.join(', ');
                            input.parentNode.appendChild(errorElement);
                        }
                    }
                } else {
                    errorMessages = data.message || 'Ocurrió un error al procesar el formulario';
                }

                await Swal.fire({
                    title: 'Error de validación',
                    html: errorMessages,
                    icon: 'error',
                    confirmButtonText: 'Entendido'
                });
                return;
            }

            document.getElementById(`step-${currentStep}`).classList.remove('active');
            document.getElementById(`step-${currentStep}`).classList.add('d-none');

            const nextStep = currentStep + 1;
            const nextStepElement = document.getElementById(`step-${nextStep}`);
            if (nextStepElement) {
                nextStepElement.classList.remove('d-none');
                nextStepElement.classList.add('active');
                updateProgressSteps(nextStep);

                nextStepElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }

        } catch (error) {
        console.error('Error:', error);
        await Swal.fire({
            title: 'Error',
            text: 'Ocurrió un error al procesar el formulario',
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
    }
    }

    function handlePrevStep(currentStep) {
        document.getElementById(`step-${currentStep}`).classList.remove('active');
        document.getElementById(`step-${currentStep}`).classList.add('d-none');

        const prevStep = currentStep - 1;
        const prevStepElement = document.getElementById(`step-${prevStep}`);
        if (prevStepElement) {
            prevStepElement.classList.remove('d-none');
            prevStepElement.classList.add('active');
            updateProgressSteps(prevStep);

            // Desplazarse suavemente al inicio del formulario
            prevStepElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Función para actualizar la barra de progreso
    function updateProgressSteps(activeStep) {
        const steps = document.querySelectorAll('.step');
        if (steps.length === 0) return;

        steps.forEach((step, index) => {
            const stepNumber = index + 1;
            if (stepNumber < activeStep) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (stepNumber === activeStep) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('active', 'completed');
            }
        });
    }

    function setupFormSubmit() {
        const form = document.getElementById('multiStepForm');
        if (!form) return;

        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            let token = document.querySelector('meta[name="csrf-token"]')?.content;
            if (!token) {
                token = document.querySelector('input[name="_token"]')?.value;
            }

            if (!token) {
                console.error('CSRF token not found');
                await Swal.fire({
                    title: 'Error de seguridad',
                    text: 'No se encontró el token de seguridad. Por favor recarga la página.',
                    icon: 'error',
                    confirmButtonText: 'Recargar'
                }).then(() => {
                    window.location.reload();
                });
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Procesando...';
            }

            let loader;
            try {
                loader = Swal.fire({
                    title: 'Guardando datos',
                    html: 'Estamos procesando tu registro...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                let actionUrl = form.action;
                if (location.protocol === 'https:' && actionUrl.startsWith('http://')) {
                    actionUrl = actionUrl.replace('http://', 'https://');
                }

                const response = await fetch(actionUrl, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new FormData(form)
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    await Swal.fire({
                        title: '¡Registro completo!',
                        text: data.message || 'Registro guardado exitosamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });

                    window.location.href = data.redirect;
                    return;
                } else {
                    let errorMessages = 'Ocurrieron los siguientes errores:<br><br>';
                    if (data.errors) {
                        for (const [field, errors] of Object.entries(data.errors)) {
                            const label = document.querySelector(`label[for="${field}"]`)?.textContent || field;
                            errorMessages += `<strong>${label}:</strong> ${errors.join(', ')}<br>`;
                        }
                    } else {
                        errorMessages = data.message || 'Error al procesar el formulario';
                    }

                    await Swal.fire({
                        title: 'Error',
                        html: errorMessages,
                        icon: 'error'
                    });
                }

            } catch (error) {
                console.error('Error:', error);
                await Swal.fire({
                    title: 'Error de conexión',
                    text: 'No se pudo conectar con el servidor. Por favor intenta nuevamente.',
                    icon: 'error'
                });
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Enviar';
                }
                Swal.close();
            }
        });
    }
    document.getElementById('btn-save-final').addEventListener('click', async function() {
        let token = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!token) {
            token = document.querySelector('input[name="_token"]')?.value;
        }

        if (!token) {
            console.error('CSRF token not found');
            await Swal.fire({
                title: 'Error de seguridad',
                text: 'No se encontró el token de seguridad. Por favor recarga la página.',
                icon: 'error'
            });
            return;
        }

        const form = document.getElementById('multiStepForm');
        const formData = new FormData(form);
        formData.append('_token', token);

        try {
            const loader = Swal.fire({
                title: 'Validando datos...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            const validationResponse = await fetch('/registro/directivos/step/5', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            await loader.close();

            if (!validationResponse.ok) {
                if (validationResponse.status === 419) { // Token CSRF expirado
                    await Swal.fire({
                        title: 'Sesión expirada',
                        text: 'Por favor recarga la página e intenta nuevamente',
                        icon: 'error',
                        confirmButtonText: 'Recargar'
                    }).then(() => {
                        window.location.reload();
                    });
                    return;
                }

                const errorData = await validationResponse.json();
                let errorMessages = 'Por favor corrige los siguientes errores:<br><br>';

                if (errorData.errors) {
                    for (const error of Object.values(errorData.errors)) {
                        errorMessages += `• ${error}<br>`;
                    }
                }

                return Swal.fire({
                    title: 'Error de validación',
                    html: errorMessages,
                    icon: 'error'
                });
            }

            const confirmResult = await Swal.fire({
                title: '¿Confirmar envío final?',
                html: 'Los datos serán guardados permanentemente y <strong>no podrán modificarse</strong>.<br><br>¿Deseas continuar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, guardar definitivamente',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            });

            if (confirmResult.isConfirmed) {
                const finalLoader = Swal.fire({
                    title: 'Guardando datos...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                document.querySelector('.btn-submit').click();
            }

        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error inesperado',
                text: 'Ocurrió un error al procesar la solicitud. Por favor intenta nuevamente.',
                icon: 'error'
            });
        }
    });
</script>
