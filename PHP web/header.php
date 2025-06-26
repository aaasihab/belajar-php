<?php

header("Application: Belajar PHP Web");
header("Author: Ahmad Sihabillah");

$client = $_SERVER["HTTP_CLIENT_NAME"];

?>

<html>
    <body>
        <h1>hello<?= $client ?></h1>
    </body>
</html>