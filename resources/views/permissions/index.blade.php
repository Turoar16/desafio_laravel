@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Permisos'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <!-- Tarjeta que contiene la lista de permisos registrados -->
              <div class="card">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Permisos</h4>
                  <p class="card-category">Permisos registrados</p>
                </div>
                <!-- Cuerpo de la tarjeta -->
                <div class="card-body">
                  <!-- Mensaje de éxito si existe -->
                    @if (session('success'))
                        <div class="alert alert-success" role="success">
                        {{ session('success') }}
                        </div>
                    @endif
                  <div class="row">
                    <div class="col-12 text-right">
                      <!-- Botón para añadir un nuevo permiso si el usuario tiene permiso -->
                      @can('permission_create')
                      <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-facebook">Añadir permiso</a>
                      @endcan
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Guard</th>
                        <th>Created_at</th>
                        <th class="text-right">Acciones</th>
                      </thead>
                      <tbody>
                        <!-- Iteración sobre los permisos para mostrar en la tabla -->
                        @forelse ($permissions as $permission)
                        <tr>
                          <td>{{ $permission->id }}</td>
                          <td>{{ $permission->name }}</td>
                          <td>{{ $permission->guard_name }}</td>
                          <td>{{ $permission->created_at }}</td>
                          <td class="td-actions text-right">
                            <!-- Enlaces y formularios de acciones para cada permiso -->
                          @can('permission_show')
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info"><i
                                class="material-icons">person</i></a>
                          @endcan
                          @can('permission_edit')
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"><i
                                class="material-icons">edit</i></a>
                          @endcan
                          @can('permission_destroy')
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro que quiere eliminar el Registro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" rel="tooltip">
                                <i class="material-icons">close</i>
                              </button>
                            </form>
                          @endcan
                          </td>
                        </tr>
                        @empty
                        <!-- Mensaje de "Sin registros" si no hay permisos registrados -->
                        <tr>
                          <td colspan="2">Sin registros.</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Pie de la tarjeta -->
                <div class="card-footer mr-auto">
                  <!-- Paginación de los permisos -->
                  {{ $permissions->links() }}
                </div>
                <!-- Fin del pie de la tarjeta -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
