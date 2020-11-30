<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendamentoReuniao extends Model
{
    public static $rules = [
        'nome' => 'required|min:5',
        'data' => 'required',
        'local' => 'required',
    ];

    public function reuniaoRegistrada(){
        return $this->hasOne('App\Models\Reuniao', 'id_agendamento' , 'id');
    }
}
