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
        //Muestra una lista de gastos.
        //Verifica si el usuario actual tiene permiso para acceder a la lista de gatos.
        abort_if(Gate::denies('gasto_index'), 403);
        $user_id = auth()->id(); // Obtener el ID del usuario autenticado

        // Filtrar los gastos por usuario_id y paginar los resultados
        $gastos = Gasto::where('usuario_id', $user_id)->paginate(5);

        return view('gastos.index', compact('gastos'));
    }

    public function create()
    {
        //Muestra el formulario para crear un nuevo gasto.
        abort_if(Gate::denies('gasto_create'), 403);
        return view('gastos.create');
    }

    public function store(GastoCreateRequest $request)
    {
        //Almacena un nuevo gasto en el almacenamiento.
        Gasto::create($request->all());
        return redirect()->route('gastos.index')->with('success', 'Gasto creado correctamente');
    }

    public function edit(Gasto $gasto)
    {
        //Muestra el formulario para editar un gasto especificado.
        abort_if(Gate::denies('gasto_edit'), 403);
        return view('gastos.edit', compact('gasto'));
    }

    public function update(GastoEditRequest $request, Gasto $gasto)
    {
        //Actualiza el gasto especificado en el almacenamiento.
        $data = $request->only('usuario_id', 'fecha', 'concepto', 'monto');
        $gasto->update($data);
        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado correctamente');
    }

    public function destroy(Gasto $gasto)
    {
        //Elimina el gasto especificado del almacenamiento.
        abort_if(Gate::denies('gasto_destroy'), 403);
        $gasto->delete();
        return back()->with('success', 'Gasto eliminado correctamente');
    }
}
