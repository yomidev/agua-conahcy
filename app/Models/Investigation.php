<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;
    protected $table = 'research';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description','id_tecnologico'];
}
