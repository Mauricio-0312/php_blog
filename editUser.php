<?php 
     session_start();
     $conection = mysqli_connect("localhost", "root",  "", "blog");

        if(isset($_POST["newName"]) && isset($_POST["newPassword"]) && isset($_POST["newEmail"])){
            $newName = trim($_POST["newName"]);
            $newPassword = $_POST["newPassword"];
            $newEmail = $_POST["newEmail"];

            $consult = "Update usuarios set nombre = '$newName', password = '$newPassword', email = '$newEmail'  Where id = '$_SESSION[userId]'";
            $sql = mysqli_query($conection, $consult);
            if($sql){
                
                echo " actualizado   ". $_SESSION["userId"] ; 
                header("Refresh: 2, URL = index.php");
                session_destroy();
            }else{
                echo "   NOOOOO actualizado    ". $_SESSION["userId"] ; 
            }
        }
?>