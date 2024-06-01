<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuplicatasaReceber extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'valorMovimento',
        'dataMovimento',
        //'tipoMovimento',
        'statusDuplicatas',
        'idVenda',
    ];
}
