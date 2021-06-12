<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoMapa extends Model
{
    public function propriedade(){
        return $this->belongsTo('App.Models.Propriedade');
    }
}
