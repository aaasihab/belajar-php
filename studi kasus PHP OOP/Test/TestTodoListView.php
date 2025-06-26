<?php

use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

require_once "Entity/TodoList.php";
require_once "Helper/InputHelper.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";
require_once "View/TodoListView.php";

function testTodoListView()
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService, $todoListRepository);
    $todoListView->runMenu();
}

testTodoListView();



