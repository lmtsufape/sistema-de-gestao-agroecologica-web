<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'estado',
        'cidade',
        'bairro',
        'cep',
        'nome_rua',
        'numero_casa',
        'descricao',
        'ponto_referencia',
    ];


    public static $regras_validacao = [
        'estado' => 'required',
        'cidade' => 'required',
        'cep' => 'required|numeric',
        'ponto_referencia' => 'required',
    ];
}
