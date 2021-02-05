<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Ocs extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_ocs',
    ];


    public static $regras_validacao_criar = [
        'nome_ocs' => 'required|max:255',
    ];

    public static $regras_validacao_editar = [
        'nome_ocs' => 'required|max:255',
    ];


    public function associacao() {
  		return $this->belongsTo('App\Models\Associacao');
  	}

    public function produtor(){
        return $this->hasMany('App\Models\Produtor', 'ocs_id');
    }

    public function coordenador(){
      foreach ($this->produtor as $prod) {
        if($prod->user->tipo_perfil == 'Coordenador'){
          return true;
        }
      }
      return false;
    }

    public function agendamentoReuniao(){
        return $this->hasMany('App\Models\AgendamentoReuniao', 'ocs_id', 'id'); // foreign_key e local_key
    }

}
