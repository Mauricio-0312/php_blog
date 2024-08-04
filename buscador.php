    <form action="buscador.php" method="POST">
        <input type="text" placeholder="Buscar entrada" name="entrySearch">
        <input type="submit" name="search" value="buscar">
    </form>

<?php
    session_start();
    $conection = mysqli_connect("localhost", "root",  "", "blog");

    if(isset($_POST["entrySearch"])){
        $Search = $_POST["entrySearch"];
        $consult = mysqli_query($conection, "Select * from entradas where titulo like '%$Search%' 
                                            or descripcion like '%$Search%'");

        while($entry = mysqli_fetch_assoc($consult)){
            
        }
    }

?>