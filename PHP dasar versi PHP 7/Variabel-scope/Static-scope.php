<?php

// function biasa
function increment(){
    $counter = 1;
    echo("counter = $counter\n");
    $counter++;
}
increment();
increment();
increment();
// static scope --> akan menyimpan hasil dari sebelumnya;
function increment_static(){
    static $counter = 1;
    echo("counter = $counter\n");
    $counter++;
}
echo("\n");
increment_static();
increment_static();
increment_static();