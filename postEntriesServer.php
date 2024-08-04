<?php
    session_start(); 
    $conection = mysqli_connect("localhost", "root",  "", "blog");

    if(isset($_POST["title"]) && isset($_POST["selectCategory"]) && isset($_POST["description"])){

    

        $title = $_POST["title"];
        $category = $_POST["selectCategory"];
        $description =  $_POST["description"];
        $checkEntry = mysqli_query($conection, "select * from entradas where titulo = '$title'");

    if(mysqli_num_rows($checkEntry) <= 0){ 
        $categoryConsult = mysqli_query($conection, "select * from categorias where nombre = '$category'");

        $categoryConsultResult = mysqli_fetch_assoc($categoryConsult);
        $categoryNameResult = $categoryConsultResult["id"];
        $insertNewEntry = mysqli_query($conection, "Insert into entradas values(null,$_SESSION[userId], $categoryNameResult, '$title', '$description', CURDATE())");
        header("location: index.php");
    }else{
            echo "ya existe una entrada con ese titulo, ingrese otra.";
            header("Refresh: 2, URL = postEntries.php");
        }
    }

?>