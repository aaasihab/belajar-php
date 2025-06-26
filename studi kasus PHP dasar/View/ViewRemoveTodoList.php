<?php

// view yang akan ditampilkan di menu Hapus data

require_once "Helper/Input.php";
require_once "BusinessLogic/RemoveTodoList.php";

function viewRemoveTodoList()
{
    global $todoList;
    if ($todoList == null){
        echo "Todo belum diisi" . PHP_EOL;
    } else {
        echo "MENGHAPUS TODO" . PHP_EOL;
        
        $number = input("Nomor (Tekan x untuk batal)");
        if ($number == "x"){
            echo "Batal menghapus Todo" . PHP_EOL;
        } else {
            $result = removeTodoList($number);
            if ($result){
                echo "Berhasil menghapus Todo" . PHP_EOL;
            } else {
                echo "Nomor tidak valid" . PHP_EOL;
            }
        }
    }
}