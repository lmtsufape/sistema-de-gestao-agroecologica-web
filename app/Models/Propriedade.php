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


	public function produtor() {
		return $this->belongsTo('App\Models\User', 'id', 'id_produtor');
	}

    public function canteirodeproducaos() {
        return $this->hasMany('App\Models\CanteiroDeProducao', 'id');
    }

    /*
    public function producoes() {
        return $this->hasMany('App\Models\Producao', 'id', 'id_propriedade');
    }
    */


}
