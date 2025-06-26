<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directivo extends Model
{
    use HasFactory;
    protected $table = 'directivos';
    protected $fillable = [
        'name',
        'lastname',
        'nacionality',
        'age',
        'gender',
        'email',
        'phone',
        'institution',
        'position',
        'country',
        'letter',
        'modality',
        'logistics',
        'food',
        'invoice',
        'billingName',
        'rfc',
        'billingAddress',
        'billingEmail',
        'consent',
        'record'
    ];
}
