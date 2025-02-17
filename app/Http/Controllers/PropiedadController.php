<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use App\Models\Agente;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    public function index()
    {
        $propiedades = Propiedad::all();
        return view('propiedades.index', compact('propiedades'));
    }

    public function create()
    {
        $agentes = Agente::all();
        $categorias = Categoria::all();
        return view('propiedades.create', compact('agentes', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'agente_id' => 'required|exists:agentes,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Propiedad::create($request->all());

        return redirect()->route('propiedades.index');
    }

    public function show(Propiedad $propiedad)
    {
        return view('propiedades.show', compact('propiedad'));
    }

    public function edit(Propiedad $propiedad)
    {
        $agentes = Agente::all();
        $categorias = Categoria::all();
        return view('propiedades.edit', compact('propiedad', 'agentes', 'categorias'));
    }

    public function update(Request $request, Propiedad $propiedad)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'agente_id' => 'required|exists:agentes,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $propiedad->update($request->all());

        return redirect()->route('propiedades.index');
    }

    public function destroy(Propiedad $propiedad)
    {
        $propiedad->delete();

        return redirect()->route('propiedades.index');
    }
}
