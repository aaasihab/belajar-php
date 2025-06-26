<?php

// menambah data di list

function addTodoList(string $todo)
{
    global $todoList;

    if ($todoList == null){
        $todoList[1] = $todo;
    } else {
        $todoList[] = $todo;
    }
}