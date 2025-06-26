<?php
// XSS -> cross site scripting
// XSS -> celah keamanan yang biasanya dieksploitasi oleh penyerang dengan cara mengirim script pada parameter
// contoh : localhost:8080/XSS.php?name=Eko</h1><h1>Eko lagi<script>alert("anda di hack")</script>

// cara mengatasi :
// menggunakan function htmlspecialchar(value) untuk mengubah tag html pada parameter menjadi text biasa

$say = "Hello " . htmlspecialchars($_GET['name']);
?>

<html>
    <body>
        <p><?= $say ?></p>
    </body>
</html>