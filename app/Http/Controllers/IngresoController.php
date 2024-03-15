<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Http\Requests\IngresoCreateRequest;
use App\Http\Requests\IngresoEditRequest;

class IngresoController extends Controller
{
    public function index()
    {
        $user_id = auth()->id(); // Obtener el ID del usuario autenticado

        // Filtrar los gastos por usuario_id y paginar los resultados
        $ingresos = Ingreso::where('usuario_id', $user_id)->paginate(5);

        return view('ingresos.index', compact('ingresos'));

    }

    public function create()
    {
        return view('ingresos.create');
    }

    public function store(IngresoCreateRequest $request)
    {
        Ingreso::create($request->all());
        return redirect()->route('ingresos.index')->with('success', 'Ingreso creado correctamente');
    }

    public function edit(Ingreso $ingreso)
    {
        return view('ingresos.edit', compact('ingreso'));
    }

    public function update(IngresoEditRequest $request, Ingreso $ingreso)
    {
        $data = $request->only('usuario_id', 'fecha', 'concepto', 'monto');
        $ingreso->update($data);
        return redirect()->route('ingresos.index')->with('success', 'Ingreso actualizado correctamente');
    }

    public function delete(Ingreso $ingreso)
    {
        $ingreso->delete();
        return back()->with('success', 'Ingreso eliminado correctamente');
    }
}
