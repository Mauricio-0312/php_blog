<?php 
    session_start();
    $conection = mysqli_connect("localhost", "root",  "", "blog");
    $titulo = $_GET["titulo"];

    $DeleteEntry = mysqli_query($conection, "Delete from entradas where usuario_id = $_SESSION[userId] and titulo = '$titulo'");
    header("location: myEntries.php");

?>