<?php
/* =============================================================================================================
* Desarrollado Por    		: Juan Manuel Lopez Gonzalez.
* Fecha de Creación 		: 12/08/2024
* Lenguaje Programación 	: PHP
* Producto o sistema    	: POSTULACIONES-COLEGIO
* Tipo                      : Controlador
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Controlador Crear Usuario
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha    		  Autor – Empresa                       Descripción
* --------- ------------- -----------------------------------   -------------------------------------------------------
* 1.0       12/08/2024    Juan Manuel Lopez Gonzalez            Versión inicial del Crontrolador
* ====================================================================================================================
*/

require_once "./modelos/usuarios/crear.modelo.php";
    
    class CrearuserController
    {
       static public function index(){

        $dato = CrearuserModel::index();
        return $dato;

       }


         // Método para crear registros
         static public function nuevo()
      {

            /** Validar que vengan datos en las variables pasadas desde la vista */
            if (isset($_POST["addCreateName"])
               && isset($_POST["addCreateEmail"])
               && isset($_POST["addCreateDocument"])
               && isset($_POST["addCreateNumber"])
               && isset($_POST["addCreatePassword"])
               && isset($_POST["addCreateConfirm"])
            )
            {
               $dato = array( 
                              "addCreateName" => $_POST["addCreateName"],
                              "addCreateEmail" => $_POST[ "addCreateEmail"],
                              "addCreateDocument" => $_POST["addCreateDocument"],
                              "addCreateNumber" => $_POST["addCreateNumber"],
                              "addCreatePassword" => $_POST["addCreatePassword"],
                              "addCreateConfirm" => $_POST["addCreateConfirm"],
                           );
               // Ejecutar el metodo create del modelo
               $response = CrearuserModel:: create ($dato);

               //Enviar Mensaje de postulacion exitosa 
               if($response == "Ok")
                      {
                        echo 'Swal.fire("SweetAlert2 is working!")';
                        //var_dump($response);
                        //die();
                        /** Enviar mensaje de creación correcta */
                          echo '<script>
                          
                                  Swal.fire({
                                    icon: "success",
                                    title: "El usuario se creó satisfactoriamente",
                                
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                    }).then(function(result){
                                                if (result.value) {
                                                    /**Redireccionar a la página principal de postulaciones */
                                                    window.location.href = "index.php?ruta=login/login";
                                                }
                                            })
                                </script>';

                      }
                      else{
                          echo "error controlador";
                      }

            }
      }

    }
?>
