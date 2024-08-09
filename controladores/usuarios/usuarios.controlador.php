<?php

/* =============================================================================================================
* Desarrollado Por    		: Juan Manuel Lopez Gonzalez.
* Fecha de Creación 		  : 28/06/2024
* Lenguaje Programación 	: PHP
* Producto o sistema    	: POSTULACIONES-COLEGIO
* Tipo                    : Controlador
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Controlador Login Usuarios
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha    		  Autor – Empresa                       Descripción
* --------- ------------- -----------------------------------   -------------------------------------------------------
* 1.0       28/06/2024    Juan Manuel Lopez Gonzalez        Versión inicial del modelo
* ====================================================================================================================
*/
require_once "./modelos/usuarios/usuarios.modelo.php";
class UsuarioControlador{


    /**
     * Función para login de Usuarios en la aplicacion 
     */
    public function LoginUsuario(){

        if(isset($_POST["lgnEmail"]) && isset($_POST["lgnPassword"]) )
        {
            

                 //**Array de datos recibidos para enviar al modelo */               
                $values = array("email" => $_POST["lgnEmail"],
					           "password" => $_POST["lgnPassword"]);

                //**Llamar al modelo */
                $response = UsuarioModelo::LoginUsuario($values);

                if($response){

                    //**verificacion de login*/
                    $_SESSION["startSession"] = "Ok";
                    //**Guardar variables de los datos de los usuarios  */
                    $_SESSION["userId"] = $response["id"];
                    $_SESSION["nombre"] = $response["nombre"];
                    $_SESSION["apellido"] = $response["apellido"];
                    $_SESSION["foto"] = $response["foto"];
                    
                    //var_dump($response);
                    
                    //die();
                    //echo "<script> location.href=\"archivo.html\" </script>";
                    echo '<script>

								window.location = "index.php?ruta=dashboard/dashboard";
                                

							</script>';
                }
                    else{
                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }
                //var_dump($response['email']);

            
        }

    }
}



?>