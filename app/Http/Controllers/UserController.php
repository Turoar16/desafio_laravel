<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        // Verifica si el usuario tiene permiso para crear usuarios.
        abort_if(Gate::denies('user_create'), 403);
        // Obtiene una colección paginada de usuarios.
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_index'), 403);
        // Obtiene una colección de roles y los convierte en un array asociativo de nombre y ID.
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(UserCreateRequest $request)
    {
        // Crea un nuevo usuario en la base de datos utilizando los datos proporcionados en la solicitud.
        $user = User::create($request->only('nombre', 'name', 'email', 'telefono', 'direccion')
        + [
            'password' => bcrypt($request->input('password')),
        ]);
        // Obtiene los roles seleccionados del formulario.
        $roles = $request->input('roles', []);
        // Asigna los roles seleccionados al usuario recién creado.
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);
        // Obtiene todos los roles y los convierte en un array asociativo de nombres de roles con sus respectivos IDs.
        $roles = Role::all()->pluck('name', 'id');
        // Carga las relaciones de roles del usuario.
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), 403);
        // Carga las relaciones de roles del usuario.
        $user->load('roles');
        // Retorna la vista que muestra los detalles del usuario.
        return view('users.show', compact('user'));
    }

    public function update(UserEditRequest $request, User $user)
    {
        // Obtiene los datos del formulario de solicitud.
        $data = $request->only('nombre', 'name', 'email', 'telefono', 'direccion');
        // Obtiene la nueva contraseña ingresada en el formulario.
        $password=$request->input('password');
        // Verifica si se ingresó una nueva contraseña.
        if($password)
            $data['password'] = bcrypt($password);

        // Actualiza la información del usuario en el almacenamiento.
        $user->update($data);
        // Obtiene los roles seleccionados en el formulario.
        $roles = $request->input('roles', []);
        // Sincroniza los roles del usuario con los roles seleccionados.
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_destroy'), 403);

        // Verifica si el usuario a eliminar es el usuario logueado.
        if (auth()->user()->id == $user->id) {
            // Redirige a la página de índice de usuarios con un mensaje de error.
            return redirect()->route('users.index')->with('danger', 'No se puede eliminar Usuario logueado');
        }
        // Elimina el usuario de la base de datos.
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente');
    }
}
