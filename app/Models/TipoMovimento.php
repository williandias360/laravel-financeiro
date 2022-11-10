<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimento extends Model
{
    use HasFactory;

    protected $table = "TipoMovimento";

    protected $fillable = [
        "Descricao",
        "Tipo"
    ];

    public function movimento()
    {
        return $this->hasMany(Movimento::class);
    }
}
