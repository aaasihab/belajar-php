<?php

// view yang akan ditampilkan di menu Tambah data

require_once "Helper/Input.php";
require_once "BusinessLogic/AddTodoList.php";

function viewAddTodoList()
{
    echo "MENAMBAH TODO" . PHP_EOL;

    $todo = input("Todo (tekan x untuk batal)");
    if ($todo == "x"){
        echo "Batal menambahkan Todo" . PHP_EOL;
    } else {
        addTodoList($todo);
        echo "Berhasil menambahkan Todo" . PHP_EOL;
    }
}