<?php

// session -> teknik dimana kita bisa menyimpan informasi client di server, sehingga ketika ada request yang sama dari client kita bisa tahu dari server

// harus dimulai dengan session start
session_start();

// membuat session login
if (!isset($_SESSION["login"])){
    $_SESSION["login"] = true;
}

// jika sudah login akan redirect ke halaman member(akan tetap di halaman member meskipun di refresh)
if ($_SESSION["login"] == true){
    header("location: /session/member.php");
    exit();
}

// jika belum login
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST["username"] == "ahmad" && $_POST["password"] == "ahmad"){
        $_SESSION["login"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("location: /session/member.php");
        exit();
    } else {
        // jika gagal
        $error = "Login gagal";
    }
}

?>

<html>
    <body>
        <?php if ($_SESSION["login"] == false) { ?>
            <?php $login = true ?>
            <div class="login-container">
                <form action="/session/login.php" method="post">
                    <label>username :
                        <input type="text" name="username" placeholder="username">
                    </label>
                    <br>
                    <label>password
                        <input type="password" name="password" placeholder="password">
                    </label>
                    <br>
                    <input type="submit" value="login">
                </form>
            </div>
        <?php } ?>

        <?php if ($error != "") {?>
            <h2><?= $error ?></h2>
        <?php } ?>
    </body>
</html>