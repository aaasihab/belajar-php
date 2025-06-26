<?php

// query parameter array -> 1 key bisa menyimpan banyak data 
// 
// contoh : http://localhost:8080/query-parameter-array.php?numbers[]=5&numbers[]=10

$numbers = $_GET["numbers"];
$total = 0;

foreach($numbers as $number){
    $total += $number;
}

?>

<html>
    <body>
        <p><?= "Total = {$total}" ?></p>
    </body>
</html>
