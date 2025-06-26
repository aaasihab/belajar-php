<?php

require_once "Entity/TodoList.php";
require_once "Config/Database.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";

use Config\Database;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;

$connection = Database::getConnection();

function testShowTodoList()
{
    global $connection;

    $todolistRepository = new TodoListRepositoryImpl($connection);

    $todoListService = new TodoListServiceImpl($todolistRepository);
    $todoListService->showTodoList();
}
testShowTodoList();

function testAddTodoList()
{
    global $connection;

    $todolistRepository = new TodoListRepositoryImpl($connection);

    $todoListService = new TodoListServiceImpl($todolistRepository);
    $todoListService->addTodoList("Belajar PHP OOP");
    $todoListService->addTodoList("Belajar PHP Web");
    
    $todoListService->showTodoList();
}
// testAddTodoList();

function testUpdateTodoList()
{
    global $connection;

    $todolistRepository = new TodoListRepositoryImpl($connection);
    $todoListService = new TodoListServiceImpl($todolistRepository);

    $todoListService->updateTodoList(5, "Belajar PHP MVC");
    $todoListService->showTodoList();

    $todoListService->updateTodoList(4, "Belajar Flutter");
    $todoListService->showTodoList();
}
// testUpdateTodoList();

function testRemoveTodoList()
{
    global $connection;

    $todolistRepository = new TodoListRepositoryImpl($connection);
    $todoListService = new TodoListServiceImpl($todolistRepository);
    
    $todoListService->removeTodoList(3);
    $todoListService->showTodoList();

    // $todoListService->removeTodoList(1);
    // $todoListService->showTodoList();
}

// testRemoveTodoList();

$connection = null;