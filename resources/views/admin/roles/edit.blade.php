@extends('admin.layout')

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0 ">Roles</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3>Editar el rol {{ $role->name }}</h3>
                </div>
                <form
                action="{{ route('roles.update', ['role' => $role->id]) }}"
                method="POST"
                >
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">
                                Nombre del rol
                            </label>
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                type="text"
                                name="name"
                                value="{{ $role->name }}"
                                placeholder="Nombre del rol"
                            >

                            @error('name')
                                <span class="error invalid-feedback d-block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <hr>


                        <div class="form-group">
                            <label for="">
                                Selecciona los permisos del rol:
                            </label>

                            @foreach ($permisos as $permiso)
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="permisos[]"
                                        value="{{ $permiso->id }}"
                                        {{ $role->permissions->pluck('id')->contains($permiso->id) ? 'checked' : '' }}

                                    >
                                    <label
                                        class="form-check-label"
                                        for="roles[]"
                                    >
                                    {{ $permiso->display_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="card-footer">
                        <input class="btn btn-primary float-right" type="submit" value="Editar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
