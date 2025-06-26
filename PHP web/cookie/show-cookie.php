<?php

// mengambil cookie

if (isset($_COOKIE["X-Belajar-Cookie"])){    
    $belajarCookie = $_COOKIE["X-Belajar-Cookie"];
    echo $belajarCookie;
} else {
    echo "Cookie tidak sesuai dengan di server";
}

?>