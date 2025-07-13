<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerWebController extends Controller
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_URL', 'http://localhost:8001/api') . '/customers';
    }

    public function index(Request $request)
    {
        $filters = $request->only([
            'page',
            'document',
            'name',
            'birth_date',
            'sex',
            'state_id',
            'city_id'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($this->baseUrl . '/filter', $filters);

        $data = $response->json();
        $customers = $data['data'] ?? [];
        $pagination = $data['meta'] ?? null;
        $links = $data['links'] ?? [];

        return view('customers.index', compact('customers', 'pagination', 'data', 'links'));
    }

    public function create()
    {
        return view('customers.create', [
            'customer' => null
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post($this->baseUrl, $request->all());

        if ($response->failed()) {
            // dd($response->status(), $response->body());
            return back()
                ->with('error', 'Erro ao cadastrar cliente, verifique os dados e tente novamente.')
                ->withErrors($response->json('errors'))
                ->withInput();
        }
        return redirect()->route('customers.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->baseUrl}/{$id}");

        if ($response->failed()) {
            return redirect()->route('customers.index')->with('error', 'Cliente não encontrado.');
        }

        $customer = $response->json();
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->put("{$this->baseUrl}/{$id}", $request->all());

        if ($response->failed()) {
            // dd($response->body());
            return back()
                ->with('error', 'Erro ao atualizar cliente.')
                ->withErrors($response->json('errors'))
                ->withInput();
        }

        return redirect()->route('customers.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->baseUrl}/{$id}");

        if ($response->failed()) {
            return redirect()->route('customers.index')->with('error', 'Erro ao excluir cliente.');
        }

        return redirect()->route('customers.index')->with('success', 'Cliente excluído com sucesso.');
    }
}
