@extends('admin.layout')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.min.js"></script>

    <script type="text/javascript">
        const baseURL = {!! json_encode(url('/')) !!}
    </script>
@endpush


@section('header')

@endsection

@section('content')
    <h1>Citas</h1>
    <div class="p-4" id='cita'>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
      Launch
    </button>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form" method="POST">
                        @csrf
                        <div class="form-group d-none" >
                            <label for="">ID:</label>
                            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        {{-- <div class="form-group">
                            <label for="descripcion">Hora</label>
                            <input class= "form-control" type="time" name="hora" id="hora">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div> --}}

                        <div class="form-group" >
                            <label for="date">date</label>
                            <input type="date" class="form-control" name="date" id="date" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>




                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-warning" id="btnEditar">Editar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        document.addEventListener('DOMContentLoaded', function() {

            let formulario = document.querySelector("#form");


            var calendarEl = document.getElementById('cita');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',

                locale: 'es',

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek'
                },
                events: baseURL+"/admin/citas/mostrar",

                dateClick:function(info){

                    console.log(info.date);

                    formulario.reset();

                    formulario.date.value = info.dateStr;


                    $('#evento').modal("show");

                },

                eventClick:function(info) {
                    let cita = info.event;
                    console.log(cita);

                    axios.get(baseURL+"/admin/citas/edit/"+info.event.id)
                    .then((result) => {

                        formulario.id.value = result.data.id;
                        formulario.title.value = result.data.title;
                        formulario.descripcion.value = result.data.descripcion;
                        formulario.date.value = result.data.dateStr;


                        $('#evento').modal('show');
                    }).catch((err) => {

                    });
                }

            });
            calendar.render();

            document.getElementById('btnGuardar').addEventListener('click', () => {

                enviarDatos("/admin/citas")
            })

            document.getElementById('btnEliminar').addEventListener('click', () => {

                enviarDatos("/admin/citas/delete/"+formulario.id.value)

            })

            document.getElementById('btnEditar').addEventListener('click', () => {

                enviarDatos("/admin/citas/update/"+formulario.id.value)

            })

            const enviarDatos = (url) => {

                const nuevaUrl = baseURL;
                const data = new FormData(formulario);

                axios.post(nuevaUrl+url, data).
                then((result) => {
                    calendar.refetchEvents();
                    $('#evento').modal('hide')
                }).catch((err) => {
                    console.log('hubo un error');
                });
            }


        });

    </script>
@endpush
