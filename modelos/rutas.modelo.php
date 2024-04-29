<?php


    class RutasModelo
    {
        /** Funcion  que arnma las rutas del menú */
        static public function RutasNodelo($ruta)
        {

            if($ruta == "creacion/administrativo/administrativo"
            || $ruta == "creacion/padres/padres"
            || $ruta == "dashboard/dashboard" 
            || $ruta == "postularme/postularme"
            || $ruta == "login/login"
            || $ruta == "conocenos/conocenos"
            || $ruta == "postulados/postulados"
            || $ruta == "cursos/cursos"
            || $ruta == "perfil/perfil"
            || $ruta == "Contacts/Contacts")
            {
                /** crar variable para guardar la ruta al archivo php que vamos a abrir */
                $pagina = "./vistas/" . $ruta . ".vista.php" ;

                return $pagina;

                /** ./vistas/inventarios/salidas/salidas.vista.php */
            }
        }

    }

?>