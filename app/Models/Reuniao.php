<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $fillable = [
        'nome',
        'data',
        'local',
        'participantes',
        'ata',
    ];

    public static $rules = [
        'nome' => 'required|min:5',
        'data' => 'required',
        'local' => 'required',
        'participantes' => 'required',
        'ata' => 'required',
    ];

    public function agendamentoReuniao(){
        return $this->belongsTo('App.Models.AgendamentoReuniao');
    }

    public function fotosReuniao(){
        return $this->hasMany('\App\Models\FotosReuniao', 'reuniao_id', 'id');
    }
}
