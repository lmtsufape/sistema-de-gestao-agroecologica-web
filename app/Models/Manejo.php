<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manejo extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_tecnica',
        'manejo',
        'observacoes',
        'tipo_manejo',
        'tratamento_residuos',
        'destino_residuos',
    ];

    public static $regras_validacao_criar = [
        'nome_tecnica' => 'required|max:191',
        'manejo' => 'required',
        'tipo_manejo'  => 'required',
    ];

}
