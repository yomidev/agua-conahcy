<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tecnologico;
use App\Models\Equipment;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Program;
use App\Models\Researcher;
use Carbon\Carbon;
use App\Models\Investigation;
use App\Models\Article;
use App\Models\Project;
use App\Models\Institution;
use App\Models\Dependency;
use App\Models\International;
use App\Models\Congress;
use Illuminate\Support\Facades\File;
use App\Models\Directivo;

class AdminController extends Controller
{
    public function tecnologicos(){
        //Funcion para listar la vista de los tecnologicos
        $tecnologico = Tecnologico::all();
        return view('admin.tecnologicos.index',['tecnologico' => $tecnologico]);
    }
    public function tecnologicos_create(Request $request){
        //Funcion para crear registro
        $tec = new Tecnologico;
        $tec->name = $request->name;
        $tec->save();

        return response()->json(['success' => true]);
    }

    public function tecnologicos_update(Request $request, $id){
        //Funcion para actualizar registro
        $tec = Tecnologico::findOrFail($id);
        $tec->name = $request->name;
        $tec->save();

        return response()->json(['success' => true]);
    }

    public function tecnologicos_delete($id){
        //Funcion para eliminar registro
        $tec = Tecnologico::findOrFail($id);
        $tec->delete();
        return response()->json(['success' => true]);
    }

    //CRUD Infraestructura
    public function infraestructura(){
        //$equipment = Equipment::all();
        $equipment = DB::table('equipment as e')
        ->join('tecnologicos as t', 'e.id_tecnologico', '=', 't.id')
        ->select('e.name as nombre_equipo', 't.name as tecnologico', 'e.route', 'e.id', 't.id as id_tecnologico')
        ->get();
        $tecnologico = Tecnologico::all();
        return view('admin.infraestructura.index',['equipment' => $equipment, 'tecnologico' =>$tecnologico]);
    }

    public function infraestructura_create(Request $request){
        $equipment = new Equipment;
        $equipment->name = $request->name;
        $equipment->id_tecnologico = $request->tec;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            $file_attached = 'Equipo_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/infraestructura';
            $attached->move($path,$file_attached);
            $equipment->route = $file_attached;
        }
        $equipment->save();

