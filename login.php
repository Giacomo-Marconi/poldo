<?php
include_once './db.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>



<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"]!="")
    echo "<h2>Benvenuto ".$_SESSION["username"]."</h2>";
?>

<h1>Login</h1>

<form method="POST" action="dologin.php">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
</form>

</body>
</html>

