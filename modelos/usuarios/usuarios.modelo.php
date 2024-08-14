<?php
    require_once "./modelos/connection.php";

    class UsuarioModelo{

        /**
         * login usuario
         */
        static public function LoginUsuario($values){

            /**
             * Consulta a base de datos
             */
            $data = Connection::Connect()->prepare("SELECT * FROM usuarios WHERE email = :email AND contrasena =:contrasena");

            /**
             * Enlazar parametros
             */
            $data-> bindParam(":email", $values["email"], PDO::PARAM_STR);
            $data-> bindParam(":contrasena", $values["contrasena"], PDO::PARAM_STR);

        
            $data -> execute();
        
            /** 
             * Trae el registro consultado 
             * */
            return $data->fetch();

            $data->close();

        }

      
        
    }
?>