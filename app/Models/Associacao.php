<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Associacao extends Authenticatable
{
  #LEMBRA Q ISSO TEM SENHAAAAAAA

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'nome_entidade',
        'telefone',
        'fax',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static $regras_validacao_criar = [
        'cnpj' => 'required|max:20|unique:associacaos,cnpj',
        'nome_entidade' => 'required|max:255',
        'telefone' => 'required|numeric|min:10',
        'fax' => 'max:255',
        'email' => 'max:255',
    ];

    public static $regras_validacao_editar = [
        'nome_entidade' => 'required|max:255',
        'telefone' => 'required|numeric|min:10',
        'fax' => 'max:255',
        'email' => 'max:255',
    ];

    public function endereco() {
        return $this->hasOne('\App\Models\Endereco', 'id', 'endereco_id');
    }

    public function ocs(){
        return $this->hasMany('App\Models\Ocs', 'associacao_id');
    }

}
