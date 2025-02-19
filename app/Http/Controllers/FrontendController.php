<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tecnologico;
use Carbon\Carbon;
use App\Models\Institution;
use App\Models\International;
use App\Models\Dependency;

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
        $startDate = Carbon::now();
        $endDate = Carbon::create(2025,9,25,0,0,0);
        return view('congreso',['title'=>$title, 'startDate' => $startDate, 'endDate' => $endDate]);
    }
}
