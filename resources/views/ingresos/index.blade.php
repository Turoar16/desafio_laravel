@extends('layouts.main', ['activePage' => 'ingresos', 'titlePage' => 'Ingresos'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Ingresos</h4>
                    <p class="card-category">Ingresos registrados</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                      @can('ingreso_create')
                        <a href="{{ route('ingresos.create') }}" class="btn btn-sm btn-facebook">Añadir ingreso</a>
                      @endcan
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
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
                          @foreach ($ingresos as $ingreso)
                            <tr>
                              <td class="text-center">{{ $ingreso->id }}</td>
                              <td class="text-center">{{ $ingreso->usuario_id }}</td>
                              <td class="text-center">{{ $ingreso->fecha }}</td>
                              <td>{{ $ingreso->concepto }}</td>
                              <td class="text-center">{{ $ingreso->monto }}</td>
                              <td class="text-center">{{ $ingreso->created_at }}</td>
                              <td class="td-actions text-right">
                              @can('ingreso_edit')
                                <a href="{{ route('ingresos.edit', $ingreso->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              @endcan
                              @can('ingreso_destroy')
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
                  <div class="card-footer mr-auto">
                    {{ $ingresos->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection