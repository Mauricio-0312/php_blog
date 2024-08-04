<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Registro</title>
</head>
<body>
    <div id="container">
       
        <h2>Registro</h2>
        <div id="form">
        <form action="../login.php" method="POST">
            <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" required="required">

            <label for="lastName">Apellidos:</label>
                <input type="text" name="lastName" id="lastName" required="required">

            <label for="email">Email:</label>
                <input type="email" name="email" id="email" required="required">

            <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required="required">

                <input type="submit" value="Entrar">
                <?php 
                
               
               
                
                ?>
        </form>
        </div>
    </div>
</body>
</html>