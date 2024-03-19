@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Roles'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Formulario para crear un nuevo rol -->
        <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!-- Encabezado del formulario -->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Crear Rol</h4>
              <p class="card-category">Ingresar datos del rol</p>
            </div>
            <!-- Cuerpo del formulario -->
            <div class="card-body">
              <!-- Campo para ingresar el nombre del rol -->
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" autocomplete="off" autofocus>
                    <!-- Manejo de errores de validación -->
                    @if ($errors->has('name'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
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
                                        <!-- Checkbox para seleccionar permisos -->
                                          <label class="form-check-label">
                                              <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $id }}">
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
            <!-- Pie del formulario -->
            <div class="card-footer ml-auto mr-auto">
              <!-- Botón para enviar el formulario -->
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!-- Fin del pie del formulario -->
          </div>
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