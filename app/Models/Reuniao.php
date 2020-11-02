<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $fillable = [
        'nome',
        'data',
        'participantes',
        'descricao',
    ];

    public static $rules = [
        'nome' => 'required|min:5',
        //'data' => 'required',
        'participantes' => 'required',
        'descricao' => 'required',
    ];
}
