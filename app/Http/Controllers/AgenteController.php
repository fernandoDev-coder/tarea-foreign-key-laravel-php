<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    // Mostrar listado de agentes
    public function index()
    {
        $agentes = Agente::all();
        return view('agentes.index', compact('agentes'));
    }

    // Mostrar formulario para crear un nuevo agente
    public function create()
    {
        return view('agentes.create');
    }

    // Guardar nuevo agente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:agentes,email',
        ]);

        Agente::create($request->all());

        return redirect()->route('agentes.index');
    }

    // Mostrar detalles del agente
    public function show(Agente $agente)
    {
        return view('agentes.show', compact('agente'));
    }

    // Mostrar formulario para editar un agente
    public function edit(Agente $agente)
    {
        return view('agentes.edit', compact('agente'));
    }

    // Actualizar agente
    public function update(Request $request, Agente $agente)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $agente->update($request->all());

        return redirect()->route('agentes.index');
    }

    // Eliminar agente
    public function destroy(Agente $agente)
    {
        $agente->delete();

        return redirect()->route('agentes.index');
    }
}
