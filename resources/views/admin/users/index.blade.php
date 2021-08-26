@extends('admin.layout')

@push('css')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0 ">Usuarios del Sistema</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Usuarios del Sistema</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                            {{ $user->getRoleNames()->implode(' - ') }}

                                    </td>
                                    <td>
                                        <div class="row">

                                            <a
                                                class="mr-2 btn btn-primary btn-sm"
                                                href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                title="Editar"
                                            >
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <form
                                                class="form-eliminar"
                                                action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                method="post"
                                            >
                                            @csrf
                                            @method('DELETE')
                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    type="submit"
                                                    title="Eliminar"
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@push('js')
    <!-- Toastr -->
    <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>



    {{-- Sweet Alert Scripts --}}
    <script>

        @if (session('message') == 'eliminado')
            Swal.fire(
                    'Eliminado!',
                    'El usuario fue eliminado.',
                    'success'
                    )
        @endif

        @if (session('message') == 'editado')
            Swal.fire(
                    'Usuario editado!',
                    'El usuario fue editado con éxito.',
                    'success'
                    )
        @endif

        @if (session('message') == 'agregado')
            Swal.fire(
                    'Usuario agregado!',
                    'El usuario fue agregado con éxito.',
                    'success'
                    )
        @endif


        // @if (session('message') == 'agregado')
        //     toastr.options =
        //         {
        //             "closeButton" : true,
        //             "progressBar" : true
        //         }
        //     toastr.success("El usuario se agregó correctamente");

        // @endif




        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Esta seguro?',
                text: "Este usuario se eliminará definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })

    </script>
@endpush
