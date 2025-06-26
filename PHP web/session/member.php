<?php

// harus menggunakan session start untuk mengambil data session
session_start();

if ($_SESSION["login"] != true){
    header("location: /session/login.php");
    exit();
}

$say = "Hello " . $_SESSION["username"];

?>

<html>
    <body>
        <h1><?= $say ?></h1>
        <a href="/session/logout.php">logout</a>
    </body>
</html>