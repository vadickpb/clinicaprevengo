@extends('admin.layout')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

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

<div class="card">
    <div class="card-header">
        <a href="{{ route('roles.create') }}" class="btn btn-success float-right">Agregar Role</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td style="width: 10px">
                            <div class="row">
                                <a
                                    class="mr-2 btn btn-primary btn-sm"
                                    href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                    title="Editar"
                                >
                                    <i class="fas fa-pen"></i>
                                </a>

                                <form class="form-eliminar" action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" title="Eliminar">
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
</div>


@endsection

@push('js')
    <!-- Toastr -->
    <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>

    // SweetAlert2 Eliminar, Editar y Agregar
    @if (session('message') == 'eliminado')
            Swal.fire(
                    'Eliminado!',
                    'El rol fue eliminado.',
                    'success'
                    )
    @endif

    @if (session('message') == 'editado')
        Swal.fire(
                'Editado!',
                'El rol fue editado correctamente.',
                'success'
                )
    @endif

    @if (session('message') == 'agregado')
        Swal.fire(
                'Agregado!',
                'El rol se agregó correctamente',
                'success'
                )
    @endif

    $('.form-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Esta seguro?',
            text: "Este rol se eliminará definitivamen",
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
