<?php

// membuat interface karena berisi business logic
namespace Service
{
    use \Entity\TodoList;
    use \Repository\TodoListRepository;

    interface TodoListService
    {
        function addTodoList(string $todo): void;
        function removeTodoList(int $number): void;
        function updateTodoList(int $number, string $todo): void;
        function showTodoList(): void;

    }
    
    // service bertugas untuk menerima semua data inputan yang dikirim view
    // atau sebagai pemberi perintah ke repository yang merupakan permintaan user
    // dan memberi pesan kepada user apakah permintaan tersebut berhasil atau gagal
    // tipe datanya disesuaikan/harus sama dengan data dari view
    class TodoListServiceImpl implements TodoListService
    {
        public function __construct(private TodoListRepository $todoListRepository)
        {
        }

        // membuat object dari entity terlebih dahulu
        // data dari view akan di inisialisasi object entity
        // karena data pada penyimpanan di repository harus berupa object entity
        public function addTodoList(string $todo): void
        {
            $todoList = new TodoList($todo);

            $this->todoListRepository->save($todoList);

            echo "\nSUKSES MENAMBAH TODOLIST\n" . PHP_EOL;
        }

        public function removeTodoList(int $number): void
        {
            if ($this->todoListRepository->remove($number)){
                echo "\nSUKSES MENGHAPUS TODOLIST\n" . PHP_EOL;
            } else {
                echo "\nGAGAL MENGHAPUS TODOLIST\n" . PHP_EOL;
            }   
        }

        public function updateTodoList(int $number, string $todo): void
        {
            $todoList = new TodoList($todo);
            
            if ($this->todoListRepository->update($number, $todoList)){
                echo "\nSUKSES MENGUBAH TODOLIST\n" . PHP_EOL;
            } else {
                echo "\nGAGAL MENGUBAH TODOLIST\n" . PHP_EOL;
            }
        }

        public function showTodoList(): void
        {
            // $todoList = $this->todoListRepository->findAll();
            // if ($todoList == null){
            //     return false;
            // } else {                
            //     foreach($todoList as $number => $value){
            //         echo "$number. {$value->getTodo()}" . PHP_EOL;
            //     }
            //     echo "\n";
            //     return true;
            // }
            $todoList = $this->todoListRepository->findAll();
            foreach($todoList as $number => $value){
                echo "$number. {$value->getTodo()}" . PHP_EOL;
            }
            echo "\n";
        }
        
        
    }
}