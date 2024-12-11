<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deuda;

class DeudaController extends Controller
{
    public function index()
{
    $deudas = Deuda::all();
    return view('deudas.index', compact('deudas'));
}

    public function create()
{
    return view('deudas.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'celular' => 'required|string|max:20',
        'valor_cancelado' => 'required|numeric',
        'valor_total' => 'required|numeric',
        'descripcion_deuda' => 'nullable|string',
        'estado' => 'required|in:pendiente,cancelada',
    ]);

    Deuda::create($validatedData);

    return redirect()->route('deudas.index')->with('success', 'Deuda registrada con éxito.');
}

public function edit(Deuda $deuda)
{
    return view('deudas.edit', compact('deuda'));
}

public function update(Request $request, Deuda $deuda)
{
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'celular' => 'required|string|max:20',
        'valor_cancelado' => 'required|numeric',
        'valor_total' => 'required|numeric',
        'descripcion_deuda' => 'nullable|string',
        'estado' => 'required|in:pendiente,cancelada',
    ]);

    $deuda->update($validatedData);

    return redirect()->route('deudas.index')->with('success', 'Deuda actualizada con éxito.');
}

public function destroy(Deuda $deuda)
{
    $deuda->delete();

    return redirect()->route('deudas.index')->with('success', 'Deuda eliminada con éxito.');
}


}
