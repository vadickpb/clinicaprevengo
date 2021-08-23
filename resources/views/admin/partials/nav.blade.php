<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="dropdown user user-menu open">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <!-- The user image in the navbar-->
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>




            <ul class="dropdown-menu p-2">
                <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                    <p>
                        {{ Auth::user()->name }}
                        <small>Member since Nov. 2012</small>
                    </p>
                </li>
                <div class="dropdown-divider"></div>

                <!-- Menu Footer-->
                <li class="dropdown-item">
                    <div class="row d-flex justify-content-between">

                        <a href="#" class="btn btn-default">Perfil</a>

                        <form class="float-right" action="{{ route('logout') }}" method="POST">
                            @csrf

                            <input class="btn btn-default" type="submit" value="Cerrar Sesión">
                        </form>
                    </div>



                </li>
            </ul>
        </li>


    </ul>
</nav>
<!-- /.navbar -->
