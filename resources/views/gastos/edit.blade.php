@extends('layouts.main', ['activePage' => 'gastos', 'titlePage' => 'Editar gasto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Formulario de actualización de gastos -->
        <form action="{{ route('gastos.update', $gasto->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT')
          <!-- Tarjeta de Gasto -->
          <div class="card">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Gasto</h4>
              <p class="card-category">Editar datos</p>
            </div>
            <!-- Cuerpo de la tarjeta -->
            <div class="card-body">
              <!-- Campo para el ID del Usuario -->
              <div class="row">
                <label for="usuario_id" class="col-sm-2 col-form-label">Id del Usuario</label>
                <div class="col-sm-7">
                  <!-- Validación de errores para el ID del usuario -->
                  <input type="text" class="form-control" name="usuario_id" value="{{ old('usuario_id', $gasto->usuario_id) }}" readonly>
                  @if ($errors->has('usuario_id'))
                    <span class="error text-danger" for="input-usuario_id">{{ $errors->first('usuario_id') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo para la Fecha -->
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" name="fecha" value="{{ old('fecha', $gasto->fecha) }}">
                  <!-- Validación de errores para la fecha -->
                  @if ($errors->has('fecha'))
                    <span class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo para el Concepto -->
              <div class="row">
                <label for="concepto" class="col-sm-2 col-form-label">Concepto</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="concepto" value="{{ old('concepto', $gasto->concepto) }}">
                  <!-- Validación de errores para el concepto -->
                  @if ($errors->has('concepto'))
                    <span class="error text-danger" for="input-concepto">{{ $errors->first('concepto') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo para el Monto -->
              <div class="row">
                <label for="monto" class="col-sm-2 col-form-label">Monto</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" name="monto" value="{{ old('monto', $gasto->monto) }}">
                  <!-- Validación de errores para el monto -->
                  @if ($errors->has('monto'))
                    <span class="error text-danger" for="input-monto">{{ $errors->first('monto') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <!--End footer-->
          </div>
          <!-- Fin de la tarjeta de gasto -->
        </form>
        <!-- Fin del formulario de actualización de gastos -->
      </div>
    </div>
  </div>
</div>
@endsection