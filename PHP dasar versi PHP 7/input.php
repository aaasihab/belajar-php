<?php

// cara membuat inputan pada php

// membuat function input
function input(string $info): string
{

    // menampilkan argument info
    echo "$info";

    // membuat variabel yang berisi function untuk inputan (fgets(STDIN))
    $result = fgets(STDIN);
    return trim($result);
}

$data = input(info: "nama: ");
echo $data;