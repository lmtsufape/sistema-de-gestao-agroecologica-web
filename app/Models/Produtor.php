<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Produtor extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data_nascimento',
        'cpf',
        'rg',
        'nome_conjugue',
        'nome_filhos',
        'primeiro_acesso',
        'perfil_coordenador',
    ];

    public function dataFormatada(){
        $time = strtotime($this->data_nascimento);
        return date('d/m/Y', $time);
    }

    public static $regras_validacao_criar_produtor = [
        'cpf' => 'required|numeric|unique:produtors,cpf',
    ];

    public static $regras_validacao_criar_coordenador = [
        'cpf' => 'required|numeric|unique:produtors,cpf',
        'perfil_coordenador' => 'required',
    ];

    public static $regras_validacao_primeiro_acesso = [
        'rg' => 'required|numeric|unique:produtors,rg',
        'data_nascimento' => 'required',
        'nome_conjugue' => 'nullable|max:255',
        'nome_filhos'=> 'nullable',
    ];

    public static $regras_validacao_editar = [
        'data_nascimento' => 'required',
        'nome_conjugue' => 'nullable|max:255',
        'nome_filhos'=> 'nullable',
    ];


	// Ocs que o produtor participa
	public function ocs() {
		return $this->belongsTo('App\Models\Ocs', 'ocs_id');
	}

  public function user() {
      return $this->hasOne('\App\Models\User', 'id', 'user_id');
  }


  public function propriedade() {
      return $this->hasOne('\App\Models\Propriedade', 'user_id', 'id');
  }

}
