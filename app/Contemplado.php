<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contemplado extends Model
{
    protected $fillable = [
        'pessoa_id',
        'data',
        'beneficio'
    ];
}
