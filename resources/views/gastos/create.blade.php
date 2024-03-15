@extends('layouts.main', ['activePage' => 'gastos', 'titlePage' => 'Nuevo gasto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('gastos.store')}}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Gastos</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="usuario_id" class="col-sm-2 col-form-label">Id del Usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="usuario_id" value="{{ auth()->user()->id }}" readonly>
                </div>
              </div>
              <div class="row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-7">
                  <input type="date" class="form-control" name="fecha"  value="{{ date('Y-m-d') }}"">
                  @if ($errors->has('fecha'))
                    <span class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="concepto" class="col-sm-2 col-form-label">Concepto</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="concepto" placeholder="Ingrese su concepto" value="{{ old('concepto') }}">
                  @if ($errors->has('concepto'))
                    <span class="error text-danger" for="input-concepto">{{ $errors->first('concepto') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="monto" class="col-sm-2 col-form-label">Monto</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" name="monto" placeholder="Ingrese monto" value="{{ old('monto') }}">
                  @if ($errors->has('monto'))
                    <span class="error text-danger" for="input-monto">{{ $errors->first('monto') }}</span>
                  @endif
                </div>
              </div>
              <!-- <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div> -->
              <!-- <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" name="password" placeholder="Contraseña">
                  @if ($errors->has('password'))
                    <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div> -->
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection