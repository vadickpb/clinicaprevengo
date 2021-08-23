@extends('admin.layout')

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
                <h3 class="card-title">Editar usuario</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')

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
                            value="{{ $user->name }}"
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
                            value="{{ $user->email }}"
                            placeholder="Enter email">
                        @error('email')
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
                        Editar
                    </button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-4"></div>
</div>
@endsection
