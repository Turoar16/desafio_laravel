<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasto;
use App\Http\Requests\GastoCreateRequest;
use App\Http\Requests\GastoEditRequest;
use Illuminate\Support\Facades\Gate;

class GastoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gasto_index'), 403);
        $user_id = auth()->id(); // Obtener el ID del usuario autenticado

        // Filtrar los gastos por usuario_id y paginar los resultados
        $gastos = Gasto::where('usuario_id', $user_id)->paginate(5);

        return view('gastos.index', compact('gastos'));
    }

    public function create()
    {
        abort_if(Gate::denies('gasto_create'), 403);
        return view('gastos.create');
    }

    public function store(GastoCreateRequest $request)
    {
        Gasto::create($request->all());
        return redirect()->route('gastos.index')->with('success', 'Gasto creado correctamente');
    }

    public function edit(Gasto $gasto)
    {
        abort_if(Gate::denies('gasto_edit'), 403);
        return view('gastos.edit', compact('gasto'));
    }

    public function update(GastoEditRequest $request, Gasto $gasto)
    {
        $data = $request->only('usuario_id', 'fecha', 'concepto', 'monto');
        $gasto->update($data);
        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado correctamente');
    }

    public function destroy(Gasto $gasto)
    {
        abort_if(Gate::denies('gasto_destroy'), 403);
        $gasto->delete();
        return back()->with('success', 'Gasto eliminado correctamente');
    }
}
