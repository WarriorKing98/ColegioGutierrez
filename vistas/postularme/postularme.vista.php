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
                                    <h3 class="card-title">Postulación a cupo escolar</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="inputCode">Nombres del estudiante</label>
                                                <input type="text" id="inputName" class="form-control"  name="addInputName" placeholder="Ingrese los nombres completos del estudiante postulado" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Apellidos del estudiante</label>
                                                <input type="text" id="inputLastname" class="form-control"  name="addInputLastname" placeholder="Ingrese los Aoellidos del estudiante postulado" required="" >
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Edad</label>
                                                <input type="number" id="inputAge" class="form-control"  name="addInputAge" placeholder="Ingrese la edad del estudiante postulado" required minlength="1" maxlength="2">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Grado al que ingresa</label>
                                                <input type="number" id="inputGrade" class="form-control"  name="addInputGrade" placeholder="Grado al que aspira" required minlength="1" maxlength="1">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Número del acudiente </label>
                                                <input type="tel" id="inputNumber" class="form-control"  name="addInputNumber" placeholder="Cel/Tel" required="">
                                            </div>                                  
                                            <div class="form-group">
                                                <label for="inputDescription">Correo del acudiente </label>
                                                <input type="email" id="inputEmail" class="form-control"  name="addInputEmail" placeholder="Ingrese un correo de contacto" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputActive">ACTIVO</label>
                                                <select id="inputActive" class="form-control custom-select" name="addInputActive" required>
                                                    <option Value="">Seleccione si esta activo el registro.</option>
                                                    <option value=1>SI</option>
                                                    <option value=0>NO</option>
                                                </select>
                                            </div>
                                    </div>
                                <!-- /.card-body -->
                                </div>
                            <!-- /.card -->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save nav-icon"></i> <span>Enviar</button>
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
