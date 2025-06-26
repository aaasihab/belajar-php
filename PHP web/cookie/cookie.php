<?php

// cookie -> data dalam bentuk key-value yang dikirim oleh server pada HTTP response untuk disimpan di client(web browser)
// data di cookie bisa diedit di web browser

setcookie("X-Belajar-Cookie", "Ahmad Sihabillah");
header("location: /cookie/show-cookie.php");

?>

