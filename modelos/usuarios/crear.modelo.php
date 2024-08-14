<?php
/*=========================================================================================================
    *Desarrollado por                 : Juan Manuel Lopez Gonzalez
    *Fecha de creacion                : 12/08/2024
    *Lenguaje Programacion            : PHP
    *Producto o Sistema               : Postulaciones-Colegio
    *Tipo                             : Modelo
    *==========================================================================================================
    *Version Descripcion
    *[1.0.0.0]  Modelo de la tabla Postulado
    *==========================================================================================================
    *Modificaciones:
    *==========================================================================================================
    *Ver.         Fecha           Autor - Empresa                       Descripcion
    *------------ --------------- ------------------------------------- ---------------------------------------
    *1.0          30/04/2024      Juan Manuel Lopez Gonzalez            Version inicial del controlador 
    *==========================================================================================================
*/

    require_once "./modelos/connection.php";

    class CrearuserModel{

        public static function index (){

            try{
                
                //Realizar la consulta a la base de datos usuarios */
                $datos = Connection::connect()->prepare("SELECT usu.id, usu.nombre, usu.email, usu.numero_id, usu.tel_cel, usu.contrasena, usu.c_password
                                ORDER BY usu.id DESC");
                //Ejecutar la consulta*/
                $datos->execute();

                /**Devuelve los datos consultados */
                return $datos->fetchAll();

                /** Cerrar conexion a la base de datos*/
                $datos->close();
                
            }   catch (Exception $e){
                echo $e->getMESSAGE();
                die();
            }
        }

        static public function create($dato)
        {
            // Crear la consulta para insertar la postulación en la tabla         
            $crear = Connection::connect()->prepare(
                "INSERT INTO usuarios (nombre, email, numero_id, tel_cel, contrasena, c_password)
                 VALUES (:addCreateName, :addCreateEmail, :addCreateDocument, :addCreateNumber, :addCreatePassword, :addCreateConfirm)"
            );
        
            /** Asignar parámetros */
            $crear->bindParam(":addCreateName", $dato["addCreateName"], PDO::PARAM_STR);//STR ya que es una cadena de texto
            $crear->bindParam(":addCreateEmail", $dato["addCreateEmail"], PDO::PARAM_STR);  //STR ya que es una cadena de texto
            $crear->bindParam(":addCreateDocument", $dato["addCreateDocument"], PDO::PARAM_INT);
            $crear->bindParam(":addCreateNumber", $dato["addCreateNumber"], PDO::PARAM_INT);
            $crear->bindParam(":addCreatePassword", $dato["addCreatePassword"], PDO::PARAM_STR);//STR ya que es una cadena de texto
            $crear->bindParam(":addCreateConfirm", $dato["addCreateConfirm"], PDO::PARAM_STR);//STR ya que es una cadena de texto
        
            /** Ejecutar la consulta */
            if ($crear->execute()) {
                return "Ok";
            } else {
                return "Error Modelo";
            }
              /**Cerrar conexion a la bd */
              $crear->close();
        }
        
    }
?>