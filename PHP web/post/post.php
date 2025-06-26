<?php

//  post -> mengirim data ke server
//  datanya tidak akan ditampilkan di url
//  data akan dikirim melalui body
//  fname akan menjadi key dan hasil inputan akan menjadi value
?>

<html>
    <body>
        <p>Selamat datang <?= $_POST["first_name"] ?></p>
    </body>
</html>

