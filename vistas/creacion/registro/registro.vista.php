<?php
		require_once "./controladores/usuarios/crear.controlador.php";
?>
  <div class="hold-transition login-page">
    <div class="register-box">
      <div class="register-logo">
          <a><b>Crea una cuenta</b></a>
      </div>
      <div class="card"><!-- /.card -->
        <div class="card-body"><!-- /.card body-->
          <form method="post"><!-- /.Formulario-->
            <div class="input-group mb-3">
              <label for="inputDescription"></label>
                <input type="text" class="form-control" id="createName" name="addCreateName" placeholder="nombre completo ">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="inputDescription"></label>
                <input type="email" class="form-control" id="createEmail" name="addCreateEmail" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="inputDocument"></label>
                <input type="Text" class="form-control" id="createDocument" name="addCreateDocument" placeholder="C.C">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="inputNumber"></label>
                <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' id="createNumber" name="addCreateNumber" data-mask placeholder="Tel/Cel">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="inputPassword"></label>
                <input type="password" class="form-control" id="createPassword" name="addCreatePassword" placeholder="contraseña">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <label for="inputPasswordd"></label>
                <input type="password" class="form-control" id="createConfirm" name="addCreateConfirm" placeholder="confirmar contraseña">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
              </div>
            </div>
          </form><!-- /.Formulario-->
        </div><!-- /.card body -->
      </div><!-- /.card -->
    </div>
  </div>
  <?php
    //Llamar a la función del controlador: Crear 
    $addCrearModel = CrearuserController:: nuevo ();
  ?>