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
               && isset($_POST["addInputActive"])
            )
            {
               $data = array( "addInputName" => $_POST["addInputName"],
                              "addInputLastname" => $_POST["addInputLastname"],
                              "addInputAge" => $_POST[ "addInputAge"],
                              "addInputGrade" => $_POST["addInputGrade"],
                              "addInputNumber" => $_POST["addInputNumber"],
                              "addInputEmail" => $_POST[ "addInputEmail"],
                              "addInputActive" => $_POST["addInputActive"],
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
                                    title: "La postulación se realizó con satisfacción, te daremos respuesta por correo o llamada ",
                                
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

      
         /**Médtodo para mostrar un registro de la tabla mediante el id enviado por la url */
         static public function show(){

            return $data = PostuladosModel::show($_GET["id"]);
   
         }
   
 
 
         /**
         * Actualizar un registro en la tabla postulaciones por medio del id
         */
         
         static public function update()
        {
          

            /** Validar que existan las variables recibidas del formulario */
            if(isset($_POST["editInputName"]) && isset($_POST["editInputLastname"])
            && isset($_POST["editInputAge"]) && isset($_POST["editInputGrade"])
            && isset($_POST["editInputNumber"])&& isset($_POST["editInputEmail"])
            && isset($_POST["editInputActive"])&& isset($_POST["id"])
        )
            {
                
                /**Armar la data a enviar al modelo */
                $data = array(	  
                                    "id"=>$_POST["id"],	
                                    "updateInputName" => $_POST["editInputName"],
                                    "updateInputLastname" => $_POST["editInputLastname"],
                                    "updateInputAge" => $_POST[ "editInputAge"],
                                    "updateInputGrade" => $_POST["editInputGrade"],
                                    "updateInputNumber" => $_POST["editInputNumber"],
                                    "updateInputEmail" => $_POST[ "editInputEmail"],
                                    "updateInputActive" => $_POST["editInputActive"],
                                    //"userId" => $_SESSION["userId"]
                                    "userId" => 1
                              );


                /**Llamar al modelo para actualizar el registro */
                $response = PostuladosModel::update($data);

                /** validar la respuesta del modelo  */
                if($response == "Ok")
                {
                    /** Enviar mensaje de actualización correcta */
                    echo '<script>
                    
                            Swal.fire({
                                icon: "success",
                                title: "La actualización de datos fue satisfactoria.",
                            
                               showConfirmButton: true,
                                confirmButtonText: "Ok"
                                }).then(function(result){
                                            if (result.value) {
                                                /**Redireccionar a la página principal de categorias de producto */
                                                window.location.href = "index.php?ruta=postulados/postulados";
                                            }
                                        })
					</script>';
                }
                else{
                    echo "ocurrio un error";
                }
            }
        }

    }
 ?>