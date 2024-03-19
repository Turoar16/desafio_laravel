@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Editar Rol'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Formulario para actualizar un rol existente -->
        <form method="POST" action="{{ route('roles.update', $role->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!-- Encabezado del formulario -->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar rol</h4>
              <p class="card-category">Editar datos del rol</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <!-- Campo para editar el nombre del rol -->
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" autocomplete="off" autofocus>
                  <!-- Manejo de errores de validación -->
                  @if ($errors->has('name'))
                      <span class="error text-danger" for="input-username">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <!-- Campo para asignar permisos al rol -->
              <div class="row">
                  <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                  <div class="col-sm-7">
                      <div class="form-group">
                        <!-- Campo de búsqueda de permisos -->
                          <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
                          <!-- Lista de permisos disponibles -->
                          <ul id="searchResults" class="list-group mt-2">
                            <!-- Iteración sobre los permisos -->
                              @foreach ($permissions as $id => $permission)
                                  <li class="list-group-item">
                                      <div class="form-check">
                                        <!-- Checkbox para seleccionar/deseleccionar permisos -->
                                          <label class="form-check-label">
                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                              <span class="form-check-sign">
                                                  <span class="check"></span>
                                              </span>
                                              <!-- Nombre del permiso -->
                                              {{ $permission }}
                                          </label>
                                      </div>
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Fin del cuerpo del formulario -->
            <!-- Pie del formulario -->
            <div class="card-footer ml-auto mr-auto">
              <!-- Botón para enviar el formulario -->
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </div>
          <!-- Fin del pie del formulario -->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Script para filtrar la lista de permisos -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const listItems = searchResults.getElementsByTagName('li');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();

        for (let i = 0; i < listItems.length; i++) {
            const text = listItems[i].textContent.toLowerCase();
            const isVisible = text.includes(searchTerm);

            listItems[i].style.display = isVisible ? 'block' : 'none';
        }
    });
});
</script>
@endsection