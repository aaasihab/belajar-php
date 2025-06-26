<?php

require_once "BusinessLogic/AddTodoList.php";
require_once "BusinessLogic/ShowTodoList.php";

// $todoList[1] = "Belajar javascript";

addTodoList("PHP dasar");
addTodoList("PHP OOP");
addTodoList("PHP Web");

showTodoList();
