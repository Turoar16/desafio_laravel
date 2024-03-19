@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Detalles del rol'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Tarjeta para mostrar la vista detallada de un rol -->
        <div class="card">
          <!-- Encabezado de la tarjeta -->
          <div class="card-header card-header-primary">
            <h4 class="card-title">Roles</h4>
            <p class="card-category">Vista detallada del rol {{ $role->name }}</p>
          </div>
          <!--End header-->
          <!-- Cuerpo de la tarjeta -->
          <div class="card-body">
            <div class="row">
              <!-- Primera columna -->
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <!-- Información del autor -->
                      <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                          <!-- Imagen de perfil del rol -->
                          <img class="avatar" src="{{ asset('/img/default-avatar.png') }}" alt="">
                          <!-- Título del rol -->
                          <h5 class="title mt-3">Rol: {{ $role->name }}</h5>
                        </a>
                        <!-- Descripción del rol -->
                        <p class="description">
                          {{ _('Ceo/Co-Founder') }} <br>
                          <!-- Guard del rol -->
                          {{ $role->guard_name }} <br>
                          <!-- Fecha de creación del rol -->
                          {{ $role->created_at }}
                        </p>
                      </div>
                    </p>
                    <!-- Descripción del rol -->
                    <div class="card-description">
                      <!-- Permisos asignados al rol -->
                      @forelse ($role->permissions as $permission)
                          <span class="badge rounded-pill bg-dark text-white">{{ $permission->name }}</span>
                      @empty
                          <span class="badge badge-danger bg-danger">No permissions</span>
                      @endforelse
                    </div>
                  </div>
                  <!-- Pie de la tarjeta -->
                  <div class="card-footer">
                    <!-- Botón para editar el rol -->
                    <div class="button-container">
                      <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fin de la primera columna -->
            </div>
            <!-- Fin de la fila -->
          </div>
          <!-- Fin del cuerpo de la tarjeta -->
        </div>
        <!-- Fin de la tarjeta -->
      </div>
    </div>
  </div>
</div>
@endsection