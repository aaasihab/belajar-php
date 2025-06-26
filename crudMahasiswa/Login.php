<?php

include_once 'Src/Object.php';
$view->login();

?>

<html>
    <head>
        <link rel="stylesheet" href="Css/Style-login.css">
    </head>

    <body>
        <div class="wrapper">
            <?php if ($_SESSION["login"] == false){ ?>
                <header>Login</header>
                <form action="Login.php" method="post">
                    <div class="field nama">
                        <div class="input-area">
                            <input type="text" id="nama" name="nama" placeholder=" Masukkan Username">
                        </div>
                    </div>
                    <div class="field password">
                        <div class="input-area">
                            <input type="password" name="password" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <input type="submit" value="Login" name="login">
                </form>
            <?php } ?>
        </div>
    </body>
</html>