<?php

    /**Incluir los archivos de controladores requeridos */
    require_once "controladores/rutas.controlador.php";


    /**Incluir los archivos de Modelos requeridos */
    require_once "modelos/rutas.modelo.php";

    /**Inicializar la clase */

    $rutas = New RutasControlador();

    /**Ejecutar la funcion inicializar plantilla */

    $rutas -> IniciarPlantilla();

?>