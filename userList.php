<?php
include_once './db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserList</title>
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

<h1>Lista Utenti</h1>

<table border="1">
    <?php

    $q = "SELECT username, mail FROM utenti";
    $stm = $con->prepare($q);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $r){
        echo "<tr>";
        echo "<td>".$r['username']."</td>";
        echo "<td>".$r['mail']."</td>";
        echo "</tr>";
    }
    
    ?>
    </table>

    <a href="./index.php">Home</a>

</body>
</html>