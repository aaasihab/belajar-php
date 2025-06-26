<?php

require_once "Entity/TodoList.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";

use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;

function testShowTodoList()
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todolistRepository->todoList[1] = new Todolist("Belajar PHP");
    $todolistRepository->todoList[2] = new Todolist("Belajar PHP OOP");
    $todolistRepository->todoList[3] = new Todolist("Belajar PHP Database");

    $todoListService = new TodoListServiceImpl($todolistRepository);
    $todoListService->showTodoList();
}
// testShowTodoList();

function testAddTodoList()
{
    $todolistRepository = new TodoListRepositoryImpl();

    $todoListService = new TodoListServiceImpl($todolistRepository);
    $todoListService->addTodoList("Belajar Python Dasar");
    $todoListService->addTodoList("Belajar Python OOP");
    $todoListService->addTodoList("Belajar Python Django");
    
    $todoListService->showTodoList();
}
// testAddTodoList();

function testUpdateTodoList()
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todolistRepository);

    $todoListService->addTodoList("Belajar Java");
    $todoListService->addTodoList("Belajar Golang");
    $todoListService->addTodoList("Belajar Laravel");
    $todoListService->addTodoList("Belajar Ruby");

    $todoListService->updateTodoList(1, "Belajar Rust");
    $todoListService->showTodoList();

    $todoListService->updateTodoList(3, "Belajar Flutter");
    $todoListService->showTodoList();
}
// testUpdateTodoList();

function testRemoveTodoList()
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todolistRepository);

    $todoListService->addTodoList("Belajar HTML");
    $todoListService->addTodoList("Belajar CSS");
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar Javasacript");
    
    $todoListService->removeTodoList(3);
    $todoListService->showTodoList();

    $todoListService->removeTodoList(1);
    $todoListService->showTodoList();
}

testRemoveTodoList();