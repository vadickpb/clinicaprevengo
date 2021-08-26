<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Clínica Prevengo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        @php
            function activeMenu(array $urls)
            {
                foreach ($urls as $url) {
                    if (request()->is($url)) {
                        return 'active';
                    }
                }

                return '';
            }

            function openMenu(array $urls)
            {
                foreach ($urls as $url) {
                    if (request()->is($url)) {
                        return 'menu-open';
                    }
                }

                return '';
            }
        @endphp


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <li class="nav-item {{ openMenu(['admin/users']) }}">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ activeMenu(['admin']) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>



                    <li class="nav-item {{ openMenu(['admin/users', 'admin/users/create']) }}">
                        <a href="#" class="nav-link {{ activeMenu(['admin/users', 'admin/users/create']) }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link {{ activeMenu(['admin/users']) }}">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>Mostrar usuarios</p>
                                </a>
                            </li>
                            @can('users.create')
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}"
                                        class="nav-link {{ activeMenu(['admin/users/create']) }}">
                                        <i class="fas fa-pen nav-icon"></i>
                                        <p>Agregar nuevo usuario</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>




                <li class="nav-item {{ openMenu(['admin/pacientes', 'admin/pacientes/create']) }}">
                    <a href="#" class="nav-link {{ activeMenu(['admin/pacientes', 'admin/pacientes/create']) }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>
                            Pacientes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pacientes.index') }}"
                                class="nav-link {{ activeMenu(['admin/pacientes']) }}">
                                <i class="far fa-eye nav-icon"></i>
                                <p>Mostrar pacientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pacientes.create') }}"
                                class="nav-link {{ activeMenu(['admin/pacientes/create']) }}">
                                <i class="fas fa-pen nav-icon"></i>
                                <p>Agregar paciente</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ activeMenu(['admin/roles', 'admin/roles/create', 'admin/roles/*/edit']) }} ">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Triaje
                        </p>
                    </a>
                </li>


                <li class="nav-item ">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Atención
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Historias
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
