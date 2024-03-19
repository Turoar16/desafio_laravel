@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Editar permiso'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Formulario para editar un permiso existente -->
        <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT')
          <!-- Tarjeta que contiene el formulario -->
          <div class="card">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Permiso</h4>
              <p class="card-category">Editar datos</p>
            </div>
            <!-- Cuerpo de la tarjeta -->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <!-- Campo de entrada para el nombre del permiso, con el valor del permiso cargado para su edición -->
                  <input type="text" class="form-control" name="name" value="{{ old('name', $permission->name) }}" autofocus>
                  <!-- Mensaje de error si el nombre del permiso no es válido -->
                  @if ($errors->has('name'))
                        <span class="error text-danger" for="input-username">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <!-- Botón para actualizar el permiso -->
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection