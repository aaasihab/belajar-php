l<?php

// semua folde/file akan di include dalam file app agar program lebih rapi
// app berisi object object dari semua class dan bertugas untuk menjalankan program

require_once "Entity/TodoList.php";
require_once "Helper/InputHelper.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";
require_once "View/TodoListView.php";


use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

echo "Aplikasi TodoList\n" . PHP_EOL;

$todoListRepository = new TodoListRepositoryImpl();
$todoListService = new TodoListServiceImpl($todoListRepository);
$todoListView = new TodoListView($todoListService, $todoListRepository);

$todoListView->runMenu();


// flow/alur aplikasi 
// entity -> interface(repository, service, view) -> implements interface(service) ->
// test(service) -> helper ->  implements interface(view) -> app -> test keseluruhan