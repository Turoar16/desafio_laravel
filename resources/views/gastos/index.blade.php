@extends('layouts.main', ['activePage' => 'gastos', 'titlePage' => 'Gastos'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Gastos</h4>
                    <p class="card-category">Gastos registrados</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        <a href="{{ route('gastos.create') }}" class="btn btn-sm btn-facebook">Añadir gasto</a>
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
                          @foreach ($gastos as $gasto)
                            <tr>
                              <td class="text-center">{{ $gasto->id }}</td>
                              <td class="text-center">{{ $gasto->usuario_id }}</td>
                              <td class="text-center">{{ $gasto->fecha }}</td>
                              <td>{{ $gasto->concepto }}</td>
                              <td class="text-center">{{ $gasto->monto }}</td>
                              <td class="text-center">{{ $gasto->created_at }}</td>
                              <td class="td-actions text-right">
                                <a href="{{ route('gastos.edit', $gasto->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                <form action="{{ route('gastos.delete', $gasto->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro que quiere eliminar el Registro?')">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer mr-auto">
                    {{ $gastos->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection