<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'rg',
        'telefone',
        'tipo_perfil',
        'nome_conjugue',
        'nome_filhos',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dataFormatada(){
        $time = strtotime($this->data_nascimento);
        return date('d/m/Y', $time);
    }


    public static $regras_validacao_criar = [
        'nome' => 'required|max:255',
        'data_nascimento' => 'required',
        'cpf' => 'required|numeric|unique:users,cpf',
        'rg' => 'required|numeric|unique:users,rg',
        'telefone' => 'required',
        'nome_conjugue' => 'nullable|max:255',
        'nome_filhos'=> 'nullable',
        'email' => 'required|max:255|unique:users,email',
        'password' => 'required|max:255|min:6',
    ];

    public static $regras_validacao_editar = [
        'nome' => 'required|max:255',
        'data_nascimento' => 'required',
        'telefone' => 'required',
        'nome_conjugue' => 'nullable|max:255',
        'nome_filhos'=> 'nullable',
    ];


	// Ocs que o produtor participa
	public function ocs() {
		return $this->belongsTo('App\Models\Ocs', 'ocs_id');
	}

    public function endereco() {
        return $this->hasOne('\App\Models\Endereco', 'id', 'endereco_id');
    }

    public function propriedade() {
        //return Propriedade::find('id_propriedade');
        //return Propriedade::where('id', '=', 'id_propriedade')->get();
        return $this->hasOne('\App\Models\Propriedade', 'user_id', 'id');
    }

}