        return response()->json(['success' => true]);
    }

    public function infraestructura_update(Request $request, $id){
        $equipment = Equipment::findOrFail($id);
        $equipment->name = $request->name;
        $equipment->id_tecnologico =  $request->tec;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($equipment->route) {
                $previous_image_path = public_path('pictures/admin/infraestructura/' . $equipment->route);
                if (file_exists($previous_image_path)) {
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Equipo_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/infraestructura';
            $attached->move($path,$file_attached);
            $equipment->route = $file_attached;
        }
        $equipment->save();
        return response()->json(['success' => true]);
    }

    public function infraestructura_delete($id){
        $equipment = Equipment::findOrFail($id);
        if ($equipment->route) {
            $previous_image_path = public_path('pictures/admin/infraestructura/' . $equipment->route);
            if (file_exists($previous_image_path)) {
                unlink($previous_image_path);
            }
        }
        $equipment->delete();
        return response()->json(['success' => true]);
    }

    public function servicios(){
        //$service = Service::all();
        $service = DB::table('services as s')
        ->join('tecnologicos as t', 's.id_tecnologico', '=', 't.id')
        ->select('s.name as servicio', 't.name as tecnologico', 's.description', 's.id', 't.id as id_tecnologico',
        's.email_contact')
        ->get();
        $tecnologico = Tecnologico::all();
        return view('admin.servicios.index',['service' => $service, 'tecnologico' => $tecnologico]);
    }

    public function servicios_create(Request $request) {
        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->d;
        $service->email_contact = $request->email;
        $service->id_tecnologico = $request->tec;
        $service->save();
        return response()->json(['success' => true]);
    }

    public function servicios_update(Request $request, $id){
        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->description = $request->dedit;
        $service->email_contact = $request->email;
        $service->id_tecnologico = $request->tec;
        $service->save();
        return response()->json(['success' => true]);
    }
    public function servicios_delete($id){
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['success' => true]);
    }

    public function posgrados(){
        $tecnologico = Tecnologico::all();
        $program = DB::table('programs as p')
                ->join('tecnologicos as t', 'p.id_tecnologico', '=', 't.id')
                ->select('p.id as id_program','p.name as programa', 'p.description','p.type', 'p.url', 't.id as id_tecnologico', 't.name as tecnologico')
                ->get();
        return view('admin.posgrados.index',['tecnologico' => $tecnologico, 'program' => $program]);
    }
    public function posgrados_create(Request $request){
        $program = new Program;
        $program->name = $request->name;
        $program->description = $request->description;
        $program->type = $request->type;
        $program->url = $request->url;
        $program->id_tecnologico = $request->tec;
        $program->save();
        return response()->json(['success' => true]);

    }
    public function posgrados_update(Request $request, $id){
        $program = Program::findOrFail($id);
        $program->name = $request->name;
        $program->description = $request->description;
        $program->type = $request->type;
        $program->url = $request->url;
        $program->id_tecnologico = $request->tec;
        $program->save();
        return response()->json(['success' => true]);
    }
    public function posgrados_delete($id){
        $program = Program::findOrFail($id);
        $program->delete();
        return response()->json(['success' => true]);
    }

    public function investigadores(){
        $tecnologico = Tecnologico::all();
        $research = DB::table('researchers as r')
        ->join('tecnologicos as t', 'r.id_tecnologico', '=', 't.id')
        ->select('r.id','r.name as nombre', 'r.grade','r.specialization', 'r.investigation', 'r.cv','r.image','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        return view('admin.investigacion.investigadores.index')->with(['tecnologico' => $tecnologico, 'research' => $research]);
    }
    public function investigadores_create(Request $request){
        $inv = new Researcher;
        $inv->name = $request->name;
        $inv->grade = $request->grade;
        $inv->specialization = $request->especialidad;
        $inv->investigation = $request->investigacion;
        $inv->cv = $request->cv;
        $inv->id_tecnologico = $request->tec;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            $file_attached = 'Investigador_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/investigadores';
            $attached->move($path,$file_attached);
            $inv->image = $file_attached;
        }
        $inv->save();
        return response()->json(['success' => true]);
    }
    public function investigadores_update(Request $request, $id){
        $inv = Researcher::findOrFail($id);
        $inv->name = $request->name;
        $inv->grade = $request->grade;
        $inv->specialization = $request->especialidad;
        $inv->investigation = $request->investigacion;
        $inv->cv = $request->cv;
        $inv->id_tecnologico = $request->tec;

        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($inv->image) {
                $previous_image_path = public_path('pictures/admin/investigadores/' . $inv->image);
                if (file_exists($previous_image_path)) {
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Investigador_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/investigadores';
            $attached->move($path,$file_attached);
            $inv->image = $file_attached;
        }
        $inv->save();
        return response()->json(['success' => true]);

    }
    public function investigadores_delete($id){
        $research = Researcher::findOrFail($id);
        if ($research->image) {
            $previous_image_path = public_path('pictures/admin/investigadores/' . $research->image);
            if (file_exists($previous_image_path)) {
                unlink($previous_image_path);
            }
        }
        $research->delete();
        return response()->json(['success' => true]);
    }

    public function investigacion(){
        $research = DB::table('research as r')
        ->join('tecnologicos as t', 'r.id_tecnologico', '=', 't.id')
        ->select('r.id','r.title', 'r.description','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        $tecnologico = Tecnologico::all();

        return view('admin.investigacion.lineas.index')->with(['tecnologico' => $tecnologico,
            'research' => $research]);
    }
    public function investigacion_create(Request $request){
        $research = new Investigation;
        $research->title = $request->name;
        $research->description = $request->description;
        $research->id_tecnologico = $request->tec;
        $research->save();
        return response()->json(['success' => true]);
    }
    public function investigacion_update(Request $request, $id){
        $research = Investigation::findOrFail($id);
        $research->title = $request->name;
        $research->description = $request->description;
        $research->id_tecnologico = $request->tec;
        $research->save();
        return response()->json(['success' => true]);
    }
    public function investigacion_delete($id){
        $research = Investigation::findOrFail($id);
        $research->delete();
        return response()->json(['success' => true]);
    }
    public function articulos(){
        $tecnologico = Tecnologico::all();
        $article = DB::table('articles as a')
        ->join('tecnologicos as t', 'a.id_tecnologico', '=', 't.id')
        ->select('a.id','a.name', 'a.type','a.cita','a.date','a.link','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        return view('admin.investigacion.articulos.index')->with(['tecnologico' => $tecnologico, 'article' => $article]);
    }
    public function articulos_create(Request $request){
        $article = new Article;
        $article->name = $request->name;
        $article->type = $request->type;
        $article->cita = $request->cita;
        $article->date = $request->fecha;
        $article->link = $request->link;
        $article->id_tecnologico = $request->tec;
        $article->save();
        return response()->json(['success' => true]);
    }
    public function articulos_update(Request $request, $id){
        $article = Article::findOrFail($id);
        $article->name = $request->name;
        $article->type = $request->type;
        $article->cita = $request->cita;
        $article->date = $request->fecha;
        $article->link = $request->link;
        $article->id_tecnologico = $request->tec;
        $article->save();
        return response()->json(['success' => true]);

    }
    public function articulos_delete($id){
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(['success' => true]);

    }

    public function proyectos(){
        $tecnologico = Tecnologico::all();
        $project = DB::table('projects as p')
        ->join('tecnologicos as t', 'p.id_tecnologico', '=', 't.id')
        ->select('p.id','p.name', 'p.responsables','p.financiamiento','p.vigencia','p.link','t.id as id_tecnologico', 't.name as tecnologico')
        ->get();
        return view('admin.investigacion.proyectos.index')->with(['tecnologico' => $tecnologico, 'project' => $project]);
    }
    public function proyectos_create(Request $request){
        $project = new Project;
        $project->name = $request->name;
        $project->responsables = $request->responsables;
        $project->financiamiento = $request->financiamiento;
        $project->vigencia = $request->vigencia;
        $project->link = $request->link;
        $project->id_tecnologico = $request->tec;
        $project->save();
        return response()->json(['success' => true]);
    }
    public function proyectos_update(Request $request, $id){
        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->responsables = $request->responsables;
        $project->financiamiento = $request->financiamiento;
        $project->vigencia = $request->vigencia;
        $project->link = $request->link;
        $project->id_tecnologico = $request->tec;
        $project->save();
        return response()->json(['success' => true]);
    }
    public function proyectos_delete($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['success' => true]);
    }

    public function instituciones(){
        $institucion = Institution::all();
        return view('admin.vinculacion.nacional.instituciones.index',['institucion'=>$institucion]);
    }
    public function instituciones_create(Request $request){
        $institucion = new Institution;
        $institucion->name = $request->name;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            $file_attached = 'Institucion_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/institucion';
            $attached->move($path,$file_attached);
            $institucion->logo = $file_attached;
        }
        $institucion->save();
        return response()->json(['success' => true]);
    }
    public function instituciones_update(Request $request, $id){
        $institucion = Institution::findOrFail($id);
        $institucion->name = $request->name;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($institucion->logo) {
                $previous_image_path = public_path('pictures/admin/institucion/' . $institucion->logo);
                if (file_exists($previous_image_path)) {
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Institucion_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/institucion';
            $attached->move($path,$file_attached);
            $institucion->logo = $file_attached;
        }
        $institucion->save();
        return response()->json(['success' => true]);
    }
    public function instituciones_delete($id){
        $institucion = Institution::findOrFail($id);
        if ($institucion->logo) {
            $previous_image_path = public_path('pictures/admin/institucion/' . $institucion->logo);
            if (file_exists($previous_image_path)) {
                unlink($previous_image_path);
            }
        }
        $institucion->delete();
        return response()->json(['success' => true]);
    }

    public function dependencias(){
        $dependencia = Dependency::all();
        return view('admin.vinculacion.nacional.dependencias.index',['dependencia'=>$dependencia]);
    }
    public function dependencias_create(Request $request){
        $dependencia = new Dependency;
        $dependencia->name = $request->name;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            $file_attached = 'Dependencia_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/dependencia';
            $attached->move($path,$file_attached);
            $dependencia->logo = $file_attached;
        }
        $dependencia->save();
        return response()->json(['success' => true]);
    }
    public function dependencias_update(Request $request, $id){
        $dependencia = Dependency::findOrFail($id);
        $dependencia->name = $request->name;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($dependencia->logo) {
                $previous_image_path = public_path('pictures/admin/dependencia/' . $dependencia->logo);
                if (file_exists($previous_image_path)) {
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Dependencia_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/dependencia';
            $attached->move($path,$file_attached);
            $dependencia->logo = $file_attached;
        }
        $dependencia->save();
        return response()->json(['success' => true]);
    }
    public function dependencias_delete($id){
        $dependencia = Dependency::findOrFail($id);
        if ($dependencia->logo) {
            $previous_image_path = public_path('pictures/admin/dependencia/' . $dependencia->logo);
            if (file_exists($previous_image_path)) {
                unlink($previous_image_path);
            }
        }
        $dependencia->delete();
        return response()->json(['success' => true]);
    }

    public function internacional(){
        $institucion = International::all();
        return view('admin.vinculacion.internacional.index',['institucion'=>$institucion]);
    }
    public function internacional_create(Request $request){
        $institucion = new International;
        $institucion->name = $request->name;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            $file_attached = 'Internacional_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/internacional';
            $attached->move($path,$file_attached);
            $institucion->logo = $file_attached;
        }
        $institucion->save();
        return response()->json(['success' => true]);
    }
    public function internacional_update(Request $request, $id){
        $institucion = International::findOrFail($id);
        $institucion->name = $request->name;
        $attached = $request->file("image");

        // Verificar si se ha proporcionado un archivo
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($institucion->logo) {
                $previous_image_path = public_path('pictures/admin/internacional/' . $institucion->logo);
                if (file_exists($previous_image_path)) {
                    unlink($previous_image_path);
                }
            }
            $file_attached = 'Internacional_'.time().'.'.$attached->extension();
            $path = public_path().'/pictures/admin/internacional';
            $attached->move($path,$file_attached);
            $institucion->logo = $file_attached;
        }
        $institucion->save();
        return response()->json(['success' => true]);
    }
    public function internacional_delete($id){
        $institucion = International::findOrFail($id);
        if ($institucion->logo) {
            $previous_image_path = public_path('pictures/admin/internacional/' . $institucion->logo);
            if (file_exists($previous_image_path)) {
                unlink($previous_image_path);
            }
        }
        $institucion->delete();
        return response()->json(['success' => true]);
    }

    public function registro(){
        $registro = Congress::all();
        $json = public_path('json/countries.json');
        $jsonData = File::exists($json) ? File::get($json) : '[]';
        $countries = json_decode($jsonData, true);
        return view('admin.registro.index',['registro'=>$registro, 'countries'=>$countries]);
    }
    public function registro_delete($id){
        $registro = Congress::findOrFail($id);
        $registro->delete();
        return response()->json(['success' => true]);
    }

    public function registro_update(Request $request, $id){
        $registro = Congress::findOrFail($id);
        $registro->name = $request->name;
        $registro->lastname = $request->lastname;
        $registro->nacionality = $request->nacionality;
        $registro->age = $request->age;
        $registro->gender = $request->gender;
        $registro->email = $request->email;
        $registro->phone = $request->phone;
        $registro->institution = $request->institution;
        $registro->position = $request->position;
        $registro->faculty = $request->faculty;
        $registro->country = $request->country;
        $registro->letter = $request->letter;
        $registro->participation = $request->participation;
        $registro->presentation = $request->presentation;
        $registro->area = $request->area;
        $registro->proof = $request->proof;
        $registro->food = $request->food;
        if($request->language == 'Otro'){
            $registro->language = $request->other_language;
        }else{
            $registro->language = $request->language;
        }
        $registro->invoice = $request->invoice;
        if($request->invoice == 1){
            $registro->billingName = $request->billingName;
            $registro->rfc = $request->rfc;
            $registro->billingAddress = $request->billingAddress;
            $registro->billingEmail = $request->billingEmail;
        }
        $registro->consent = $request->consent;
        $registro->record = $request->record;
        $registro->save();

        return response()->json(['success' => true]);
    }

    public function registro_directivos(){
        $registro = Directivo::all();
        $json = public_path('json/countries.json');
        $jsonData = File::exists($json) ? File::get($json) : '[]';
        $countries = json_decode($jsonData, true);
        return view('admin.directivos.index',['registro'=>$registro, 'countries'=>$countries]);
    }
    public function registro_directivos_delete($id){
        $registro = Directivo::findOrFail($id);
        $registro->delete();
        return response()->json(['success' => true]);
    }

    public function registro_directivos_update(Request $request, $id){
        $registro = Directivo::findOrFail($id);
        $registro->name = $request->name;
        $registro->lastname = $request->lastname;
        $registro->nacionality = $request->nacionality;
        $registro->age = $request->age;
        $registro->gender = $request->gender;
        $registro->email = $request->email;
        $registro->phone = $request->phone;
        $registro->institution = $request->institution;
        $registro->position = $request->position;
        $registro->country = $request->country;
        $registro->letter = $request->letter;
        $registro->modality = $request->modality;
        $registro->logistics = $request->logistics;
        $registro->food = $request->food;
        $registro->invoice = $request->invoice;
        if($request->invoice == 1){
            $registro->billingName = $request->billingName;
            $registro->rfc = $request->rfc;
            $registro->billingAddress = $request->billingAddress;
            $registro->billingEmail = $request->billingEmail;
        }
        $registro->consent = $request->consent;
        $registro->record = $request->record;
        $registro->save();

        return response()->json(['success' => true]);
    }




}
