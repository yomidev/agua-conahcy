<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tecnologico;
use Carbon\Carbon;
use App\Models\Institution;
use App\Models\International;
use App\Models\Dependency;
use App\Models\Congress;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Laravel\Log;
use App\Models\Directivo;


class FrontendController extends Controller
{
    public function index() {
        $title = "Inicio";
        return view('welcome',['title'=>$title]);
    }
    public function services() {
        $title = "Servicios";
        $service = DB::table('services as s')
        ->join('tecnologicos as t', 's.id_tecnologico', '=', 't.id')
        ->select('s.name as servicio', 't.name as tecnologico', 's.description', 's.id', 't.id as id_tecnologico',
        's.email_contact')
        ->get();
        $equipment = DB::table('equipment as e')
        ->join('tecnologicos as t', 'e.id_tecnologico', '=', 't.id')
        ->select('e.name as nombre_equipo', 't.name as tecnologico', 'e.route', 'e.id', 't.id as id_tecnologico')
        ->get();
        $tecnologico = Tecnologico::orderBy('name')->get();
        return view('services',['title'=>$title, 'service' => $service, 'equipment' => $equipment, 'tecnologico' => $tecnologico]);
    }
    public function investigation() {
        $title = "Investigación";
        $tecnologico = Tecnologico::orderBy('name')->get();
        $investigadores = DB::table('researchers as r')
        ->join('tecnologicos as t', 'r.id_tecnologico', '=', 't.id')
        ->select('r.id','r.name as nombre', 'r.grade','r.specialization', 'r.investigation', 'r.cv','r.image','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        $research = DB::table('research as r')
        ->join('tecnologicos as t', 'r.id_tecnologico', '=', 't.id')
        ->select('r.id','r.title', 'r.description','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        $article = DB::table('articles as a')
        ->join('tecnologicos as t', 'a.id_tecnologico', '=', 't.id')
        ->select('a.id','a.name', 'a.type','a.cita','a.date','a.link','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        $project = DB::table('projects as p')
        ->join('tecnologicos as t', 'p.id_tecnologico', '=', 't.id')
        ->select('p.id','p.name', 'p.responsables','p.financiamiento','p.vigencia','p.link','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        $articlesGroupedByYear = $article->groupBy(function ($item) {
            return Carbon::parse($item->date)->year;
        })->sortBy(function ($items, $year) {
            return $year;
        });
        $projectsGroupedByYear = $project->groupBy(function ($item2) {
            return Carbon::parse($item2->vigencia)->year;
        })->sortBy(function ($items, $year) {
            return $year;
        });
        return view('investigation',['title'=>$title,'tecnologico' => $tecnologico, 'investigadores' => $investigadores,
                'research' => $research, 'article' => $article, 'articlesGroupedByYear' => $articlesGroupedByYear, 'project' => $project, 'projectsGroupedByYear' => $projectsGroupedByYear]);
    }
    public function postgraduate() {
        $title = "Posgrados";
        $tecnologico = Tecnologico::orderBy('name')->get();
        $program = DB::table('programs as p')
                ->join('tecnologicos as t', 'p.id_tecnologico', '=', 't.id')
                ->select('p.id as id_program','p.name as programa', 'p.description','p.type', 'p.url', 't.id as id_tecnologico', 't.name as tecnologico')
                ->get();
        return view('postgraduate',['title'=>$title, 'tecnologico' => $tecnologico, 'program' => $program]);
    }
    public function vinculation() {
        $title = "Vinculación";
        $institucion = Institution::all();
        $dependencia = Dependency::all();
        $internacional = International::all();
        return view('vinculation',['title'=>$title, 'institucion'=>$institucion, 'dependencia' => $dependencia,'internacional' => $internacional]);
    }

    public function congreso() {
        $title = "Congreso";
        $json = public_path('json/patrocinador.json');
        $jsonData = File::exists($json) ? File::get($json) : '[]';
        $images = json_decode($jsonData, true);
        return view('congreso',['title'=>$title, 'images' => $images]);
    }

    public function registro(Request $request) {
        $title = "Registro";
        $formData = $request->session()->get('form_data', []);
        $json = public_path('json/countries.json');
        $jsonData = File::exists($json) ? File::get($json) : '[]';
        $countries = json_decode($jsonData, true);
        return view('registro',['title'=>$title, 'formData' => $formData, 'countries' => $countries]);
    }
    public function handleStep(Request $request, $step){
        $validationData = $this->getValidationRules($step);
        $validator = Validator::make($request->all(), $validationData['rules'], $validationData['messages']);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Guardar datos en sesión
        $formData = $request->session()->get('form_data', []);
        $newData = $request->except('_token');
        $request->session()->put('form_data', array_merge($formData, $newData));

        return response()->json(['success' => true]);
    }

    public function completeRegistration(Request $request) {
        $formData = array_merge($request->session()->get('form_data', []), $request->except('_token'));

        $rules = [];
        $messages = [];

        for ($i = 1; $i <= 7; $i++) {
            $stepValidation = $this->getValidationRules($i);
            $rules = array_merge($rules, $stepValidation['rules']);
            $messages = array_merge($messages, $stepValidation['messages']);
        }

        $validator = Validator::make($formData, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $registro = new Congress();

            $fillableFields = [
                'name', 'lastname', 'nacionality', 'age', 'gender', 'email', 'phone',
                'institution', 'position', 'faculty', 'country', 'letter', 'participation',
                'presentation', 'area', 'proof', 'modality', 'logistics', 'food', 'language',
                'invoice', 'billingName', 'billingAddress', 'rfc', 'billingEmail',
                'consent', 'record'
            ];

            foreach ($fillableFields as $field) {
                if (array_key_exists($field, $formData)) {
                    $registro->{$field} = $formData[$field];
                }
            }

            if ($formData['language'] == 'Otro' && !empty($formData['other_language'])) {
                $registro->language = $formData['other_language'];
            }

            if (!$registro->save()) {
                throw new \Exception('Error al guardar en base de datos');
            }

            DB::commit();

            $request->session()->forget('form_data');

            return response()->json([
                'success' => true,
                'message' => 'Registro completado exitosamente',
                'redirect' => route('congreso')
        ]);
        } catch (\Exception $e) {
            DB::rollBack();
                dd('Error al guardar:', $e->getMessage(), $e->getTraceAsString());
        }
    }


    protected function getValidationRules($step){
        $rules = [];
        $messages = [];

        switch ($step) {
            case 1:
                $rules = [
                    'name' => 'required|string|max:100',
                    'lastname' => 'required|string|max:100',
                    'nacionality' => 'required|string|max:50',
                    'age' => 'nullable|integer|min:18',
                    'gender' => 'nullable|string',
                    'email' => 'required|email|unique:congresses,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                    'phone' => 'required|string|max:20|unique:congresses,phone',
                ];
                $messages = [
                    'name.required' => 'El nombre es obligatorio',
                    'lastname.required' => 'El apellido es obligatorio',
                    'nacionality.required' => 'La nacionalidad es obligatoria',
                    'age.integer' => 'La edad debe ser un número entero',
                    'age.min' => 'La edad mínima es 18 años',
                    'email.required' => 'El correo electrónico es obligatorio',
                    'email.email' => 'El correo electrónico no es válido',
                    'email.unique' => 'El correo electrónico ya está registrado',
                    'phone.required' => 'El teléfono es obligatorio',
                    'email.regex' => 'El correo electrónico debe tener un formato válido (ejemplo@dominio.com)',
                    'phone.unique' => 'El teléfono ya está registrado',
                ];
                break;
            case 2:
                $rules = [
                    'institution' => 'required|string',
                    'position' => 'required|string',
                    'faculty' => 'required|string',
                    'country' => 'required',
                    'letter' => 'required'
                ];
                $messages = [
                    'institution.required' => 'La institución es obligatoria',
                    'position.required' => 'El cargo es obligatorio',
                    'faculty.required' => 'El departamento/facultad es obligatorio',
                    'country.required' => 'El país es obligatorio',
                    'letter.required' => 'Debe de seleccionar si requiere o no carta de invitación',
                ];
            break;
            case 3:
                $rules =[
                    'participation' => 'required',
                    'area' => 'required|string',
                    'proof' => 'required',
                ];
                $messages = [
                    'participation.required' => 'Debe seleccionar el tipo de participación',
                    'area.required' => 'El área tématica es obligatoria',
                    'proof.required' => 'Debe seleccionar si requiere o no constancia de participación',
                ];
            break;
            case 4:
                $rules = [
                    'modality' => 'required',
                    'logistics' => 'required',
                ];
                $messages = [
                    'modality.required' => 'Debe seleccionar la modalidad de participación',
                    'logistics.required' => 'Debe indicar si requiere o no apoyo logístico',
                ];
            break;
            case 5:
                $rules = [
                    'language' => 'required|in:Español,Inglés,Otro',
                    'other_language' => 'required_if:language,Otro'
                ];
                $messages = [
                    'language.required' => 'Debe seleccionar un idioma de preferencia',
                    'language.in' => 'Seleccione una opción válida',
                    'other_language.required_if' => 'Debe especificar el idioma cuando selecciona "Otro"',
                ];
            break;
            case 6:
                $rules = [
                    'invoice' => 'required|in:1,0',
                    'billingName' => 'required_if:invoice,1|string|max:100',
                    'billingAddress' => 'required_if:invoice,1|string|max:255',
                    'rfc' => 'required_if:invoice,1|string|max:13',
                    'billingEmail' => 'required_if:invoice,1|email|max:100',
                ];
                $messages = [
                    'invoice.required' => 'Debe seleccionar si o no requiere factura',
                    'billingName.required_if' => 'El nombre de la razón social es obligatorio',
                    'billingAddress.required_if' => 'La dirección es obligatoria',
                    'rfc.required_if' => 'El RFC es obligatorio',
                    'billingEmail.required_if' => 'El correo electrónico de facturación es obligatorio',
                    'billingEmail.email' => 'El correo electrónico de facturación no es válido',
                ];
            break;
            case 7:
                $rules = [
                    'consent' => 'required',
                    'record' => 'required',
                ];
                $messages = [
                    'consent.required' => 'Debe seleccionar una opción',
                    'record.required' => 'Debe seleccionar una opción',
                ];
            break;
        }
        return ['rules' => $rules, 'messages' => $messages];
    }

    public function registro_directivos(Request $request) {
        $title = "Registro Directivos";
        $formData = $request->session()->get('form_data', []);
        $json = public_path('json/countries.json');
        $jsonData = File::exists($json) ? File::get($json) : '[]';
        $countries = json_decode($jsonData, true);
        return view('directivos',['title'=>$title, 'formData' => $formData, 'countries' => $countries]);
    }
    public function handleDirectivosStep(Request $request, $step){
        $validationData = $this->getValidationRulesDirectivos($step);
        $validator = Validator::make($request->all(), $validationData['rules'], $validationData['messages']);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Guardar datos en sesión
        $formData = $request->session()->get('form_data', []);
        $newData = $request->except('_token');
        $request->session()->put('form_data', array_merge($formData, $newData));

        return response()->json(['success' => true]);
    }
    protected function getValidationRulesDirectivos($step){
        $rules = [];
        $messages = [];

        switch ($step) {
            case 1:
                $rules = [
                    'name' => 'required|string|max:100',
                    'lastname' => 'required|string|max:100',
                    'nacionality' => 'required|string|max:50',
                    'age' => 'nullable|integer|min:18',
                    'gender' => 'nullable|string',
                    'email' => 'required|email|unique:directivos,email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                    'phone' => 'required|string|max:20|unique:directivos,phone',
                ];
                $messages = [
                    'name.required' => 'El nombre es obligatorio',
                    'lastname.required' => 'El apellido es obligatorio',
                    'nacionality.required' => 'La nacionalidad es obligatoria',
                    'age.integer' => 'La edad debe ser un número entero',
                    'age.min' => 'La edad mínima es 18 años',
                    'email.required' => 'El correo electrónico es obligatorio',
                    'email.email' => 'El correo electrónico no es válido',
                    'email.unique' => 'El correo electrónico ya está registrado',
                    'phone.required' => 'El teléfono es obligatorio',
                    'email.regex' => 'El correo electrónico debe tener un formato válido (ejemplo@dominio.com)',
                    'phone.unique' => 'El teléfono ya está registrado',
                ];
                break;
            case 2:
                $rules = [
                    'institution' => 'required|string',
                    'position' => 'required|string',
                    'country' => 'required',
                    'letter' => 'required'
                ];
                $messages = [
                    'institution.required' => 'La institución es obligatoria',
                    'position.required' => 'El cargo es obligatorio',
                    'country.required' => 'El país es obligatorio',
                    'letter.required' => 'Debe de seleccionar si requiere o no carta de invitación',
                ];
            break;
            case 3:
                $rules = [
                    'modality' => 'required',
                    'logistics' => 'required',
                ];
                $messages = [
                    'modality.required' => 'Debe seleccionar la modalidad de participación',
                    'logistics.required' => 'Debe indicar si requiere o no apoyo logístico',
                ];
            break;
            case 4:
                $rules = [
                    'invoice' => 'required|in:1,0',
                    'billingName' => 'required_if:invoice,1|string|max:100',
                    'billingAddress' => 'required_if:invoice,1|string|max:255',
                    'rfc' => 'required_if:invoice,1|string|max:13',
                    'billingEmail' => 'required_if:invoice,1|email|max:100',
                ];
                $messages = [
                    'invoice.required' => 'Debe seleccionar si o no requiere factura',
                    'billingName.required_if' => 'El nombre de la razón social es obligatorio',
                    'billingAddress.required_if' => 'La dirección es obligatoria',
                    'rfc.required_if' => 'El RFC es obligatorio',
                    'billingEmail.required_if' => 'El correo electrónico de facturación es obligatorio',
                    'billingEmail.email' => 'El correo electrónico de facturación no es válido',
                ];
            break;
            case 5:
                $rules = [
                    'consent' => 'required',
                    'record' => 'required',
                ];
                $messages = [
                    'consent.required' => 'Debe seleccionar una opción',
                    'record.required' => 'Debe seleccionar una opción',
                ];
            break;
        }
        return ['rules' => $rules, 'messages' => $messages];
    }
    public function completeDirectivosRegistration(Request $request){
        $formData = array_merge($request->session()->get('form_data', []), $request->except('_token'));

        $rules = [];
        $messages = [];

        for ($i = 1; $i <= 5; $i++) {
            $stepValidation = $this->getValidationRulesDirectivos($i);
            $rules = array_merge($rules, $stepValidation['rules']);
            $messages = array_merge($messages, $stepValidation['messages']);
        }

        $validator = Validator::make($formData, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $registro = new Directivo();

            $fillableFields = [
                'name', 'lastname', 'nacionality', 'age', 'gender', 'email', 'phone',
                'institution', 'position', 'country', 'letter', 'modality', 'logistics', 'food',
                'invoice', 'billingName', 'billingAddress', 'rfc', 'billingEmail',
                'consent', 'record'
            ];

            foreach ($fillableFields as $field) {
                if (array_key_exists($field, $formData)) {
                    $registro->{$field} = $formData[$field];
                }
            }

            if (!$registro->save()) {
                throw new \Exception('Error al guardar en base de datos');
            }

            DB::commit();

            $request->session()->forget('form_data');

            return response()->json([
                'success' => true,
                'message' => 'Registro completado exitosamente',
                'redirect' => route('congreso')
        ]);
        } catch (\Exception $e) {
            DB::rollBack();
                dd('Error al guardar:', $e->getMessage(), $e->getTraceAsString());
        }
    }

}
