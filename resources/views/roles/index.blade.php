@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Roles'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Tarjeta para mostrar la lista de roles -->
        <div class="card">
          <!-- Encabezado de la tarjeta -->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Roles</h4>
            <p class="card-category">Lista de roles registrados en la base de datos</p>
          </div>
          <!-- Cuerpo de la tarjeta -->
          <div class="card-body">
            <!-- Mensaje de éxito en caso de operación exitosa -->
            @if (session('success'))
                <div class="alert alert-success" role="success">
                {{ session('success') }}
                </div>
            @endif
            <!-- Botón para añadir un nuevo rol (si el usuario tiene los permisos necesarios) -->
            <div class="row">
              <div class="col-12 text-right">
              @can('role_create')
                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-facebook">Añadir nuevo rol</a>
              @endcan
              </div>
            </div>
            <!-- Tabla para mostrar la lista de roles -->
            <div class="table-responsive">
              <table class="table ">
                <thead class="text-primary">
                  <!-- Encabezados de la tabla -->
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Guard </th>
                  <th> Fecha de creación </th>
                  <th> Permisos </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  <!-- Iteración sobre los roles -->
                  @forelse ($roles as $role)
                  <tr>
                    <!-- Datos de cada rol -->
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                    <!-- Permisos asignados al rol -->
                    <td>
                      @forelse ($role->permissions as $permission)
                          <span class="badge badge-info">{{ $permission->name }}</span>
                      @empty
                          <span class="badge badge-danger">No permission added</span>
                      @endforelse
                    </td>
                    <!-- Acciones disponibles para cada rol -->
                    <td class="td-actions text-right">
                    @can('role_show')
                      <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info"> <i
                          class="material-icons">person</i> </a>
                    @endcan
                    @can('role_edit')
                      <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"> <i
                          class="material-icons">edit</i> </a>
                    @endcan
                    @can('role_destroy')
                      <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                        onsubmit="return confirm('Seguro que quiere eliminar el Registro?')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">close</i>
                        </button>
                      </form>
                    @endcan
                    </td>
                  </tr>
                  @empty
                  <!-- Manejo de caso en que no haya roles registrados -->
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
          <!--Pie de la tarjeta-->
          <div class="card-footer mr-auto">
            <!-- Paginación de la lista de roles -->
            {{ $roles->links() }}
          </div>
          <!--Fin del pie de la tarjeta-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
