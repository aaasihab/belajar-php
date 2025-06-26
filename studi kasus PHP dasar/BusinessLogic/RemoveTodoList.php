<?php

// menghapus data di list

function removeTodoList(string $number): bool
{
    global $todoList;
    
    // validasi jika nomor yang dimasukkan angka nol atau lebih besar dari jumlah list
    if ($number > sizeof($todoList) || $number <= 0){
        return false;
    } else {

        // melakukan perulangan untuk menggeser data yang ingin dihapus ke list terakhir
        // misalkan menghapus data nomer 2, maka nomer 2 akan ditukar ke nomer 3, nomer 3 akan ditukar dengan nomer 4 dan seterusnya hingga list terakhir
        for($i= $number;$i < sizeof($todoList); $i++){
            $todoList[$i] = $todoList[$i + 1];
        }

        // setelah data yang ingin dihapus ada di list terakhir hapus data dengan function bawaan untuk menghapus data array
        unset($todoList[sizeof($todoList)]);

        return true;
    }
}