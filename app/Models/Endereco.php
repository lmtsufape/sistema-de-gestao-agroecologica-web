<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Authenticatable
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
        'bairro' => 'required',
        'cep' => 'required|numeric'
        'nome_rua' => 'required',
        'numero_casa' => 'required|numeric',
        'descricao' => 'required',
        'ponto_referencia' => 'required',
    ];
}
