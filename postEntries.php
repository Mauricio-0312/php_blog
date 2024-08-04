<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Blog de Videojuegos</title>
</head>
<body>
<div id="container">
    <?php  session_start(); 
            $conection = mysqli_connect("localhost", "root",  "", "blog");
            if(isset($_GET['titulo']) && isset($_GET['descripcion'])){
                $titulo = $_GET['titulo'];
                $descripcion = $_GET['descripcion'];
                $_SESSION["entradaId"] = $_GET["entradaId"];
            }else{
                $titulo = "";
                $descripcion = "";
            }
    ?>
    <?php  include "menu.php";  ?>
    <?php  if(!isset($_GET['titulo']) && !isset($_GET['descripcion'])): ?> 
        <div id="postEntriesContainer">
            <form action="postEntriesServer.php" method="POST">
                <label for="title">Titulo:</label>
                    <input type="text" name="title" id="title" >
                <label for="selectCategory">Categoria:</label>
                <select name="selectCategory">
                    <?php
                    $consult = mysqli_query($conection, "select nombre from categorias");
                    while($category = mysqli_fetch_assoc($consult)){
                        echo "<option value='$category[nombre]'>".$category["nombre"]."</option>";
                    }
                    ?>
                </select>
                <label for="description">Descripcion:</label>
                    <input type="text" name="description" id="description" >
                    <input type="submit" name="button" id="Publicar" value="Publicar">

            </form>
        </div>
    <?php endif;?>
    <?php  if(isset($_GET['titulo']) && isset($_GET['descripcion'])): ?> 
        <div id="postEntriesContainer">
            <form action="postEntries.php" method="POST">
                <label for="newTitle">Titulo:</label>
                    <input type="text" name="newTitle" id="title" value="<?= $titulo?>">
                <label for="newSelectCategory">Categoria:</label>
                <select name="newSelectCategory">
                    <?php
                    $consult = mysqli_query($conection, "select nombre from categorias");
                    while($category = mysqli_fetch_assoc($consult)){
                        echo "<option value='$category[nombre]'>".$category["nombre"]."</option>";
                    }
                    ?>
                </select>
                <label for="newDescription">Descripcion:</label>
                    <input type="text" name="newDescription" id="description" value="<?= $descripcion?>">
                    <input type="submit" name="button" id="Editar" value="Editar">

            </form>
        </div>
    <?php endif;?>
        <?php include "userInformation.php" ?>
    
    <?php
    if(isset($_POST["newDescription"]) && isset($_POST["newSelectCategory"]) && isset($_POST["newTitle"]) ){
        
        $newTitle = $_POST["newTitle"];
        $newCategory = $_POST["newSelectCategory"];
        $newDescription =  $_POST["newDescription"];
        $categoryConsult = mysqli_query($conection, "select * from categorias where nombre = '$newCategory'");

        $categoryConsultResult = mysqli_fetch_assoc($categoryConsult);
        $categoryIdResult = $categoryConsultResult["id"];
    $updateEntry = mysqli_query($conection, "Update entradas set titulo='$newTitle',
                                            descripcion='$newDescription', categoria_id = $categoryIdResult
                                            where id = '$_SESSION[entradaId]'");
       header("location: myEntries.php");
    }
    ?>
</div>
</body>
</html>

