<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionEditRequest;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra una lista de los permisos.
        //Verifica si el usuario actual tiene permiso para acceder a la lista de permisos.
        abort_if(Gate::denies('permission_index'), 403);
        // Filtrar los permisos por id y paginar los resultados
        $permissions = Permission::paginate(5);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Muestra el formulario para crear un nuevo permiso.
        abort_if(Gate::denies('permission_create'), 403);
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)//Llama a la validacion de datos PermissionCreateRequest.
    {
        //Almacena un nuevo permiso en el almacenamiento.
        Permission::create($request->only('name'));

        return redirect()->route('permissions.index')->with('success', 'Permiso creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //Muestra el permiso especificado.
        abort_if(Gate::denies('permission_show'), 403);
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //Muestra el formulario para editar el permiso especificado.
        abort_if(Gate::denies('permission_edit'), 403);
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionEditRequest $request, Permission $permission)//Llama a la validacion de datos PermissionEditRequest.
    {
        //Actualiza el permiso especificado en el almacenamiento.
        $permission->update($request->only('name'));

        return redirect()->route('permissions.index')->with('success', 'Permiso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //Elimina el permiso especificado del almacenamiento.
        abort_if(Gate::denies('permission_destroy'), 403);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permiso eliminado correctamente');
    }
}
