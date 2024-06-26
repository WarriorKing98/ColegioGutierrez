<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inventarios-Adso</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./assets/temas/adminlte/plugins/fontawesome-free/css/all.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./assets/temas/adminlte/dist/css/adminlte.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="./assets/temas/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="./assets/temas/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="./assets/temas/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
       
        <!-- links para el calendario del Dashboard -->
        <!-- fullCalendar -->
        <link rel="stylesheet" href="./assets/temas/adminlte/plugins/fullcalendar/main.css">
        
        <!-- SweetAlert 2 -->
        <link rel="stylesheet" href="./assets/js/sweetalert2/sweetalert2.min.css">

        <!-- js para los cuadros de mensajes -->
        <script src="./assets/js/sweetalert2/sweetalert2.all.min.js"></script>

    </head>


    <body class="hold-transition sidebar-mini">

        <!-- Site wrapper -->
        <div class="wrapper">

            <?php

                include "encabezado.vista.php";

                include "menu.vista.php";

                /** Validar que ruta se esta pasamdo por la url  para abrir página */

                
                $rutas = new RutasControlador();
                $rutas -> Rutas();

                //include "./vistas/dashboard/dashboard.vista.php";

            ?> 

            <?php

                include "piepagina.vista.php";

            ?>




        </div>
        <!--  /Site wrapper -->






         <!-- DataTables  & Plugins -->
        <script src="./assets/temas/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/jszip/jszip.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <!-- jQuery -->
        <script src="./assets/temas/adminlte/plugins/jquery/jquery.js"></script>
        <!-- Bootstrap 4 -->
        <script src="./assets/temas/adminlte/plugins/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- AdminLTE App -->
        <script src="./assets/temas/adminlte/dist/js/adminlte.js"></script>

        <!-- scripts para el calendario del Dashboard -->
        <!-- fullCalendar 2.2.5 -->
        <script src="./assets/temas/adminlte/plugins/moment/moment.min.js"></script>
        <script src="./assets/temas/adminlte/plugins/fullcalendar/main.js"></script>
     
        <!-- Page specific script -->
        <script>
        $(function () {

            /* initialize the external events
            -----------------------------------------------------------------*/
            function ini_events(ele) {
            ele.each(function () {

                // create an Event Object (https://fullcalendar.io/docs/event-object)
                // it doesn't need to have a start or end
                var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                zIndex        : 1070,
                revert        : true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
                })

            })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
            -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
                };
            }
            });

            var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            events: [
                {
                title          : 'All Day Event',
                start          : new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor    : '#f56954', //red
                allDay         : true
                },
                {
                title          : 'Long Event',
                start          : new Date(y, m, d - 5),
                end            : new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor    : '#f39c12' //yellow
                },
                {
                title          : 'Meeting',
                start          : new Date(y, m, d, 10, 30),
                allDay         : false,
                backgroundColor: '#0073b7', //Blue
                borderColor    : '#0073b7' //Blue
                },
                {
                title          : 'Lunch',
                start          : new Date(y, m, d, 12, 0),
                end            : new Date(y, m, d, 14, 0),
                allDay         : false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor    : '#00c0ef' //Info (aqua)
                },
                {
                title          : 'Birthday Party',
                start          : new Date(y, m, d + 1, 19, 0),
                end            : new Date(y, m, d + 1, 22, 30),
                allDay         : false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor    : '#00a65a' //Success (green)
                },
                {
                title          : 'Click for Google',
                start          : new Date(y, m, 28),
                end            : new Date(y, m, 29),
                url            : 'https://www.google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor    : '#3c8dbc' //Primary (light-blue)
                }
            ],
            editable  : true,
            droppable : true, // this allows things to be dropped onto the calendar !!!
            drop      : function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color'    : currColor
            })
            })
            $('#add-new-event').click(function (e) {
            e.preventDefault()
            // Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            // Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color'    : currColor,
                'color'           : '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            // Add draggable funtionality
            ini_events(event)

            // Remove event from text input
            $('#new-event').val('')
            })
        })
        </script>

        
        <!-- JS propio del template y nuestra aplicación -->
        <script src="./assets/js/plantilla.js"></script>
        <script src="./assets/js/postulados.js"></script>
    </body>
</html>