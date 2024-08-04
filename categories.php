<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Blog de Viedeoguegos</title>
</head>
    <body>
    <?php  session_start();  ?>
        <div id="container">
<?php  include "menu.php";  ?>
<?php

$conection = mysqli_connect("localhost", "root",  "", "blog");

$sql = mysqli_query($conection, "Select * from categorias");
echo "<div id='categoriasContainer'><ul id='categories'>";
while($category = mysqli_fetch_assoc($sql)){

    echo "<li class='category'>".$category["nombre"]."</li>";

}
echo "</ul>";


?>

<form action="categoriesServer.php" method="POST">
    <label for="newCategory">Nueva Categoria:</label>
    <input type="text" name="newCategory" id="newCategory">
    <input type="submit" value="Agregar">
</form>
</div>
<?php include "userInformation.php"?>


    
        </div>
    </body>
</html>

