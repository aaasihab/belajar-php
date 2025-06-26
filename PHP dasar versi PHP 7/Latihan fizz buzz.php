<?php

echo "\nMenggunakan percabangan\n";
for ($i = 1; $i <= 30; $i++){
    if ($i % 5 == 0 & $i % 3 == 0){
        $result = "fizz buzz";
    } else if ($i % 5 == 0){
        $result = "buzz";
    } else if ($i % 3 == 0) {
        $result = "fizz";
    } else {
        $result = "$i";
    }
    echo "$result\n";
}

echo "\nMenggunakan ternary operator\n";
for ($i = 1; $i <= 30; $i++){
    $result = ($i % 5 == 0 & $i % 3 == 0) ? "fizz buzz" : (($i % 3 == 0) ? "fizz" : (($i % 5 == 0) ? "buzz" :"$i"));
    echo "$result\n";
}

?>