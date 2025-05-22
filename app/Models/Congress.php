<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congress extends Model
{
    use HasFactory;

    protected $table = 'congresses';
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
        'faculty',
        'country',
        'letter',
        'participation',
        'presentation',
        'area',
        'proof',
        'modality',
        'logistics',
        'food',
        'language',
        'invoice',
        'billingName',
        'rfc',
        'billingAddress',
        'billingEmail',
        'consent',
        'record'
    ];
}
