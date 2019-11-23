<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'city',
        'state',
        'employee',
        'job_title',
        'cpf',
        'phone',
        'childrens',  
        'social_project',
        'renda',
        'pontos',
        'contemplado'
    ];
}
