@extends('layouts.main', ['activePage' => 'ingresos', 'titlePage' => 'Nuevo ingreso'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Formulario para ingresar ingresos -->
        <form action="{{route('ingresos.store')}}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Ingresos</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <!-- Cuerpo de la tarjeta -->
            <div class="card-body">
              <!-- Campo para el ID del usuario (readonly) -->
              <div class="row">
                <label for="usuario_id" class="col-sm-2 col-form-label">Id del Usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="usuario_id" value="{{ auth()->user()->id }}" readonly>
                </div>
              </div>
              <!-- Campo para la fecha -->
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" name="fecha"  value="{{ date('Y-m-d') }}"">
                  <!-- Mensaje de error para la fecha -->
                  @if ($errors->has('fecha'))
                    <span class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo para el concepto -->
              <div class="row">
                <label for="concepto" class="col-sm-2 col-form-label">Concepto</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="concepto" placeholder="Ingrese su concepto" value="{{ old('concepto') }}">
                  <!-- Mensaje de error para el concepto -->
                  @if ($errors->has('concepto'))
                    <span class="error text-danger" for="input-concepto">{{ $errors->first('concepto') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo para el monto -->
              <div class="row">
                <label for="monto" class="col-sm-2 col-form-label">Monto</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" name="monto" placeholder="Ingrese monto" value="{{ old('monto') }}">
                  <!-- Mensaje de error para el monto -->
                  @if ($errors->has('monto'))
                    <span class="error text-danger" for="input-monto">{{ $errors->first('monto') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <!-- Botón para guardar el ingreso -->
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
            <!-- Fin del pie de la tarjeta -->
          </div>
        </form>
        <!-- Fin del formulario -->
      </div>
    </div>
  </div>
</div>
@endsection