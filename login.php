
<?php

$conection = mysqli_connect("localhost", "root",  "", "blog");



$name =  $_POST["name"];
$lastName =  $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];

mysqli_query($conection, "SET NAMES 'utf8'");


if(!empty($name) && !empty($lastName) && !empty($email) && !empty($password)){
   
    
    $insert = mysqli_query($conection, "INSERT INTO usuarios VALUES(null,'$name','$lastName', '$email', '$password', CURDATE())");
 
    if($insert){
        echo "Registrado....";
    }else{
        echo "falloooo";
    }
    header("location:  index.php");
}else{
    header("location: ./signup/signUp.php");
}
?>

