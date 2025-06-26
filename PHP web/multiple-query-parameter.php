<?php

// multiple query parameter -> terdapat dua atau lebih key value dalam satu url
// contoh : http://localhost:8080/multiple-query-parameter.php?first_name=Ahmad&last_name=Sihabillah

$say = "Hello {$_GET['first_name']} {$_GET['last_name']}";
?>

<html>
    <body>
        <h1><?= $say ?></h1>
    </body>
</html>
