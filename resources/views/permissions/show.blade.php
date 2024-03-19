@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Detalles del permiso'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Tarjeta que muestra la vista detallada de un permiso específico -->
        <div class="card">
          <!-- Encabezado de la tarjeta -->
          <div class="card-header card-header-primary">
            <div class="card-title">Permisos</div>
            <p class="card-category">Vista detallada del permiso {{ $permission->name }}</p>
          </div>
          <!-- Cuerpo de la tarjeta -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <!-- Tarjeta de usuario que muestra detalles del permiso -->
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <a href="#">
                          <!-- Avatar del usuario -->
                          <img src="{{ asset('/img/default-avatar.png') }}" alt="image" class="avatar">
                          <!-- Nombre del permiso -->
                          <h5 class="title mt-3">{{ $permission->name }}</h5>
                        </a>
                        <!-- Detalles adicionales del permiso -->
                        <p class="description">
                        {{ $permission->guard_name }} <br>
                        {{ $permission->created_at }}
                        </p>
                      </div>
                    </p>
                    <!-- Descripción del permiso -->
                    <div class="card-description">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam officia corporis molestiae aliquid provident placeat.
                    </div>
                  </div>
                  <!-- Pie de la tarjeta -->
                  <div class="card-footer">
                    <div class="button-container">
                      <button class="btn btn-sm btn-primary">Editar</button>
                    </div>
                  </div>
                  <!-- Fin del pie de la tarjeta -->
                </div>
              </div><!--end card user-->
            </div>
          </div>
          <!-- Fin del cuerpo de la tarjeta -->
        </div>
        <!-- Fin de la tarjeta -->
      </div>
    </div>
  </div>
</div>
@endsection