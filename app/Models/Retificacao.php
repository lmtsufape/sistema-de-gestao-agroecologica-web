<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retificacao extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'retificacao',
        'data',
    ];

    public static $regras_validacao = [
        'retificacao' => 'required',
    ];

    public function dataFormatada(){
        $time = strtotime($this->data);
        return date('d/m/Y', $time);
    }

    public function reuniao(){
        return $this->belongsTo('App\Models\Reuniao', 'id');
    }

}
