<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'telefone',
        'tipo_perfil',
        'email',
        'password',
        'email2',
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


    public static $regras_validacao_criar_associacao = [
        'nome' => 'required|max:255',
        'telefone' => 'required',
        'email' => 'required|min:14|max:14||unique:users,email',
        'password' => 'required|max:255|min:6',
        'email2' => 'nullable|max:255|unique:users,email2'
    ];

    public static $regras_validacao_criar_produtor = [
        'nome' => 'required|max:255',
        'email' => 'required|min:11|max:11|unique:users,email',
    ];

    public static $regras_validacao_primeiro_acesso = [
        'nome' => 'required|max:255',
        'telefone' => 'required',
        'email2' => 'nullable|max:255|unique:users,email2',
        'password' => 'required|max:255|min:6',
    ];

    public static $regras_validacao_editar = [
        'nome' => 'required|max:255',
        'telefone' => 'required',
    ];

    public static $regras_validacao_senha = [
        'password' => 'required|max:255|min:6',
    ];



	// Ocs que o produtor participa
	public function associacao() {
		return $this->belongsTo('App\Models\Associacao', 'id', 'user_id');
	}

  public function produtor() {
		return $this->belongsTo('App\Models\Produtor', 'id', 'user_id');
	}

  public function endereco() {
      return $this->hasOne('\App\Models\Endereco', 'id', 'endereco_id');
  }


}
