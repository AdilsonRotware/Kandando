<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
        'qrcode',  // Certifique-se de que está correto aqui
    ];

    // Relacionamento com as compras do cliente
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}
