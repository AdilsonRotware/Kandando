<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:clientes',
            'telefone' => 'required|string',
            'endereco' => 'required|string',
        ]);

        // Verifica se o cliente com o mesmo e-mail já existe
        $existingCliente = Cliente::where('email', $request->input('email'))->first();

        if ($existingCliente) {
            // Cliente com o mesmo e-mail já existe
            return redirect()->route('clientes.create')->withInput()->withErrors(['error' => 'Cliente com o mesmo e-mail já existe.']);
        }

        // Gera o QR Code com o nome do cliente
        $qrcodeData = $request->input('nome');
        $qrcode = QrCode::format('png')->size(150)->generate($qrcodeData);

        // Salva os dados do cliente no banco de dados
        $cliente = Cliente::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'endereco' => $request->input('endereco'),
            'qrcode' => 'data:image/png;base64,' . base64_encode($qrcode),
        ]);

        return redirect()->route('clientes.show', $cliente->id)->with('success', 'Cliente criado com sucesso!');
    }
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required|string',
            'endereco' => 'required|string',
            'qrcode' => 'unique:clientes,qrcode,' . $cliente->id, // Certifique-se de ajustar se necessário
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.show', $cliente->id)->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
