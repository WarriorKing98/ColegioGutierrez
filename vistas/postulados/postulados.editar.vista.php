<?php
		require_once "./controladores/postulados/postulados.controller.php";
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <form role="form" method="post">
                <div class="card-body">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header-form">
                                    <h3 class="card-title">Editar</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <?php
                                                /** Consultar el registro por medio del id pasado por la url */
                                                $editpostulados = PostuladosController::show();
                                                
                                                    echo '<div class="form-group">
                                                            <input id="id" name="id" type="hidden" value='.$editpostulados["id"].'>
                                                            <label for="inputCode">Nombres del estudiante</label>
                                                            <input type="text" id="inputName" class="form-control"  name="editInputName" value="'.$editpostulados["nombre"].'" placeholder="Ingrese los nombres completos del estudiante postulado" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Apellidos del estudiante</label>
                                                            <input type="text" id="inputLastname" class="form-control"  name="editInputLastname" value="'.$editpostulados["apellidos"].'" placeholder="Ingrese los Aoellidos del estudiante postulado" required="" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Edad</label>
                                                            <input type="number" id="inputAge" class="form-control"  name="editInputAge" value="'.$editpostulados["Edad"].'" placeholder="Ingrese la edad del estudiante postulado" required minlength="1" maxlength="2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Grado al que ingresa</label>
                                                            <input type="number" id="inputGrade" class="form-control"  name="editInputGrade" value="'.$editpostulados["Grado"].'" placeholder="Grado al que aspira" required minlength="1" maxlength="1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Número del acudiente </label>
                                                            <input type="tel" id="inputNumber" class="form-control"  name="editInputNumber" value="'.$editpostulados["numero_contacto"].'" placeholder="Cel/Tel" required="">
                                                        </div>                                  
                                                        <div class="form-group">
                                                            <label for="inputDescription">Correo del acudiente </label>
                                                            <input type="email" id="inputEmail" class="form-control"  name="editInputEmail" value="'.$editpostulados["correo"].'" placeholder="Ingrese un correo de contacto" required="">
                                                        </div> ';
                                            ?>
                                        </div>
                                    </div>    
                                    <!-- /.card-body -->
                                </div>
                            <!-- /.card -->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i> <span>Actualizar</button>
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
            <!-- /.card-body -->
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!--Content -Wrapper -->
<?php
    /**
     * Llamar a la función del controlador: Crear 
     */
    $addpostularModel = PostuladosController::postular();

?>
