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
        'orgao_fiscalizador',
    ];


    public static $regras_validacao_criar = [
        'nome_ocs' => 'required|max:255',
        'orgao_fiscalizador' => 'required|max:255',
    ];

    public static $regras_validacao_editar = [
        'nome_ocs' => 'required|max:255',
        'orgao_fiscalizador' => 'required|max:255',
    ];


    public function associacao() {
  		return $this->belongsTo('App\Models\Associacao', 'associacao_id');
  	}

    public function produtor(){
        return $this->hasMany('App\Models\User', 'ocs_id');
    }

    public function agendamentoReuniao(){
        return $this->hasMany('App\Models\AgendamentoReuniao', 'ocs_id', 'id'); // foreign_key e local_key
    }

}
