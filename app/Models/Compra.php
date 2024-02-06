<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'nome_cliente',
        'valor_total',
        'data_compra',
    ];

    // Relacionamento com o modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Atributo mutável para obter o nome do cliente
    public function getNomeClienteAttribute()
    {
        return $this->cliente ? $this->cliente->nome : null;
    }

    // Mutator para processar o cliente_id antes de salvar
    public function setClienteIdAttribute($value)
    {
        $this->attributes['cliente_id'] = $value;

        // Adicione lógica para associar a compra ao cliente correspondente
        $cliente = Cliente::find($value);
        if ($cliente) {
            $this->cliente()->associate($cliente);

            // Armazena o nome do cliente na compra
            $this->attributes['nome_cliente'] = $cliente->nome;
        }
    }
}

