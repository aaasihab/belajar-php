<?php

include_once 'Object.php';
$view->register();

?>

<html>
    <head>
        <title>Tambah Admin</title>
    </head>
    <body>
        <div>
            <form action="Register.php" method="post">
                <table>
                    <tr>
                        <label for="nama">
                            <th>NAMA</th>                          
                            <td><input type="text" name="nama"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="password">
                            <th>PASSWORD</th>                          
                            <td><input type="password" name="password"></td>
                        </label>
                    </tr>
                </table>
                <input type="submit" name='register' value="submit">                
            </form>
            <a class="kembali" href="Index.php">kembali</a>
        </div>
    </body>
</html>
