<?php

if(!isset($_SESSION["userName"])){
            echo ' <aside id="login">
            <h3>Login</h3>
                <form action="index.php" method="POST">
                    <label for="user">Usuario:</label>
                        <input type="text" name="user" id="user" required="required">
                    <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" required="required">
                        <input type="submit" value="Entrar">
                <a href="./signup/signUp.php" id="signUpLink">Registrese si no tiene cuenta</a>
                </form>
            </aside>';
        }
    else{
       echo "<aside id='userInformation'>

       <h2>Hola $_SESSION[userName]</h2>
       
       <h3>Editar perfil</h3>
       
       <form action='editUser.php' method='POST'>
       
       <label for='newName'>Usuario:</label>
       
       <input type='text' name='newName' id='newName' required='required'>
       
       <label for='newPassword'>Contraseña:</label>
       
       <input type='password' name='newPassword' id='newPassword' required='required'>
       
       <label for='newEmail'>Email:</label>
           
       <input type='email' name='newEmail' id='newEmail' required='required'>
       
       <input type='submit' value='Editar'>
   </form>

   <a href='logOut.php' id='logOut'>Cerrar sesion</a>
       </aside>";
    } 
        ?>