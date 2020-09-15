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
        'nome_conjugue',
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


    public static $regras_validacao_criar = [
        'nome' => 'required|max:255',
        'data_nascimento' => 'required',
        'cpf' => 'required|numeric',
        'rg' => 'required|numeric',
        'telefone' => 'required',
        'tipo_perfil' => 'required|min:5|max:11'
        'nome_conjugue' => 'nullable|max:255',
        'nome_filhos'=> 'nullable'
        'email' => 'required|max:255',
        'password' => 'required|max:255|min:6',
    ];


	// Ocs que o produtor participa
	public function ocs() {
		return $this->belongsTo('App\Models\Ocs', 'id', 'id_ocs');
	}



    public function endereco() {
        return $this->hasOne('\App\Models\Endereco', 'id', 'id_endereco');
    }

}
