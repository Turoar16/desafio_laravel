<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleEditRequest;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra una lista de los roles.
        //Verifica si el usuario actual tiene permiso para acceder a la lista de roles.
        abort_if(Gate::denies('role_index'), 403);
        $roles = Role::paginate(5);
    
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Muestra el formulario para crear un nuevo role.
        abort_if(Gate::denies('role_create'), 403);
        $permissions = Permission::all()->pluck('name', 'id');
        
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)//Llama a la validacion de datos RoleCreateRequest.
    {
        //Almacena un nuevo role en el almacenamiento.
        $role = Role::create($request->only('name'));
        // Sincroniza los permisos asociados al rol con los permisos proporcionados en la solicitud.    
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success', 'Role creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //Muestra el role especificado.
        abort_if(Gate::denies('role_show'), 403);
        $role->load('permissions');
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //Muestra el formulario para editar el role especificado.
        abort_if(Gate::denies('role_edit'), 403);
        // Obtiene todos los permisos disponibles y los asigna a una colección en la que la clave es el ID del permiso y el valor es el nombre del permiso.
        $permissions = Permission::all()->pluck('name', 'id');
        // Carga las relaciones de permisos del rol especificado.
        $role->load('permissions');
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleEditRequest $request, Role $role)//Llama a la validacion de datos RoleEditRequest.
    {
        //Actualiza el role especificado en el almacenamiento.
        $role->update($request->only('name'));
        // Sincroniza los permisos asociados al rol utilizando los datos proporcionados en la solicitud.
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success', 'Role actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //Elimina el role especificado del almacenamiento.
        abort_if(Gate::denies('role_destroy'), 403);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role eliminado correctamente');
    }
}
