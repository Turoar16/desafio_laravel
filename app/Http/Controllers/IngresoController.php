<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Http\Requests\IngresoCreateRequest;
use App\Http\Requests\IngresoEditRequest;
use Illuminate\Support\Facades\Gate;

class IngresoController extends Controller
{
    public function index()
    {
        //Muestra una lista de los ingresos.
        //Verifica si el usuario actual tiene permiso para acceder a la lista de ingresos.
        abort_if(Gate::denies('ingreso_index'), 403);
        $user_id = auth()->id(); // Obtener el ID del usuario autenticado

        // Filtrar los ingresos por usuario_id y paginar los resultados
        $ingresos = Ingreso::where('usuario_id', $user_id)->paginate(5);

        return view('ingresos.index', compact('ingresos'));

    }

    public function create()
    {
        //Muestra el formulario para crear un nuevo ingreso.
        abort_if(Gate::denies('ingreso_create'), 403);
        return view('ingresos.create');
    }

    public function store(IngresoCreateRequest $request)
    {
        //Almacena un nuevo ingreso en el almacenamiento.
        Ingreso::create($request->all());
        return redirect()->route('ingresos.index')->with('success', 'Ingreso creado correctamente');
    }

    public function edit(Ingreso $ingreso)
    {
        //Muestra el formulario para editar el ingreso especificado.
        abort_if(Gate::denies('ingreso_edit'), 403);
        return view('ingresos.edit', compact('ingreso'));
    }

    public function update(IngresoEditRequest $request, Ingreso $ingreso)
    {
        //Actualiza el ingreso especificado en el almacenamiento.
        $data = $request->only('usuario_id', 'fecha', 'concepto', 'monto');
        $ingreso->update($data);
        return redirect()->route('ingresos.index')->with('success', 'Ingreso actualizado correctamente');
    }

    public function destroy(Ingreso $ingreso)
    {
        //Elimina el ingreso especificado del almacenamiento.
        abort_if(Gate::denies('ingreso_destroy'), 403);
        $ingreso->delete();
        return back()->with('success', 'Ingreso eliminado correctamente');
    }
}
