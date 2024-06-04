<?php
    /*=========================================================================================================
    *Desarrollado por                 : Juan Manuel Lopez Gonzalez
    *Fecha de creacion                : 30 Abril 2023
    *Lenguaje Programacion            : PHP
    *Producto o Sistema               : Postulaciones-Colegio
    *Tipo                             : Controlador
    *==========================================================================================================
    *Version Descripcion
    *[1.0.0.0] Controldaor de la tabla Postulado
    *==========================================================================================================
    *Modificaciones:
    *==========================================================================================================
    *Ver.         Fecha           Autor - Empresa                       Descripcion
    *------------ --------------- ------------------------------------- ---------------------------------------
    *1.0          30/04/2024      Juan Manuel Lopez Gonzalez            Version inicial del controlador 
    *==========================================================================================================
    */

   require_once "./modelos/parametros/postularme/postularme.model.php";
    
    class PostuladosController
    {
       static public function index(){

        $data = PostuladosModel::index();
        return $data;

       }


         // Método para crear registros
         static public function postular()
      {

            /** Validar que vengan datos en las variables pasadas desde la vista */
            if (isset($_POST["addInputName"])
               && isset($_POST["addInputLastname"])
               && isset($_POST["addInputAge"])
               && isset($_POST["addInputGrade"])
               && isset($_POST["addInputNumber"])
               && isset($_POST["addInputEmail"])
            )
            {
               $data = array(	"addInputName" => $_POST["addInputName"],
                              "addInputLastname" => $_POST["addInputLastname"],
                              "addInputAge" => $_POST[ "addInputAge"],
                              "addInputGrade" => $_POST["addInputGrade"],
                              "addInputNumber" => $_POST["addInputNumber"],
                              "addInputEmail" => $_POST[ "addInputEmail"],
                              //"userId" => $_SESSION["userId"]
                              "userId" => 1
                           );

               // Ejecutar el metodo create del modelo
               $response = PostuladosModel::postular($data);
               
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
                                    title: "La postulación se realizó con satisfacción, te daremos respuesta por correo o por llamada ",
                                
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                    }).then(function(result){
                                                if (result.value) {
                                                    /**Redireccionar a la página principal de postulaciones */
                                                    window.location.href = "index.php?ruta=cursos/cursos";
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