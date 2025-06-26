<?php

// untuk mengambil dara inputan di terminal

function input(string $info)
{
    echo "$info: ";
    $result = fgets(STDIN);
    return trim($result);
}