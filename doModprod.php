<?php
include_once './db.php';


if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['desc']) && isset($_POST['prezzo'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];
    $prezzo = $_POST['prezzo'];
    $q = "UPDATE prodotti SET nome=?, descr=?, prezzo=? WHERE id=?";
    $stm = $con->prepare($q);
    $stm->bindParam(1,$nome);
    $stm->bindParam(2,$desc);
    $stm->bindParam(3,$prezzo);
    $stm->bindParam(4,$id);
    $stm->execute();
    header('Location: modProd.php');
}
?>