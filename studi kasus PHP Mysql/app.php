<?php

// semua folde/file akan di include dalam file app agar program lebih rapi
// app berisi object object dari semua class dan bertugas untuk menjalankan program

require_once "Entity/TodoList.php";
require_once "Helper/InputHelper.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";
require_once "View/TodoListView.php";
require_once "Config/Database.php";

// use Helper\Input;
// use Entity\TodoList;
// use Config\Database;
// use Repository\TodoListRepositoryImpl;
// use Service\TodoListServiceImpl;
// use View\TodoListView;

$connection = Database::getConnection();

echo "Aplikasi TodoList\n" . PHP_EOL;

$tdlRepository = new TodoListRepositoryImpl($connection);
$tdlService = new TodoListServiceImpl($tdlRepository);
$tdltView = new TodoListView($tdlService, $tdlRepository);

$tdltView->runMenu();

$connection = null;
// flow/alur aplikasi 
// entity -> interface(repository, service, view) -> implements interface(service) ->
// test(service) -> helper ->  implements interface(view) -> app -> test keseluruhan