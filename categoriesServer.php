<?php
$conection = mysqli_connect("localhost", "root",  "", "blog");
    if(isset($_POST["newCategory"])){
        $newCategory = $_POST["newCategory"];

        $verification = mysqli_query($conection, "Select * from categorias where nombre = '$newCategory' ");
       
        if(mysqli_num_rows($verification) > 0){
            echo "ya existe esa categoria";
         header("Refresh: 2, URL= categories.php");
            
        }
       
        else {
            $addCategory = mysqli_query($conection, "Insert into categorias values(null, '$newCategory')");
            header("location: categories.php");

        }
      
    }
    
?>
