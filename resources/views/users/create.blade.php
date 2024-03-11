@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('users.store')}}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Usuario</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" value="{{ old('nombre') }}" autofocus>
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre de usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre de usuario" value="{{ old('name') }}">
                </div>
              </div>
              <div class="row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" name="telefono" placeholder="Ingrese su teléfono" value="{{ old('telefono') }}">
                </div>
              </div>
              <div class="row">
                <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="direccion" placeholder="Ingrese su dirección" value="{{ old('direccion') }}">
                </div>
              </div>
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                </div>
              </div>
              <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>
              </div>
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