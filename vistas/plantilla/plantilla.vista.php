<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>I.E.D.Gutierrez</title>

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
       
        <!-- SweetAlert 2 -->
        <link rel="stylesheet" href="./assets/js/sweetalert2/sweetalert2.min.css">

        <!-- js para los cuadros de mensajes -->
        <script src="./assets/js/sweetalert2/sweetalert2.all.min.js"></script>

    </head>


    <body class="hold-transition sidebar-mini">
           
    <?php
            // Rutas que no requieren autenticación
            $rutasPublicas = [
                "login/login", 
                "creacion/registro/registro"
            ];

            // Verificar si se está solicitando una ruta pública
            if (isset($_GET['ruta']) && in_array($_GET['ruta'], $rutasPublicas)) {
                // Si la ruta está en la lista de rutas públicas, carga la vista sin validar la sesión
                $rutas = new RutasControlador();
                $rutas->Rutas();

            } elseif (isset($_SESSION["startSession"]) && $_SESSION["startSession"] == "Ok") {
                echo '<div id="wrapper">';
                include "encabezado.vista.php";
                include "menu.vista.php";

                // Validar qué ruta se está pasando por la URL para abrir la página
                $rutas = new RutasControlador();
                $rutas->Rutas();

                include "piepagina.vista.php";
                echo "</div>";
            } else {
                // Verificar si se está solicitando la salida
                if (isset($_GET["exit"]) && $_GET["exit"] == true) {
                    include "vistas/plantilla/salir.vista.php";
                } else {
                    // Iniciar sesión si no se ha solicitado la salida
                    include "./vistas/login/login.vista.php";
                }
            }

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
        <!-- JS propio del template y nuestra aplicación -->
        <script src="./assets/js/plantilla.js"></script>
        <script src="./assets/js/postulados.js"></script>
    </body>
</html>