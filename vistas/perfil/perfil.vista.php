<!-- Content Wrapper. Contains page content -->
<?php
          //hacer el llamado al archivo controlador
	      	  require_once "./controladores/postulados/postulados.controller.php";
?>

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content-header">
          <div class="card card-primary card-outline">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="./assets/imagenes/user1.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Jhon Alex</h3>

                <p class="text-muted text-center">Tutor</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Estudiantes a cargo</b> <a class="float-right">2</a>
                  </li>
                  <li class="list-group-item">
                    <b>Correo</b> <a class="float-right">*******@gmail.com</a>
                  </li>
                  <li class="list-group-item">
                    <b>Numero</b> <a class="float-right">***********656</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <section class="content">
              <div class="col-sm-6">
                <h1>Postulaciónes</h1>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">
                            <thead class="table-header">
                              <tr>
                                <th width="2%">ID</th>                                  
                                <th width="15%">Nombre</th>
                                <th width="15%">Apellidos</th>										
                                <th width="5%">Edad</th>
                                <th width="5%">Grado</th>
                                <th width="15%">Numero de contacto</th>
                                <th width="15%">Correo</th>
                                <th width="10%">CONSULTAR</th>
                              </tr>
                            </thead>
                            <tbody>


                              <?php

                                /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                $postulado = PostuladosController::index();
                                foreach($postulado as $key => $postulado){

                                echo ' <tr>
                                  <td>'. $postulado["id"] .'</td>
                                  <td>'. $postulado["nombre"] .'</td>
                                  <td>'. $postulado["apellidos"] .'</td>
                                  <td>'. $postulado["Edad"] .'</td>
                                  <td>'. $postulado["Grado"] .'</td>
                                  <td>'. $postulado["numero_contacto"] .'</td>
                                  <td>'. $postulado["correo"] .'</td>
                                  <td>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-eye nav-icon"></i> <span>Consultar</a>
                                  </td>
                                </tr>';


                                }



                              ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!--End Advanced Tables -->
                  </div>
                  <!-- End <div class="col-md-12"> -->
                </div>
                <!-- /. ROW  -->
              </div>
              <!-- /.card-body -->

              </div>


            </section>
            <!-- /.card -->
          </div>
    
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->