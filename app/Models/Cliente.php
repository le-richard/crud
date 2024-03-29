<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome','data_nascimento','sexo','cep','endereco',
                            'numero','complemento','bairro','estado','cidade'];
}
