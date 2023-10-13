<?php

    /* Instancia a la conexion HOST-DB */
    include 'conexion_be.php';

    /* Variables de inicio de sesion */
    $user= $_POST['correo'];
    $pwd= $_POST['contrasena'];

    /* Encriptacion */
    $pwd = hash('sha512',$pwd);

    /* Consultas [Nota: respeta el orden de las consultas]*/
    $query = "INSERT INTO usuarios(user, pwd) VALUES('$user','$pwd')";
                

    /* Verificar que el correo no se repita no exista en la BD*/
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE user='$user' ");
    
    if (mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este usuario ya existe pruebe otro");
                window.location = "../../index.php";
            </script>
        ';
        exit();
    }

    /* Depuracion */
    $ejecutar = mysqli_query($conexion,$query);

    /* Condicion para redireccionar */
    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");                                
                window.location = "../../index.php";
            </script>
            ';
    }
    else {
        echo '
            <script>
                alert("Intentalo de nuevo, usuario no almacenado");                                
                window.location = "../../index.php";
            </script>
            ';        
    }

    /* Cierre de conexion con la base de datos */
    mysqli_close($conexion);

?>