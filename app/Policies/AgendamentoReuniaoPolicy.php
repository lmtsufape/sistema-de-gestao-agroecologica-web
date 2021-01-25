<?php

namespace App\Policies;

use App\Models\AgendamentoReuniao;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgendamentoReuniaoPolicy
{
    use HandlesAuthorization;


    public function agendar(AgendamentoReuniao $agendamento){
      return \Auth::user()->tipo_perfil == 'Coordenador';
    }

    public function verAgendamento(AgendamentoReuniao $agendamento){
      return \Auth::user()->tipo_perfil == 'Produtor';
    }
}
