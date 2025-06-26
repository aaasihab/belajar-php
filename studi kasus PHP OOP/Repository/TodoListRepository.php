<?php

namespace Repository
{
    use \Entity\TodoList;

    // membuat interface terblebih dahulu untuk class yang berkaitan mengolah data/business logic
    interface TodoListRepository
    {
        function save(TodoList $todoList): void;
        function remove(int $number): bool;
        function update(int $number, TodoList $todoList): bool;
        function findAll(): array;
    }

    // membuat class yang berisi business logic
    class TodoListRepositoryImpl implements TodoListRepository
    {
        // array $todoList merupakan tempat menyimpan data
        // datanya harus bertipe object dari entity
        public array $todoList = [];
        
        public function save(TodoList $todoList): void
        {
            $number = sizeof($this->todoList) + 1;
            
            $this->todoList[$number] = $todoList;
        }

        public function remove(int $number): bool
        {
            if ($number > sizeof($this->todoList) || $number <= 0){
                return false;
            }

            for($i = $number; $i < sizeof($this->todoList); $i++){
                $this->todoList[$i] = $this->todoList[$i + 1];
            }

            unset($this->todoList[sizeof($this->todoList)]);
            return true;
        }

        public function update(int $number, TodoList $todoList): bool
        {
            if ($number > sizeof($this->todoList) || $number <= 0){
                return false;
            }

            $this->todoList[$number] = $todoList;
            return true;
            
        }

        public function findAll(): array
        {
            return $this->todoList;
        }
    }
}