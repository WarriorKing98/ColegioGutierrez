<?php


class RutasModelo
{
    /** Función que arma las rutas del menú */
    static public function RutasNodelo($ruta)
    {
        // Definir un array de rutas públicas
        $rutasPublicas = [
            "creacion/registro/registro",
            "login/login"
        ];

        // Verificar si la ruta es válida
        if ($ruta == "creacion/registro/registro"
            || $ruta == "dashboard/dashboard" 
            || $ruta == "postularme/postularme"
            || $ruta == "login/login"
            || $ruta == "conocenos/conocenos"
            || $ruta == "postulados/postulados"
            || $ruta == "cursos/cursos"
            || $ruta == "perfil/perfil"
            || $ruta == "postulados/postulados.editar"
            || $ruta == "postulados/postulados.mostrar"
            || $ruta == "plantilla/salir"
            || $ruta == "Contacts/Contacts") {

            // Verificar si la ruta es pública o si la sesión está iniciada
            if (in_array($ruta, $rutasPublicas) || (isset($_SESSION["startSession"]) && $_SESSION["startSession"] == "Ok")) {
                // Crear variable para guardar la ruta al archivo PHP que vamos a abrir
                $pagina = "./vistas/" . $ruta . ".vista.php";
                return $pagina;
            } else {
                // Redirigir al login si la sesión no está iniciada y la ruta no es pública
                return "./vistas/login/login.vista.php";
            }

        } else {
            // Retornar una vista 404 si la ruta no es válida
            return "./vistas/404.vista.php";
        }
    }
}

?>