@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuarios'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <!-- Tarjeta -->
                <div class="card">
                  <!-- Encabezado de la tarjeta -->
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Usuarios</h4>
                    <p class="card-category">Usuarios registrados</p>
                  </div>
                  <!-- Cuerpo de la tarjeta -->
                  <div class="card-body">
                    <!-- Mensajes de éxito o error -->
                    @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
                    @endif
                    @if (session('danger'))
                      <div class="alert alert-danger" role="danger">
                        {{ session('danger') }}
                      </div>
                    @endif
                    <!-- Botón para añadir un nuevo usuario -->
                    <div class="row">
                      <div class="col-12 text-right">
                      @can('user_create')
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-facebook">Añadir usuario</a>
                      @endcan
                      </div>
                    </div>
                    <!-- Tabla para mostrar la lista de usuarios -->
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <!-- Encabezados de la tabla -->
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Username</th>
                          <th>Correo</th>
                          <th>Teléfono</th>
                          <th>Dirección</th>
                          <th>Roles</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          <!-- Iteración sobre los usuarios -->
                          @foreach ($users as $user)
                            <tr>
                              <!-- Datos del usuario -->
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->nombre }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->telefono }}</td>
                              <td>{{ $user->direccion }}</td>
                              <td>
                                <!-- Roles del usuario -->
                                @forelse ($user->roles as $role)
                                  <span class="badge badge-info">{{ $role->name }}</span>
                                @empty
                                  <span class="badge badge-danger">No roles</span>
                                @endforelse
                              </td>
                              <!-- Acciones -->
                              <td class="td-actions text-right">
                              @can('user_show')
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                              @endcan
                              @can('user_edit')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              @endcan
                              @can('user_destroy')
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro que quiere eliminar el Registro?')">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                              @endcan
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- Pie de la tarjeta -->
                  <div class="card-footer mr-auto">
                    <!-- Paginación de la lista de usuarios -->
                    {{ $users->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection