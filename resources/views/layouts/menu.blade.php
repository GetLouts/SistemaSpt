<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class="fas fa-columns"></i><span>Panel de Control</span>
    </a>
    <li class="nav-item dropdown">
        @can('ver-menu')<a href="#" class="nav-link has-dropdown"><i class="fas fa-desktop"></i> <span>Administración</span></a>@endcan
        <ul class="dropdown-menu">
        @can('ver-menu-roles')<li><a class="nav-link" href="/roles"><i class="app-menu__icon fa fa-lock"></i>Roles</a></li>@endcan
       @can('ver-menu-periodos')<li><a class="nav-link" href="/periodos"><i class="app-menu__icon fa fa-box"></i>Periodos</a></li>@endcan
        @can('ver-menu-periodos')<li><a class="nav-link" href="/cursos"><i class="app-menu__icon fa fa-book"></i>Cursos</a></li>@endcan
        @can('ver-menu-usuarios')<li><a class="nav-link" href="/usuarios"><i class="app-menu__icon fa fa-users"></i>Usuarios</a></li>@endcan
        @can('ver-menu-alumnosa')<li><a class="nav-link" href="/alumnos"><i class="app-menu__icon fa fa-users"></i>Alumnos Activos</a></li>@endcan
        @can('ver-menu-alumnosa')<li><a class="nav-link" href="/alumnosinactivos"><i class="app-menu__icon fa fa-users"></i>Alumnos Inactivos</a></li>@endcan
       </ul>
      </li>
      <li class="nav-item dropdown">
        @can('ver-menu')<a href="#" class="nav-link has-dropdown"><i class="fas fa-chart-bar"></i><span>Graficos</span></a>@endcan
        <ul class="dropdown-menu">
        @can('ver-menu-graficas')<li><a class="nav-link" href="/gcomunidad"><i class="fas fa-poll"></i>Comunidad</a></li>@endcan
        @can('ver-menu-graficas')<li><a class="nav-link" href="/galumnos"><i class="fas fa-poll"></i>Alumnos</a></li>@endcan
        @can('ver-menu-graficas')<li><a class="nav-link" href="/gcursos"><i class="fas fa-poll"></i>Cursos</a></li>@endcan
        {{-- @can('ver-menu-graficas')<li><a class="nav-link" href="/gpatrocinadores"><i class="fas fa-poll"></i>Patrocinadores</a></li>@endcan
        @can('ver-menu-graficas')<li><a class="nav-link" href="/gedades"><i class="fas fa-poll"></i>Edades</a></li>@endcan --}}
        @can('ver-menu-graficas')<li><a class="nav-link" href="/gingresos"><i class="fas fa-poll"></i>Ingresos</a></li>@endcan
        </ul>
      </li>
      @can('ver-cronograma')<li><a class="nav-link" href="/cronogramas"><i class="fas fa-calendar-alt"></i><span>Cronograma</span></a></li>@endcan
    </ul>
</li>
