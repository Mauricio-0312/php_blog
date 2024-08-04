<?php

echo "  <h1>Blog de Videojuegos</h1>";
echo " <form action='index.php' method='POST' id='search'>
<input type='text' placeholder='Buscar entrada' name='entrySearch'>
<input type='submit' name='search' value='buscar'>
</form>";

if(isset($_SESSION["userName"])){
    echo " 
    <ul id='menu'>
    <li><a href='index.php'> Inicio</a></li>
    <li><a href='./categories.php'>Categorias</a></li>
    <li><a href='postEntries.php'>Publicar entradas</a></li>
    <li><a href='myEntries.php'>Mis entradas</a></li>
    <li><a href='#'>Sobre nosotros</a></li>
    <li><a href='#'>Contacto</a></li>
    </ul>";

}
else{
    echo "    
    <ul id='menu'>
    <li><a href='index.php'> Inicio</a></li>
    <li><a href='./categories.php'>Categorias</a></li>
    <li><a href='#'>Sobre nosotros</a></li>
    <li><a href='#'>Contacto</a></li>
    </ul>";
}

?>