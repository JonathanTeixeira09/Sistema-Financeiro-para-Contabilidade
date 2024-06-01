<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'categoriaProduto',
        'statusEstoque',
        'nomeProduto',
        'idCompra',
        'idVenda',
    ];
}
