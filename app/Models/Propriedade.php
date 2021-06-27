<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tamanho_total',
        'fonte_de_agua',
    ];

    public static $regras_validacao_criar = [
        'tamanho_total' => 'required|max:20',
        'fonte_de_agua' => 'required|max:20',
    ];

    public static $regras_validacao_api = [
        'tamanho_total' => 'required|integer',
        'fonte_de_agua' => 'bail|required|max:200',
    ];


	public function produtor() {
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

    public function canteirodeproducaos() {
        return $this->hasMany('App\Models\CanteiroDeProducao', 'propriedade_id', 'id');
    }

    public function endereco(){
        return $this->hasOne('\App\Models\Endereco', 'id', 'endereco_id');
    }

    public function fotoMapa(){
        return $this->hasOne('App\Models\FotoMapa','id','fotoMapa_id');
    }

    /*
    public function producoes() {
        return $this->hasMany('App\Models\Producao', 'id', 'id_propriedade');
    }
    */


}
