<?php

require_once "BusinessLogic/ShowTodoList.php";
require_once "BusinessLogic/AddTodoList.php";
require_once "BusinessLogic/RemoveTodoList.php";

addTodoList("Belajar HTML");
addTodoList("Belajar CSS");
addTodoList("Belajar PHP");
addTodoList("Belajar Javascript");

removeTodoList("2");

showTodoList();
