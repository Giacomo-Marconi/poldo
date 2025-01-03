<?php
include_once './db.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addProd</title>
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
    echo "<h1>Benvenuto ".$_SESSION["username"]."</h1>";
}
?>

<h1>Aggiungi prodotto</h1>

<form method="POST" action="">
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="desc" placeholder="Descrizione">
    <input type="number" step="any" name="prezzo" placeholder="Prezzo">
    <input type="submit" value="Aggiungi">
</form>

<h3>Lista prodotti gia aggiunti</h3>

<table border="1">
    <tr>
        <th>nome</th>
        <th>prezzo</th>
        <th>desc</th>
    </tr>
    <?php

    $q = "SELECT * FROM prodotti";
    $stm = $con->prepare($q);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($data as $r){
        echo "<tr><td>".$r['nome']."</td>\n<td>".$r['prezzo']."</td>\n<td>".$r['descr']."</td></tr>\n";
    }

    ?>
</table>

<a href="./index.php">Home</a>
<?php

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['nome']) && isset($_POST['prezzo']) && isset($_POST['desc'])){
    $nome = $_POST['nome'];
    $prezzo = $_POST['prezzo'];
    $desc = $_POST['desc'];

    $q = "INSERT INTO prodotti (nome, prezzo, descr) VALUES (?, ?, ?)";
    $stm = $con->prepare($q);
    $stm->bindParam(1, $nome);
    $stm->bindParam(2, $prezzo);
    $stm->bindParam(3, $_POST['desc']);
    $res = $stm->execute();
	echo $res;
    echo $res ? "aggiunto" : "errore";
    header("Refresh:0");
}


?>

</body>
</html>