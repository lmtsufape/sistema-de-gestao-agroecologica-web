<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanteiroDeProducao extends Model
{
    public $timestamps = false;
    protected $table = 'canteirodeproducaos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tamanho',
        'localizacao',
    ];


    public static $regras_validacao_criar = [
        'tamanho' => 'required|max:20',
        'localizacao' => 'required|max:191',
    ];


	public function propriedade() {
		return $this->belongsTo('App\Models\Propriedade', 'id', 'id_propriedade');
	}

    /*
    public function producoes() {
        return $this->hasMany('App\Models\Producao', 'id', 'id_propriedade');
    }
    */


}
