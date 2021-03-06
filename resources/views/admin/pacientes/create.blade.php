@extends('admin.layout')


@section('header')
    <div class="col-sm-6">
        <h1 class="m-0 ">Editar Paciente</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pacientes</li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')


    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Agreagar nuevo paciente</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pacientes.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">
                                Nombre:
                            </label>
                            <input
                                class="form-control
                                        @error('nombre')
                                            is-invalid
                                        @enderror"
                                name="nombre"
                                type="text"
                                placeholder="Ingrese el nombre del paciente"
                            >

                            @error('nombre')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellido">
                                Apellido:
                            </label>
                            <input
                                class="form-control
                                        @error('apellido')
                                            is-invalid
                                        @enderror"
                                name="apellido"
                                type="text"
                                placeholder="Ingrese el apellido del paciente">
                            @error('apellido')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->


            </div>
            <!-- /.card -->
        </div>


        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Agreagar nuevo paciente</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                    <div class="card-body">
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
                                placeholder="Ingrese el correo del paciente">
                            @error('email')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefono">
                                Tel??fono:
                            </label>
                            <input
                                class="form-control
                                        @error('telefono')
                                            is-invalid
                                        @enderror"
                                name="telefono"
                                type="text"
                                placeholder="Ingrese su n??mero de tel??fono"
                            >
                            @error('telefono')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
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


    </div>

@endsection
