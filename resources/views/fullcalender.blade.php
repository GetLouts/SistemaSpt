@extends('layouts.app')
@section('title')
    Cronograma
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <section class="section mt-2">
        <div class="section-header">
            <h3 class="page__heading">Cronograma</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="mt-4" id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                var SITEURL = "{{ url('/') }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    locale: 'es',
                    eventColor: '#0077B6',
                    eventTextColor: 'white',
                    events: SITEURL + "/fullcalender",
                    displayEventTime: false,
                    editable: true,
                    eventRender: function(event, element, view) {
                        if (event.allDay === 'true') {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                        var title = bootbox.prompt(
                            "Desea agregar una nueva actividad?",
                            function(result) {
                                console.log(result);
                                if (result !== null) {

                                    console.log("Pase por aca")

                                    $.ajax({
                                        url: SITEURL + "/fullcalenderAjax",
                                        data: {
                                            title: result,
                                            start: start,
                                            end: end,
                                            type: 'add'
                                        },
                                        type: "POST",
                                        success: function(data) {
                                            displayMessage(
                                                "Evento Creado Satisfactoriamente"
                                            );

                                            calendar.fullCalendar('renderEvent', {
                                                id: data.id,
                                                title: result,
                                                start: start,
                                                end: end,
                                                allDay: allDay
                                            }, true);

                                            calendar.fullCalendar('unselect');
                                        }
                                    });
                                    title.modal('hide');
                                } else {
                                    title.modal('hide');
                                    calendar.fullCalendar('unselect');
                                }
                                return false;
                            }
                        );
                    },
                    eventDrop: function(event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function(response) {
                                displayMessage("Evento Actualizado Satisfactoriamente");
                            }
                        });
                    },
                    eventClick: function(event) {
                        var deleteMsg = bootbox.confirm({
                            size: "small",
                            message: "Desea Eliminar el Evento?",
                            callback: function(result) {
                                if (result) {
                                    $.ajax({
                                        type: "POST",
                                        url: SITEURL + '/fullcalenderAjax',
                                        data: {
                                            id: event.id,
                                            type: 'delete'
                                        },
                                        success: function(response) {
                                            calendar.fullCalendar('removeEvents',
                                                event.id);
                                            displayMessage(
                                                "Evento Borrado Satisfactoriamente"
                                            );
                                        }
                                    });
                                }
                            }
                        })
                    }

                });

            });

            function displayMessage(message) {
                toastr.success(message, 'Event');
            }
        </script>
    </section>
@endsection
