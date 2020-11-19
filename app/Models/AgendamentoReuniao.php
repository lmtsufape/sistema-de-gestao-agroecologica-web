<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendamentoReuniao extends Model
{
    public function reuniao(){
        return $this->hasOne('App.Models.Reuniao');
    }
}
