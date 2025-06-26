<?php

// query parameter -> mengirim data dari client ke server dengan cara memasukkan data lewat url
// caranya hanya dengan menambahkan tanda tanya di akhir url dan key sert valuenya
// contoh : http://localhost:8080/query-parameter.php?name=Ahmad

$say = "Hello {$_GET['name']}";
?>

<html>
    <body>
        <p><?= $say ?></p>
    </body>
</html>
