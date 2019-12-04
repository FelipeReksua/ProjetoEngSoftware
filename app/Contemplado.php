<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contemplado extends Model
{
	protected $table = 'contemplado';
    protected $fillable = [
        'pessoa_id',
        'data',
        'beneficio'
    ];

    public function pessoa()
    {
        return $this->belongsTo('App\Pessoa', 'pessoa_id');
    }
}
