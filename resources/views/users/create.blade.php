@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Formulario para agregar un nuevo usuario -->
        <form action="{{route('users.store')}}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <!-- Encabezado de la tarjeta -->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Usuario</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <!-- Cuerpo de la tarjeta -->
            <div class="card-body">
              <!-- Campo de entrada para el nombre -->
              <div class="row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" value="{{ old('nombre') }}" autofocus>
                  <!-- Mensaje de error en caso de que el nombre no sea válido -->
                  @if ($errors->has('nombre'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('nombre') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo de entrada para el nombre de usuario -->
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre de usuario</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre de usuario" value="{{ old('name') }}">
                  <!-- Mensaje de error en caso de que el nombre de usuario no sea válido -->
                  @if ($errors->has('name'))
                    <span class="error text-danger" for="input-username">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo de entrada para el teléfono -->
              <div class="row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" name="telefono" placeholder="Ingrese su teléfono" value="{{ old('telefono') }}">
                </div>
              </div>
              <!-- Campo de entrada para la dirección -->
              <div class="row">
                <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="direccion" placeholder="Ingrese su dirección" value="{{ old('direccion') }}">
                </div>
              </div>
              <!-- Campo de entrada para el correo electrónico -->
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                  <!-- Mensaje de error en caso de que el correo electrónico no sea válido -->
                  @if ($errors->has('email'))
                    <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo de entrada para la contraseña -->
              <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" name="password" placeholder="Contraseña">
                  <!-- Mensaje de error en caso de que la contraseña no sea válida -->
                  @if ($errors->has('password'))
                    <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo de selección de roles -->
              <div class="row">
                <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <table class="table">
                                    <tbody>
                                      <!-- Iteración sobre los roles disponibles -->
                                        @foreach ($roles as $id => $role)
                                        <tr>
                                            <td>
                                              <!-- Casilla de verificación para seleccionar el rol -->
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                            value="{{ $id }}"
                                                        >
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <!-- Nombre del rol -->
                                            <td>
                                                {{ $role }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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