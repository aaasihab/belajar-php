<?php

// view awal aplikasi

require_once "BusinessLogic/ShowTodoList.php";
require_once "BusinessLogic/AddTodoList.php";
require_once "Helper/Input.php";
require_once "View/ViewAddTodoList.php";
require_once "View/ViewRemoveTodoList.php";

function ViewShowTodoList()
{    
    
    while(true){
        echo "TODOLIST" . PHP_EOL;
        showTodoList();
        
        echo "\n1. Tambah Todo" . PHP_EOL;
        echo "2. Hapus Todo" . PHP_EOL;
        echo "3. Keluar" . PHP_EOL;

        $pilih = input("Pilihan anda: ");
        if ($pilih == "1"){
            viewAddTodoList();
        } else if ($pilih == "2"){
            viewRemoveTodoList();
        } else if ($pilih == "3"){
            break;
        } else {
            echo "Piihan tidak tersedia" . PHP_EOL;
        }
    
    }    
    echo "Sampai jumpa lagi" . PHP_EOL;

}

