<?php

// menampilkan data di list

function showTodoList()
{
    global $todoList;

    if ($todoList == null){
        echo "Belum ada todo yang ditambahkan" . PHP_EOL;
    } else {
        foreach($todoList as $number => $todo){
            echo "$number. $todo" . PHP_EOL;
        }
    }   
}