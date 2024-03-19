@extends('layouts.main', ['activePage' => 'gastos', 'titlePage' => 'Gastos'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <!-- Tarjeta de Gastos -->
                <div class="card">
                  <!-- Encabezado de la tarjeta -->
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Gastos</h4>
                    <p class="card-category">Gastos registrados</p>
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
                        <!-- Botón para añadir gasto si el usuario tiene permiso -->
                      @can('gasto_create')
                        <a href="{{ route('gastos.create') }}" class="btn btn-sm btn-facebook">Añadir gasto</a>
                      @endcan
                      </div>
                    </div>
                    <!-- Tabla de gastos -->
                    <div class="table-responsive">
                      <table class="table">
                        <!-- Encabezados de la tabla -->
                        <thead class="text-primary">
                          <th class="text-center">ID</th>
                          <th class="text-center">Usuario</th>
                          <th class="text-center">Fecha</th>
                          <th class="text-center">Concepto</th>
                          <th class="text-center">Monto</th>
                          <th class="text-center">Creado</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          <!-- Iteración sobre los gastos -->
                          @foreach ($gastos as $gasto)
                            <tr>
                              <!-- Columna ID -->
                              <td class="text-center">{{ $gasto->id }}</td>
                              <!-- Columna Usuario -->
                              <td class="text-center">{{ $gasto->usuario_id }}</td>
                              <!-- Columna Fecha -->
                              <td class="text-center">{{ $gasto->fecha }}</td>
                              <!-- Columna Concepto -->
                              <td>{{ $gasto->concepto }}</td>>
                               <!-- Columna Monto -->
                              <td class="text-center">{{ $gasto->monto }}</td>
                              <!-- Columna Creado -->
                              <td class="text-center">{{ $gasto->created_at }}</td>
                              <!-- Columna Acciones -->
                              <td class="td-actions text-right">
                              <!-- Botón de edición si el usuario tiene permiso -->
                              @can('gasto_edit')
                                <a href="{{ route('gastos.edit', $gasto->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              @endcan
                              <!-- Formulario de eliminación si el usuario tiene permiso -->
                              @can('gasto_destroy')
                                <form action="{{ route('gastos.delete', $gasto->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro que quiere eliminar el Registro?')">
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
                    <!-- Paginación de los gastos -->
                    {{ $gastos->links() }}
                  </div>
                  <!-- Fin del pie de la tarjeta -->
                </div>
                <!-- Fin de la tarjeta de gastos -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection