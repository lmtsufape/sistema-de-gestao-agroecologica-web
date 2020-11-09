<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosReuniao extends Model
{
    public function reuniao(){
        return $this->belongsTo('App.Models.Reuniao');
    }
}
