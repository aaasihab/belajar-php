<?php
// folder public : folder yang kodenya bisa dilihat 
// folder lain : folder yang berisi bisnis logic dengan kodenya yang privasi 

// path info : informasi path di url yang terdapat setelah /index.php(kecuali query parameter)
// fungsi path info : bisa membuat 1 file dengan berbagai url, karena tanpa path info biasanya 1 file untuk 1 url
// contoh : https://contoh.com/index.php/test -> path infonya = /test
// contoh : https://contoh.com/index.php/product/123 -> path infonya = /product/123

$path = "/index";

if ( isset($_SERVER['PATH_INFO']) ){
    $path = $_SERVER[['PATH_INFO']];
}

?>