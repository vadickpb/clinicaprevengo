@extends('admin.layout')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.min.js"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

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
                            <label for="descripcion">Fecha:</label>
                            <input class= "form-control" type="date" name="fecha" id="hora">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="descripcion">Hora de inicio:</label>
                                <input class= "form-control" type="time" name="hora_inicio" id="hora">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="descripcion">Hora de fin:</label>
                                <input class= "form-control" type="time" name="hora_fin" id="hora">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                        </div> --}}


                        <!-- Date and time -->
                        {{-- <div class="form-group">
                            <label>Date and time:</label>
                            <div class="input-group date" id="reservationdatetim" data-target-input="nearest">
                                <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <!-- Date and time range -->
                        <div class="form-group">
                            <label>Date and time range:</label>

                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" name="datetimer" id="reservationtime">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group --> --}}

                        {{-- <div class="form-group" >
                            <label for="date">date and time range:</label>
                            <input type="text" class="form-control" name="datetimer" id="reservationtime" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div> --}}

                        {{-- <div class="form-group" >
                            <label for="date">date</label>
                            <input type="date" class="form-control" name="date" id="date" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div> --}}

                        {{-- <div class="form-group" >
                            <label for="timestart">timestart</label>
                            <input type="time" class="form-control" name="timestart" id="timestart" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div> --}}

                        <!-- Date and time -->
                        <div class="form-group">
                            <label>Fecha y hora de inicio:</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" name="start" id="start" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.form group -->

                        <!-- Date and time -->
                        <div class="form-group">
                            <label>Fecha y hora de final:</label>
                            <div class="input-group date" id="reservationdatetime1" data-target-input="nearest">
                                <input type="text" name="end" id="end" class="form-control datetimepicker-input" data-target="#reservationdatetime1"/>
                                <div class="input-group-append" data-target="#reservationdatetime1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.form group -->




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
                initialView: 'timeGridWeek',

                locale: 'es',
                selectable: true,

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek'
                },

                events: baseURL+"/admin/citas/mostrar",
                // [
                //     //
                //     {
                //         title: 'evento1',
                //         start: "2021-09-15 12:30"
                //     },
                //     {
                //         title: "evento2",
                //         start: "2021-09-17 15:00:00",
                //         end: "2021-09-17 18:00:00"

                //     }
                // ],





                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                },
                dateClick:function(info){

                    console.log(`la fecha de la cita es: ${info.dateStr}`);

                    formulario.reset();




                    $('#evento').modal("show");

                },

                select:function(info){
                    // console.log(info);
                    // console.log(info.start.toISOString().split('T')[0]);
                    // console.log(info.startStr.split('T'));
                    // console.log(info.start.toLocaleTimeString().split(':')[0]+":"+info.start.toLocaleTimeString().split(':')[1]);


                    formulario.reset();

                    console.log(moment(info.startStr).format('MM/D/yyyy h:mm a'));



                    // formulario.fecha.value = info.startStr.split('T')[0];
                    // formulario.hora_inicio.value = info.start.toLocaleTimeString().split(':')[0]+":"+info.start.toLocaleTimeString().split(':')[1];
                    // formulario.hora_fin.value = info.end.toLocaleTimeString().split(':')[0]+":"+info.end.toLocaleTimeString().split(':')[1]



                    // formulario.start.value = info.startStr.split('T')[0]+" "+info.startStr.split('T')[1];
                    // formulario.end.value = info.endStr.split('T')[0]+" "+info.endStr.split('T')[1];

                    formulario.start.value = moment(info.startStr).format('MM/D/yyyy h:mm A');
                    formulario.end.value = moment(info.endStr).format('MM/D/yyyy h:mm A');



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
                        formulario.start.value = moment(result.data.start).format('MM/D/yyyy h:mm A');
                        formulario.end.value = moment(result.data.end).format('MM/D/yyyy h:mm A');
                        $('#evento').modal('show');
                    }).catch((err) => {
                    });
                }


            });
            calendar.render();

            document.getElementById('btnGuardar').addEventListener('click', () => {

                // console.log(formulario.hora_inicio.value);
                //console.log(formulario.start.value);
                // console.log(formulario.end.value);

                //console.log(moment(new Date(formulario.start.value)).format());



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


            //Date and time picker
            $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

            //Date and time picker
            $('#reservationdatetime1').datetimepicker({ icons: { time: 'far fa-clock' } });

            //Date range picker with time picker
            $('#reservationdatetime').datetimepicker({


                timeFormat: 'hh:mm:ss',
                ampm: false

            })


        });

    </script>
@endpush
