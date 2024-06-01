<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentosConta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'descricao',
        'valorPagamento',
        'dataPagamento',
    ];

}
