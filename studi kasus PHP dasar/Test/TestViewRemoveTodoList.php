<?php

require_once "View/ViewRemoveTodoList.php";
require_once "BusinessLogic/ShowTodoList.php";
require_once "BusinessLogic/AddTodoList.php";

addTodoList("Algoritma Pemrograman");
addTodoList("Aljabar Linier");
addTodoList("PBO");

showTodoList();
viewRemoveTodoList();
showTodoList();