<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Blog de Videojuegos</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body> 
    <?php 
        session_start();
        $activatedSession = false;
        $conection = mysqli_connect("localhost", "root",  "", "blog");

        if(isset($_POST["user"]) && isset($_POST["password"])){
            echo "hola";
            $name = trim($_POST["user"]);
            $password = $_POST["password"];
            $consult = "Select * from usuarios where nombre = '$name' and password = '$password'";
            $sql = mysqli_query($conection, $consult);
            
            if(mysqli_num_rows($sql) > 0){
            
                echo " encontrado"; 
                $usuario = mysqli_fetch_assoc($sql);
                $userName =  $usuario["nombre"];
                $userPassword = $usuario["password"];
                $userId = $usuario["id"];
                $userEmail = $usuario["email"];

                
                $_SESSION["userName"] = $userName;
                $_SESSION["userPassword"] = $userPassword;
                $_SESSION["userEmail"] = $userEmail;
                $_SESSION["userId"] = $userId;
                $_SESSION["search"] = false;
                
                echo $_SESSION["userName"] ." ". $_SESSION["userId"] ;
                $activatedSession = true;
            }
            else{
                echo " no encontrado";
            }
        }
        else{
            echo "adios   ";
        }
    ?>
        <div id="container">
            <?php include "menu.php" ?>
            
            
                <div id="myEntriesContainer">
                <h2 id="lastEntriesTitle">Ultimas Entradas</h2>
        <?php if(!isset($_POST["entrySearch"])) : ?>
                    <?php 
                    //CONSULTA DE ENTRADAS
                        $checkEntry = mysqli_query($conection, "select * from entradas order by id DESC");
                        while($entry = mysqli_fetch_assoc($checkEntry)){
                            //CONSULTA DE USUARIO ID
                            $userConsult = mysqli_query($conection, "select * from usuarios where id = '$entry[usuario_id]'");
                                $user = mysqli_fetch_assoc($userConsult);

                                //CONSULTA DEL NOMBRE DE LA CATEGORIA
                                $categoryNameConsult = mysqli_query($conection, "select * from categorias where id = $entry[categoria_id]");
                                $categoryFetch = mysqli_fetch_assoc($categoryNameConsult);
                                $categoryName = $categoryFetch["nombre"];
                            echo " 
                            <section class='entrada myEntry'>";
                            if(isset($_SESSION["userId"])){ 
                            
                                if($entry["usuario_id"] == $_SESSION["userId"] ){
                                    echo " <a href='deleteEntry.php?titulo=$entry[titulo]' id='deleteEntry'>Eliminar</a>
                                    <a href='postEntries.php?titulo=$entry[titulo]&descripcion=$entry[descripcion]&entradaId=$entry[id]' id='updateEntry'>Editar</a>";
                                }
                            }
                            echo        "<h2>$entry[titulo]</h2>
                                        <p><strong>Usuario:</strong> $user[nombre]</p>
                                        <p><strong>Categoria:</strong>  $categoryName</p>
                                            <p>
                                            <strong>Descripcion:</strong>  $entry[descripcion]
                                            </p>
                                            <p>Fecha: $entry[fecha]</p>

                                </section>
                            ";
                        }
                    
                    ?>
            <?php endif; ?> 
            <?php if(isset($_POST["entrySearch"])) { 
                $search = $_POST["entrySearch"];
                $checkEntry = mysqli_query($conection, "select * from entradas where titulo like '%$search%'
                                                        or descripcion like '%$search%' order by id DESC");
                
                while($entry = mysqli_fetch_assoc($checkEntry)){
                            //CONSULTA DE USUARIO ID
                            $userConsult = mysqli_query($conection, "select * from usuarios where id = '$entry[usuario_id]'");
                                $user = mysqli_fetch_assoc($userConsult);

                                //CONSULTA DEL NOMBRE DE LA CATEGORIA
                                $categoryNameConsult = mysqli_query($conection, "select * from categorias where id = $entry[categoria_id]");
                                $categoryFetch = mysqli_fetch_assoc($categoryNameConsult);
                                $categoryName = $categoryFetch["nombre"];
                            echo " 
                            <section class='entrada myEntry'>";
                            if(isset($_SESSION["userId"])){ 
                            
                                if($entry["usuario_id"] == $_SESSION["userId"] ){
                                    echo " <a href='deleteEntry.php?titulo=$entry[titulo]' id='deleteEntry'>Eliminar</a>
                                    <a href='postEntries.php?titulo=$entry[titulo]&descripcion=$entry[descripcion]&entradaId=$entry[id]' id='updateEntry'>Editar</a>";
                                }
                            }
                            echo        "<h2>$entry[titulo]</h2>
                                        <p><strong>Usuario:</strong> $user[nombre]</p>
                                        <p><strong>Categoria:</strong>  $categoryName</p>
                                            <p>
                                            <strong>Descripcion:</strong>  $entry[descripcion]
                                            </p>
                                            <p>Fecha: $entry[fecha]</p>

                                </section>
                            ";
                        }
                    }
                ?> 

        
                    </div>
            <?php include "userInformation.php"?>
        
        </div>
    

    </body>
</html>