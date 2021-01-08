<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Producao extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'observacoes',
        'tipo_producao',
        'lista_produtos',
        'lista_produtos_exteriores_beneficiado',
        'data_inicio',
    ];

    public static $regras_validacao_criar = [
        'lista_produtos' => 'required',
        'data_inicio' => 'required',
    ];


    public function canteirodeproducaos() {
        return $this->belongsTo('App\Models\CanteiroDeProducao', 'canteirodeproducao_id', 'id');
    }

    public function dataInicioFormatada(){
        $time = strtotime($this->data_inicio);
        return date('d / m / Y', $time);
    }

    public function lista_produtos(){
        $idsprodutos = explode(',', $this->lista_produtos);
        $prds = [];
        foreach ($idsprodutos as $ids) {
            $man = Produto::find($ids);
            if($man){
                array_push($prds, $man);
            }
        }
        return $prds;
    }



}
