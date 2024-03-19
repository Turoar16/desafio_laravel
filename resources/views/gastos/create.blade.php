@extends('layouts.main', ['activePage' => 'gastos', 'titlePage' => 'Nuevo gasto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Formulario de ingreso de gastos -->
        <form action="{{route('gastos.store')}}" method="post" class="form-horizontal">
          @csrf
          <!-- Tarjeta de Gastos -->
          <div class="card">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Gastos</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <!-- Cuerpo de la tarjeta -->
            <div class="card-body">
              <!-- Campo para el ID del Usuario -->
              <div class="row">
                <label for="usuario_id" class="col-sm-2 col-form-label">Id del Usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="usuario_id" value="{{ auth()->user()->id }}" readonly>
                </div>
              </div>
              <!-- Campo para la Fecha -->
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" name="fecha"  value="{{ date('Y-m-d') }}">
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
                  <!-- Validación de errores para el concepto -->
                  <input type="text" class="form-control" name="concepto" placeholder="Ingrese su concepto" value="{{ old('concepto') }}">
                  @if ($errors->has('concepto'))
                    <span class="error text-danger" for="input-concepto">{{ $errors->first('concepto') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo para el Monto -->
              <div class="row">
                <label for="monto" class="col-sm-2 col-form-label">Monto</label>
                <div class="col-sm-7">
                  <!-- Validación de errores para el monto -->
                  <input type="number" class="form-control" name="monto" placeholder="Ingrese monto" value="{{ old('monto') }}">
                  @if ($errors->has('monto'))
                    <span class="error text-danger" for="input-monto">{{ $errors->first('monto') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
          <!-- Fin de la tarjeta de gastos -->
        </form>
        <!-- Fin del formulario de ingreso de gastos -->
      </div>
    </div>
  </div>
</div>
@endsection