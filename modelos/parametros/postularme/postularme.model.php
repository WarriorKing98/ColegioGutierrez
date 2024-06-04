<?php
/*=========================================================================================================
    *Desarrollado por                 : Juan Manuel Lopez Gonzalez
    *Fecha de creacion                : 30 Abril 2023
    *Lenguaje Programacion            : PHP
    *Producto o Sistema               : Postulaciones-Colegio
    *Tipo                             : Controlador
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


class PostuladosModel{

    public static function index(){

        try {

            //Realizar la consulta a la base de datos */
            $datos = Connection::connect()->prepare("SELECT pos.id, pos.nombre, pos.apellidos, pos.Edad, pos.Grado, pos.numero_contacto, pos.correo
                            From postulados AS pos
                            ORDER BY pos.id DESC");
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



    /** Crear un registro en la tabla */
    static public function postular($data)
    {

        //Crear la consulta para insertar la postulación en la tabla 
        $postular = Connection::connect()->prepare("INSERT INTO postulados ( nombre, apellidos, Edad, Grado, numero_contacto, correo)
                                                    VALUES( :addInputName, :addInputLastname, :addInputAge, :addInputGrade, :addInputNumber, :addInputEmail)");
                                            
        /**Asignar parametros */
        $postular -> bindParam(":addInputName",$data["addInputName"], PDO::PARAM_STR);
        $postular -> bindParam(":addInputLastname",$data["addInputLastname"], PDO::PARAM_STR);
        $postular -> bindParam(":addInputAge",$data["addInputAge"], PDO::PARAM_INT);
        $postular -> bindParam(":addInputGrade",$data["addInputGrade"], PDO::PARAM_INT);
        $postular -> bindParam(":addInputNumber",$data["addInputNumber"], PDO::PARAM_INT);
        $postular -> bindParam(":addInputEmail",$data["addInputEmail"], PDO::PARAM_STR);
      
        /**Ejecutar la consulta */
        if($postular -> execute()){
            return "Ok";
        }
        else{
            return "Error Modelo";
        }
        
        /**Cerrar conexion a la bd */
        $postular->close();

    }

}


