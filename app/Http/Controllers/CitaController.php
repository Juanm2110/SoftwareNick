<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('paciente')->paginate(10);
        return view('citas.index', compact('citas'));
    }

    public function create()
{
    $pacientes = Paciente::all('celular', 'nombre_completo');
    return view('citas.create', compact('pacientes'));
}

public function store(Request $request)
{
    // Validar los datos ingresados
    $request->validate([
        'celular' => 'required|numeric',
        'nombre' => 'required|string|max:255',
        'fecha' => 'required|date',
        'hora' => 'required',
        'estado' => 'required|in:Pendiente,Asistida,Cancelada',
    ]);

    // Crear la nueva cita
    Cita::create([
        'celular' => $request->celular,
        'nombre' => $request->nombre,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'estado' => $request->estado,
    ]);

    session()->push('notificaciones', 'Hay una nueva cita agendada.');

    // Redireccionar con mensaje de éxito
    return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
}

    public function show(Cita $cita)
    {
        return view('citas.show', compact('cita'));
    }

    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        return view('citas.edit', compact('cita'));
    }
    

    public function update(Request $request, $id)
{
    // Validar los datos recibidos
    $validatedData = $request->validate([
        'celular' => 'required|numeric',
        'fecha' => 'required|date',
        'hora' => 'required',
        'estado' => 'required|in:Pendiente,Asistida,Cancelada',
    ]);

    // Encontrar la cita y actualizar los datos
    $cita = Cita::findOrFail($id);
    $cita->update($validatedData);

    // Redirigir al listado de citas con un mensaje
    return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
}

    


    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada con éxito.');
    }
}
