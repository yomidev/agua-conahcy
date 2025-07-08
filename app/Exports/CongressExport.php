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

            return [
                'Nombre' => $congress->name,
                'Apellidos' => $congress->lastname,
                'Correo Electrónico' => $congress->email,
                'Institución' => $congress->institution,
                'Tipo de Participación' => $participation[$congress->participation] ?? 'Desconocido',
                'Título de la Ponencia' => $congress->presentation,
                'Área Temática' => $congress->area,
            ];
        });
    }

    public function headings(): array
    {
        return ['Nombre', 'Apellidos', 'Correo Electrónico', 'Institución', 'Tipo de Participación', 'Título de la Ponencia', 'Área Temática'];
    }
}
