<?php

namespace App\Exports;

use App\Models\Congress;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CongressExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {


        return Congress::all()->map(function ($congress) {

            $participation = [
                '1' => 'Asistente',
                '2' => 'Ponente Oral',
                '3' => 'Presentación de Cartel',
                '4' => 'Taller y Sesión Paralela',
            ];

            $modality = [
                '1' => 'Presencial',
                '2' => 'Virtual',
                '3' => 'Híbrida',
            ];
            $logistics = [
                '1' => 'Sí',
                '0' => 'No',
            ];

            return [
                'Nombre' => $congress->name,
                'Apellidos' => $congress->lastname,
                'Correo Electrónico' => $congress->email,
                'Teléfono' => $congress->phone,
                'Institución' => $congress->institution,
                'Tipo de Participación' => $participation[$congress->participation] ?? 'Desconocido',
                'Título de la Ponencia' => $congress->presentation,
                'Área Temática' => $congress->area,
                'Modalidad de Asistencia' => $modality[$congress->modality] ?? 'Desconocido',
                '¿Requiere apoyo de hospedaje?' => $logistics[$congress->logistics] ?? 'Desconocido',
                '¿Tiene alguna restricción alimentaria o necesidad especial?' => $congress->food ?? 'No especificado',
                'Idioma Preferido' => $congress->language ?? 'Desconocido',
            ];
        });
    }

    public function headings(): array
    {
        return ['Nombre', 'Apellidos', 'Correo Electrónico', 'Teléfono', 'Institución', 'Tipo de Participación', 'Título de la Ponencia', 'Área Temática', 'Modalidad de Asistencia', '¿Requiere apoyo de hospedaje?', '¿Tiene alguna restricción alimentaria o necesidad especial?', 'Idioma Preferido'];
    }
}
