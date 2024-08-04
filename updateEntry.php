<?php 

    session_start();
    $conection = mysqli_connect("localhost", "root",  "", "blog");
    if(isset($_POST["title"]) && isset($_POST["selectCategory"]) && isset($_POST["description"])){

    header("location: myEntries.php");
    }
?>