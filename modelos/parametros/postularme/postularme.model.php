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
        $postular = Connection::connect()->prepare("INSERT INTO postulados ( nombre, apellidos, Edad, Grado, numero_contacto, correo, user_create)
                                                    VALUES( :addInputName, :addInputLastname, :addInputAge, :addInputGrade, :addInputNumber, :addInputEmail, :userId)");
                                            
        /**Asignar parametros */
        $postular -> bindParam(":addInputName",$data["addInputName"], PDO::PARAM_STR);
        $postular -> bindParam(":addInputLastname",$data["addInputLastname"], PDO::PARAM_STR);
        $postular -> bindParam(":addInputAge",$data["addInputAge"], PDO::PARAM_INT);
        $postular -> bindParam(":addInputGrade",$data["addInputGrade"], PDO::PARAM_INT);
        $postular -> bindParam(":addInputNumber",$data["addInputNumber"], PDO::PARAM_INT);
        $postular -> bindParam(":addInputEmail",$data["addInputEmail"], PDO::PARAM_STR);
        $postular -> bindParam(":userId",$data["userId"], PDO::PARAM_INT);
        
      
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

        /** Recuperar un registro en la tabla por medio del id pasado por parametro $id */
        static public function show($id)
        {
            /** Realizar la consulta a la base de datos */
            $data = Connection::connect()->prepare("SELECT pos.id, pos.nombre, pos.apellidos, pos.Edad, pos.Grado, pos.numero_contacto, pos.correo
            From postulados AS pos
            WHERE pos.id =:id");

            /** Inicializar los parametros de la consulta */
            $data -> bindParam(":id", $id, PDO::PARAM_INT);

            /**Ejecutar la consulta */
            $data -> execute();
            
            /** Devuelve el registro consultado */
            return $data->fetch();

            /**Cerrar conexion a la bd */
            $data->close();

        }



        /**
         * Actualizar un registro en la tabla  por medio del id 
         */
        static public function update($data){


            
            /** Armar la consulta a la base de datos */
            $update = Connection::Connect()->prepare("UPDATE postulados SET nombre = :updateInputName, apellidos = :updateInputLastname,  
            Edad = :updateInputAge, Grado = :updateInputGrade, numero_contacto = :updateInputNumber, correo = :updateInputEmail, user_update= :userId
            WHERE id = :id");
        
             /**Asignar parametros*/
            $update -> bindParam(":id", $data["id"], PDO::PARAM_INT);
            $update -> bindParam(":updateInputName",$data["updateInputName"], PDO::PARAM_STR);
            $update -> bindParam(":updateInputLastname",$data["updateInputLastname"], PDO::PARAM_STR);
            $update -> bindParam(":updateInputAge",$data["updateInputAge"], PDO::PARAM_INT);
            $update -> bindParam(":updateInputGrade",$data["updateInputGrade"], PDO::PARAM_INT);
            $update -> bindParam(":updateInputNumber",$data["updateInputNumber"], PDO::PARAM_INT);
            $update -> bindParam(":updateInputEmail",$data["updateInputEmail"], PDO::PARAM_STR);
            $update -> bindParam(":userId",$data["userId"], PDO::PARAM_INT);

            /** Ejecutar la consulta y retornar el resultado al controlador */
            if($update -> execute()){
                return "Ok";
            }
            else
            {
                return "Error";
            }
  
            /** Cerrar conexion a la bd */
            $update->close();
  
        }

}


