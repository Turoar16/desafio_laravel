@extends('layouts.main', ['activePage' => 'ingresos', 'titlePage' => 'Ingresos'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Tarjeta para mostrar la lista de ingresos -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <!-- Encabezado de la tarjeta -->
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Ingresos</h4>
                    <p class="card-category">Ingresos registrados</p>
                  </div>
                  <!-- Cuerpo de la tarjeta -->
                  <div class="card-body">
                    <!-- Mensaje de éxito si existe -->
                    @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
                    @endif
                    <!-- Botón para añadir nuevo ingreso si el usuario tiene permisos -->
                    <div class="row">
                      <div class="col-12 text-right">
                      @can('ingreso_create')
                        <a href="{{ route('ingresos.create') }}" class="btn btn-sm btn-facebook">Añadir ingreso</a>
                      @endcan
                      </div>
                    </div>
                    <!-- Tabla para mostrar la lista de ingresos -->
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
                        <!-- Cuerpo de la tabla -->
                        <tbody>
                          @foreach ($ingresos as $ingreso)
                            <tr>
                              <td class="text-center">{{ $ingreso->id }}</td>
                              <td class="text-center">{{ $ingreso->usuario_id }}</td>
                              <td class="text-center">{{ $ingreso->fecha }}</td>
                              <td>{{ $ingreso->concepto }}</td>
                              <td class="text-center">{{ $ingreso->monto }}</td>
                              <td class="text-center">{{ $ingreso->created_at }}</td>
                              <!-- Acciones disponibles para cada ingreso -->
                              <td class="td-actions text-right">
                              @can('ingreso_edit')
                              <!-- Botón para editar ingreso -->
                                <a href="{{ route('ingresos.edit', $ingreso->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              @endcan
                              @can('ingreso_destroy')
                              <!-- Formulario para eliminar ingreso -->
                                <form action="{{ route('ingresos.delete', $ingreso->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro que quiere eliminar el Registro?')">
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
                    <!-- Paginación para la lista de ingresos -->
                    {{ $ingresos->links() }}
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