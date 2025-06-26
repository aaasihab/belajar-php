<?php

// Sama persis seperti anonymous function dengan argumen hanya beda kode
function say_good_bye(string $name, callable $filter) {
    $final_name = call_user_func($filter, $name);
    echo("Good Bye $final_name\n");
};
say_good_bye("eko", function(string $name) {
    return strtoupper($name);
});
// argumen menggunakan string function
say_good_bye("eko", "strtoupper");