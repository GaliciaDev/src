<?php
    /* Variables */
    $conexion = mysqli_connect("localhost", "root", "", "escuela");

 if ($conexion) {
        echo 'Conexion exitosa al Host-DB';
    }
    else{
        echo 'Fallo en la conexion a DB';
    } 
    
?> 