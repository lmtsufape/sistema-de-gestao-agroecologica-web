<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $fillable = [
        'participantes',
        'ata',
    ];

    public static $rules = [
        'participantes' => 'required',
        'ata' => 'required',
    ];

    public function agendamentoReuniao(){
        return $this->belongsTo('App\Models\AgendamentoReuniao');
    }

    public function fotosReuniao(){
        return $this->hasMany('\App\Models\FotosReuniao', 'id_reuniao', 'id');
    }

    public function retificacao(){
        return $this->hasMany('\App\Models\Retificacao', 'id_reuniao', 'id');
    }
}
