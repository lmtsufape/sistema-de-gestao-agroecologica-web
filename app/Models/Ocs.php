<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ocs extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'nome_entidade',
        'telefone',
        'celular',
        'fax',
        'email',
        'nome_para_contato',
        'orgao_fiscalizador',
        'unidade_federacao',
    ];


    public static $regras_validacao_criar = [
        'cnpj' => 'required|max:20',
        'nome_entidade' => 'required|max:255',
        'telefone' => 'required|numeric|min:10',
        'celular' => 'numeric|min:10',
        'fax' => 'max:255',
        'email' => 'max:255',
        'nome_para_contato' => 'required|max:255',
        'orgao_fiscalizador' => 'required|max:255',
        'unidade_federacao' => 'required|min:2|max:2',
    ];


	public function coordenador() {
		return $this->belongsTo('App\Models\User', 'id', 'id_coordenador');
	}

    public function endereco() {
        return $this->hasOne('\App\Models\Endereco', 'id', 'id_endereco');
    }

    public function produtor(){
        return $this->hasMany('App\Models\User');
    }

}
