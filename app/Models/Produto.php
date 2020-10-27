<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manejo;

class Produto extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'tipo',
        'produz_leite',
        'classe_planta',
        'tratamento_residuos',
        'destino_residuos',
        'utilizacao_animal',
        'ids_manejos',
    ];

    public static $regras_validacao_criar = [
        'nome', 'required',
    ];

    public function manejos(){
        $idsmanejos = explode(',', $this->ids_manejos);
        $manejos = [];
        foreach ($idsmanejos as $ids) {
            $man = Manejo::find($ids);
            if($man){
                array_push($manejos, $man);
            }
        }
        return $manejos;
    }



}
