<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Blog de videojuegos</title>
</head>
<body>
    <div id="container">
    <?php 
    session_start();
    $conection = mysqli_connect("localhost", "root",  "", "blog");

    include "menu.php";
    ?>

       
            <div id="myEntriesContainer">
            <?php 
                $checkEntry = mysqli_query($conection, "select * from entradas where usuario_id = $_SESSION[userId] order by id DESC");
                   while($entry = mysqli_fetch_assoc($checkEntry)){
                       $categoryNameConsult = mysqli_query($conection, "select * from categorias where id = $entry[categoria_id]");
                       $categoryFetch = mysqli_fetch_assoc($categoryNameConsult);
                       $categoryName = $categoryFetch["nombre"];
                       echo " 
                            <section class='entrada myEntry'>
                            <a href='deleteEntry.php?titulo=$entry[titulo]' id='deleteEntry'>Eliminar</a>
                            <a href='postEntries.php?titulo=$entry[titulo]&descripcion=$entry[descripcion]&entradaId=$entry[id]' id='updateEntry'>Editar</a>
                                <h2>$entry[titulo]</h2>
                                <p><strong>Categoria:</strong>  $categoryName</p>
                                    <p>
                                    <strong>Descripcion:</strong>  $entry[descripcion]
                                    </p>
                                    <p>Fecha: $entry[fecha]</p>
                            </section>
                       ";
                   }
            
            ?>
           </div>     
        
        <?php include "userInformation.php" ?>
    </div>
   
</body>
</html>