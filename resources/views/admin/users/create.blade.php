@extends('admin.layout')

@push('css')
     <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
@endpush

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0 ">Editar Usuario</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')


    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Agreagar nuevo usuario</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">
                                Nombre:
                            </label>
                            <input
                                class="form-control
                                        @error('name')
                                            is-invalid
                                        @enderror"
                                name="name"
                                type="text"
                                placeholder="Ingrese el nombre del usuario"
                            >

                            @error('name')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email:
                            </label>
                            <input
                                class="form-control
                                        @error('email')
                                            is-invalid
                                        @enderror"
                                name="email"
                                type="email"
                                placeholder="Enter email">
                            @error('email')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">
                                Contraseña:
                            </label>
                            <input
                                class="form-control
                                        @error('password')
                                            is-invalid
                                        @enderror"
                                name="password"
                                type="password"
                                placeholder="Password"
                            >
                            @error('password')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">
                                Confirmar contraseña:
                            </label>
                            <input
                                class="form-control
                                        @error('password_confirmation')
                                            is-invalid
                                        @enderror"
                                name="password_confirmation"
                                type="password"
                                placeholder="Password"
                            >
                            @error('password_confirmation')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary {{ session('info') ? 'toastsDefaultSuccess' : '' }}">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-4"></div>
    </div>

@endsection

@push('js')
<!-- Toastr -->
<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>


<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
@endpush
