<?php

        include '../../service/conexion.php';

        $con = new Connection();

        $mysql = $con->getConnection();

        if ($mysql->connect_error){
            echo("Problemas con la conexión a la base de datos");
            die("Problemas con la conexión a la base de datos");
        }
            
        else{
            $getDocente = $_REQUEST['docente'];
 
            $getNivel = $_REQUEST['nivel'];

            $getAsignatura = $_REQUEST['asignatura'];

            $getAula = $_REQUEST['aula'];


        $mysql->query(" INSERT INTO asignatura_periodo VALUES ('$getAsignatura','$getNivel','1','$getDocente','1','$getAula') ") or die($mysql->error);
            echo 'Correcto';
        $mysql->close();

        header('Location:./assignTeacher.php');
        }
?>