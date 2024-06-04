          <?php
          //hacer el llamado al archivo controlador
	      	  require_once "./controladores/postulados/postulados.controller.php";
          ?>
          
          <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>postulados</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                          </ol>
                        </div>
                      </div>
                    </div><!-- /.container-fluid -->
                  </section>
              
                  <!-- Main content -->
                  <section class="content">

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
                  <!-- /.content -->
                </div>
            <!-- /.content-wrapper -->