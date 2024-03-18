<footer class="footer">
  <div class="container-fluid">
    <nav class="float-left">
      <ul>
        <li>
          <a href="{{ route('home') }}">
              {{ __('Home') }}
          </a>
        </li>
        <li>
          @can('user_index')
          <a href="{{ route('users.index') }}">
              {{ __('Usuarios') }}
          </a>
          @endcan
        </li>
        <li>
          @can('permission_index')
          <a href="{{ route('permissions.index') }}">
              {{ __('Permisos') }}
          </a>
          @endcan
        </li>
        <li>
          @can('role_index')
          <a href="{{ route('roles.index') }}">
              {{ __('Roles') }}
          </a>
          @endcan
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
    </div>
  </div>
</footer>