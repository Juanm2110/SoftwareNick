<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Paciente::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nombre_completo', 'like', "%$search%")
                  ->orWhere('celular', 'like', "%$search%");
        }

        $pacientes = $query->paginate(10);

        return view('pacientes.index', compact('pacientes'));
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }
    public function create()
{
    return view('pacientes.create');
}

    // Almacena un nuevo paciente
    public function store(Request $request)
{
    // Validar los datos enviados desde el formulario
    $request->validate([
        'nombre_completo' => 'required|string|max:255',
        'celular' => 'required|string|max:15|unique:pacientes,celular',
        'profesion' => 'nullable|string|max:255',
        'motivo_consulta' => 'required|string|max:1000',
        'tratamiento' => 'nullable|string|max:255',
        'medicamentos' => 'nullable|string|max:255',
        'observaciones' => 'nullable|string|max:1000',
        'tiempo_en_terapia' => 'nullable|integer|min:1',
        'fecha_inicio_terapia' => 'nullable|date',
    ]);

    // Crear un nuevo paciente y guardar en la base de datos
    Paciente::create($request->all());

    // Redirigir al índice con un mensaje de éxito
    return redirect()->route('pacientes.index')->with('success', 'Paciente registrado con éxito.');
}


    // Muestra el formulario para editar un paciente
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    // Actualiza la información de un paciente
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'celular' => 'required|string|max:15',
            'profesion' => 'nullable|string|max:255',
            'motivo_consulta' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
            'tiempo_en_terapia' => 'nullable|integer',
            'fecha_inicio_terapia' => 'nullable|date',
        ]);
        
        $paciente->update($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado con éxito.');
    }

    // Elimina un paciente
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado con éxito.');
    }

    public function descargarHistoriaClinica($id)
{
    // Obtener los datos del paciente
    $paciente = Paciente::findOrFail($id);

    // Generar el PDF usando una vista
    $pdf = Pdf::loadView('pacientes.historia_clinica_pdf', compact('paciente'));

    // Descargar el PDF
    return $pdf->download('historia_clinica_' . $paciente->nombre_completo . '.pdf');
}
    
}
