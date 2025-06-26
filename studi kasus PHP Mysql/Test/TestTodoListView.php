<?php

use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;
use Config\Database;

require_once "Entity/TodoList.php";
require_once "Helper/InputHelper.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";
require_once "View/TodoListView.php";
require_once "Config/Database.php";

$connection = Database::getConnection();

function testTodoListView()
{
    global $connection;

    $todolistRepository = new TodoListRepositoryImpl($connection);
    $todoListService = new TodoListServiceImpl($todolistRepository);
    $todoListView = new TodoListView($todoListService, $todolistRepository);
    $todoListView->runMenu();
}


testTodoListView();

$connection = null;


