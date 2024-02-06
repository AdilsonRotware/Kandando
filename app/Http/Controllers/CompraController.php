<?php

// app/Http/Controllers/CompraController.php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::all();
        return view('compras.index', compact('compras'));
    }

    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compras.show', compact('compra'));
    }

    public function create()
    {
        // Carregue a lista de clientes para ser usada no formulário
        $clientes = Cliente::all();
        return view('compras.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cliente_id' => 'required|exists:clientes,id',
            'valor_total' => 'required|numeric',
            'data_compra' => 'required|date',
            'litros_adquiridos' => 'required|numeric',
            'modo_pagamento' => 'required|in:dinheiro,cartao',
        ], [
            'cliente_id.required' => 'O campo Cliente é obrigatório.',
            'cliente_id.exists' => 'O cliente selecionado não foi encontrado no nosso armazenamento.',
            'valor_total.required' => 'O campo Valor Total é obrigatório.',
            'valor_total.numeric' => 'O campo Valor Total deve ser numérico.',
            'data_compra.required' => 'O campo Data da Compra é obrigatório.',
            'data_compra.date' => 'O campo Data da Compra deve ser uma data válida.',
            'litros_adquiridos.required' => 'O campo Quantidade de Litros Adquiridos é obrigatório.',
            'litros_adquiridos.numeric' => 'O campo Quantidade de Litros Adquiridos deve ser numérico.',
            'modo_pagamento.required' => 'O campo Modo de Pagamento é obrigatório.',
            'modo_pagamento.in' => 'O campo Modo de Pagamento deve ser "dinheiro" ou "cartao".',
        ]);

        // Busca o cliente
        $cliente = Cliente::find($request->input('cliente_id'));

        if (!$cliente) {
            return redirect()->back()->withErrors(['error' => 'Cliente não encontrado no nosso armazenamento']);
        }

        try {
            // Criação da nova compra
            $compra = Compra::create([
                'cliente_id' => $cliente->id,
                'nome_cliente' => $cliente->nome, // Adiciona o nome do cliente ao criar a compra
                'valor_total' => $request->input('valor_total'),
                'data_compra' => $request->input('data_compra'),
                'litros_adquiridos' => $request->input('litros_adquiridos'),
                'modo_pagamento' => $request->input('modo_pagamento'),
            ]);

            // Redirecionamento com mensagem de sucesso
            return redirect()->route('compras.show', $compra->id)->with('success', 'Compra criada com sucesso!');
        } catch (\Exception $e) {
            // Log do erro
            logger()->error('Erro ao criar a compra: ' . $e->getMessage());

            // Redirecionamento com mensagem de erro
            return redirect()->back()->withErrors(['error' => 'Erro ao criar a compra.']);
        }
    }

    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compras.edit', compact('compra'));
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->update($request->all());
        return redirect()->route('compras.show', $compra->id);
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
