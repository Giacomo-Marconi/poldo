<?php
include_once './db.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>listProd</title>
        <link rel="stylesheet" href="style.css">

    </head>
<body>



<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"]!=""){
    echo "<h2>Benvenuto ".$_SESSION["username"]."</h2>";
}
?>

<h1>Lista prodotti</h1>
<table border='1'>
<tr>
    <th>nome <button class="ord" onclick="ord('nome')">ord</button></th>
    <th>prezzo<button class="ord" onclick="ord('prezzo')">ord</button></th>
	<th>desc<button class="ord" onclick="ord('descr')">ord</button></th>
</tr>
<?php
function createCell($cosa){
    return "<td>".$cosa."</td>";
}
$q = "SELECT * FROM prodotti";
if(isset($_GET['ord'])){
    $q .= " ORDER BY ".$_GET['ord'];
}
$stm = $con->prepare($q);
$stm->execute();
$num = $stm->rowCount();

while($row = $stm->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
    echo createCell($row['nome']);
    echo createCell($row['prezzo']);
	 echo createCell($row['descr']);
    echo "</tr>";
}

?>
</table>

<a href="./index.php">Home</a>

<script>
    function ord(what) {
        console.log(what);
        location.href = "listaProd.php?ord="+what;
    }
</script>
</body>
</html>


