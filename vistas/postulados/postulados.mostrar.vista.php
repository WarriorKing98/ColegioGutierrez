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
                                    <h3 class="card-title">Consultar postulados</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <?php
                                                /** Consultar el registro por medio del id pasado por la url */
                                                $showpostulados = PostuladosController::show();
                                                
                                                    echo '<div class="form-group">
                                                            <input id="id" name="id" type="hidden" value='.$showpostulados["id"].'>
                                                            <label for="inputCode">Nombres del estudiante</label>
                                                            <input type="text" id="inputName" class="form-control"  name="editInputName" value="'.$showpostulados["nombre"].'" placeholder="Ingrese los nombres completos del estudiante postulado" required="" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Apellidos del estudiante</label>
                                                            <input type="text" id="inputLastname" class="form-control"  name="editInputLastname" value="'.$showpostulados["apellidos"].'" placeholder="Ingrese los Aoellidos del estudiante postulado" required="" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Edad</label>
                                                            <input type="number" id="inputAge" class="form-control"  name="editInputAge" value="'.$showpostulados["Edad"].'" placeholder="Ingrese la edad del estudiante postulado" required minlength="1" maxlength="2" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Grado al que ingresa</label>
                                                            <input type="number" id="inputGrade" class="form-control"  name="editInputGrade" value="'.$showpostulados["Grado"].'" placeholder="Grado al que aspira" required minlength="1" maxlength="1" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputDescription">Número del acudiente </label>
                                                            <input type="tel" id="inputNumber" class="form-control"  name="editInputNumber" value="'.$showpostulados["numero_contacto"].'" placeholder="Cel/Tel" required="" readonly>
                                                        </div>                                  
                                                        <div class="form-group">
                                                            <label for="inputDescription">Correo del acudiente </label>
                                                            <input type="email" id="inputEmail" class="form-control"  name="editInputEmail" value="'.$showpostulados["correo"].'" placeholder="Ingrese un correo de contacto" required="" readonly>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="inputActive">ACTIVO</label>
                                                            <select id="inputActive" class="form-control custom-select" name="editInputActive" disabled>
                                                            <option value = '.$showpostulados["activo"].' > '.$showpostulados["activo"].' </option>
                                                                <option value=1>SI</option>
                                                                <option value=0>NO</option>
                                                            </select>
                                                        </div>';
                                            ?>
                                    </div>    
                                    <!-- /.card-body -->
                                </div>
                            <!-- /.card -->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <?php 
                                echo '<a href="index.php?ruta=postulados/postulados.editar&id='.$showpostulados["id"].'"" class="btn btn-primary"><i class="far fa-edit nav-icon"></i> <span></i> <span>Editar</a>'; 
                                ?>
                                <a href="index.php?ruta=parametros/marcas/marca" class="btn btn-warning"><i class="fa fa-power-off nav-icon"></i> <span>Cancelar</a>
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
