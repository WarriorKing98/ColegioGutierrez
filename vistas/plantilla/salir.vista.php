<?php
    /**
     * Destrur las variables de sesión
     */
    session_destroy();

    echo '<script>

        window.location = "";

    </script>';

?>