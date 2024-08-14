<?php
  //hacer el llamado al archivo controlador
	require_once "./controladores/usuarios/usuarios.controlador.php";
?>
<div class=" login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1"><b>ingresar</b></a>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="lgnEmail">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="lgnPassword">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </div>
                    </div>
                    <?php
                    /**
                     * Crear variable para llamar al conrolador y ejecutar la función de login
                     */
                    $login = new UsuarioControlador();
                    $login -> LoginUsuario();
                    ?>
                </form>
                <p class="mb-1">
                    <a href="index.php?ruta=creacion/registro/registro">Crear cuenta</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
