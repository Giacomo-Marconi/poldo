<?php
include_once './db.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mod Prod</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<?php
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["username"]==""){
    echo "<h1>Non loggato </h1>\n<a href='login.php'>Login </a>";
    session_destroy();
    exit();
}else{
    echo "<h2>Benvenuto ".$_SESSION["username"]."</h2>";
}
?>

<h1>Modifica prodotto</h1>

<form action="./modProd.php" method="POST">
<select  name="id">
    <option value="-1">Seleziona prodotto</option>
<?php
    $q = "SELECT * FROM prodotti";
    $stm = $con->prepare($q);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $r){
        echo "<option value='".$r['id']."'>".$r['nome']."</option>";
    }
?>
</select>
<button>Seleziona</button>
</form>

<?php

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['id'])){
    $id = $_POST['id'];
    $q = "SELECT * FROM prodotti WHERE id=?";
    $stm = $con->prepare($q);
    $stm->bindParam(1,$id);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    $r = $data[0];
    echo "<form action='doModProd.php' method='POST'>\n";
    echo "<input type='text' name='nome' value='".$r['nome']."'>\n";
    echo "<input type='text' name='desc' value='".$r['descr']."'>\n";
    echo "<input type='number' step='any' name='prezzo' value='".$r['prezzo']."'>\n";
    echo "<input type='hidden' name='id' value='".$r['id']."'>\n";
    echo "<input type='submit' value='Modifica'>\n";
    echo "</form>\n";
}
?>


<a href="./index.php">Home</a>
</body>
</html>