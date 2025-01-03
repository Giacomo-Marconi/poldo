<?php
include_once './db.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poldo</title>
    <link rel="stylesheet" href="style.css">    
<body>
    
    <h1>Benvenuto in Poldo</h1>
    <?php
    session_start();
    if(isset($_SESSION["username"]) && $_SESSION["username"]!=""){
        echo "<h2>Benvenuto ".$_SESSION["username"]."</h2>";
        echo "<h4><a href='listaProd.php'>Lista Prodotti</a></h4>\n";
        echo "<h4><a href='addProd.php'>Aggiungi Prodotto</a></h4>\n";
        echo "<h4><a href='modProd.php'>Modifica Prodotto</a></h4>\n";
        echo "<h4><a href='userList.php'>User List</a></h4>\n";
        echo "<h4><a href='logout.php'>Logout</a></h4>";
    }else{
        echo "<h4><a href='listaProd.php'>Lista Prodotti</a></h4>\n";
        echo "<h4><a href='login.php'>Login</a></h4>";
    }
    ?>
    
  
</body>
</html>