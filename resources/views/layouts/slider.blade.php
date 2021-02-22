<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
  
    
    <div class="info">
      <a href="#" class="d-block">{{auth()->user()->name}}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->


      @if(Auth::user()->hasRole('admin'))
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users-cog"></i>
          <p>
            Control de Usuarios
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.usuarios.index')}}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>Usuarios SEZAC</p>
            </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.usuarios.empresas')}}" class="nav-link">
                <i class="fas fa-users"></i>
                <p>Usuarios Empresas</p>
              </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a href="{{route('empresas.index')}}" class="nav-link">
          <i class="nav-icon fas fa-store"></i>
          <p>
            Empresas

          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('candidatos.index')}}" class="nav-link">
          <i class="nav-icon fas fa-store"></i>
          <p>
            Candidatos

            </p>
        </a>
      </li>
      @else

      <li class="nav-item">
        <a href="{{route('listado.candidatos.por.usuario')}}" class="nav-link">
    
          <i class="nav-icon fas fa-store"></i>
          <p>
              Listado usuario logueado
            </p>
        </a>
      </li>

       <li class="nav-item">
        <a href="{{route('admin.candidatos.por.empresas')}}" class="nav-link">
          
          <i class="nav-icon fas fa-store"></i>
          <p>
              Listado general
            </p>
        </a>
      </li>

      

      @endif
      <li class="nav-item">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <i class="nav-icon fa fa-sign-out-alt"></i>
          <p>Cerrar Sesión</p>
        </a>
      </li>


    </ul>
  </nav>
  <!-- /.sidebar-menu -->

 
</div>