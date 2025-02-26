<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade',
        'specialization',
        'investigation',
        'cv',
        'image',
        'id_tecnologico',
    ];
}
