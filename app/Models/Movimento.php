<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $table = "Movimento";

    protected $fillable = [
        "Descricao",
        "Valor",
        "DataMovimento"
    ];

    public function tipoMovimento()
    {
        return $this->hasOne(TipoMovimento::class);
    }
}
