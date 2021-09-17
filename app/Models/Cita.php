<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'date' => 'required'
    ];

    protected $fillable = [
        'title', 'descripcion', 'date'
    ];
}
