<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = ['nome', 'descricao', 'url_foto', 'url_video', 'latitude', 'longitude', 'tipo'];
}
