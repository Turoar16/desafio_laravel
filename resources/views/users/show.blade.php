@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Tarjeta -->
        <div class="card">
          <!-- Cuerpo de la tarjeta -->
          <div class="card-header card-header-primary">
            <div class="card-title">Usuarios</div>
            <p class="card-category">Vista detallada del usuario {{ $user->name }}</p>
          </div>
          <div class="card-body">
            <!-- Mensaje de éxito -->
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif
           <!-- Detalles del usuario -->
           <div class="row">
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <!-- Tabla para mostrar detalles -->
                    <table class="table table-bordered table-striped">
                      <tbody>
                        <!-- Detalles del usuario -->
                        <tr>
                          <th>ID</th>
                          <td>{{ $user->id }}
                          </td>
                        </tr>
                        <tr>
                          <th>Name</th>
                          <td>{{ $user->nombre }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td><span class="badge badge-primary">{{ $user->email }}</span></td>
                        </tr>
                        <tr>
                          <th>Username</th>
                          <td>{!! $user->name !!}</td>
                        </tr>
                        <tr>
                          <th>Teléfono</th>
                          <td>{!! $user->telefono !!}</td>
                        </tr>
                        <tr>
                          <th>Dirección</th>
                          <td>{!! $user->direccion !!}</td>
                        </tr>
                        <tr>
                          <th>Created at</th>
                          <td><a href="#" target="_blank">{{  $user->created_at  }}</a></td>
                        </tr>
                        <!-- Roles del usuario -->
                        <tr>
                            <th>Roles</th>
                            <td>
                                @forelse ($user->roles as $role)
                                    <span class="badge rounded-pill bg-dark text-white">{{ $role->name }}</span>
                                @empty
                                    <span class="badge badge-danger bg-danger">No roles</span>
                                @endforelse
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Pie de la tarjeta -->
                  <div class="card-footer">
                    <!-- Botones de acción -->
                    <div class="button-container">
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      <a href="#" class="btn btn-sm btn-twitter"> Editar </a>
                    </div>
                  </div>
                </div>
              </div>
              <!--end-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
