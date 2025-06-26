<?php

// mengubah respons code jika terdapat suatu kondisi misalnya jika ingin memvalidasi data yang dikirim user

if (!isset($_GET["name"]) || $_GET["name"] == ""){
    http_response_code(400);// merupakan response code bad request/error
    echo "Name is required";
    exit();
}

$say = "Hello {$_GET['name']}";
?>

<html>
    <body>
        <p><?= $say ?></p>
    </body>
</html>