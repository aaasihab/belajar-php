<?php

    // use \Entity\TodoList;

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
    public function __construct(private \PDO $connection)
    {
    }
    
    public function save(TodoList $todoList): void
    {
        $sql = "INSERT INTO todoList(todo) VALUES(?)";
        $statement = $this->connection->prepare($sql);

        // $untuk mengambil todo dari object $todoList harus memanggil function getTodo()
        $statement->execute([$todoList->getTodo()]);
    }

    public function remove(int $number): bool
    {
        $data = $this->findAll();
        $lenData = sizeof($data);
        $number -= 1;

        if ($number < $lenData and $number >= 0){
            $id = $data[$number];
            $validNumber = $id->getId();
            
            $sql = "DELETE FROM todoList WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$validNumber]);
            return true;
        } else {
            echo "Nomor tidak valid" . PHP_EOL;
            return false;

        }
    }

    public function update(int $number, TodoList $todoList): bool
    {
        $data = $this->findAll();
        $lenData = sizeof($data);
        $number -= 1;

        if ($number  < $lenData and $number >= 0){
            $id = $data[$number];
            $validNumber = $id->getId();
            
            $sql = "UPDATE todoList SET todo = ? WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todoList->getTodo(),$validNumber]);
            return true;
        } else {
            echo "Nomor tidak valid" . PHP_EOL;
            return false;
        }

    }

    public function findAll(): array
    {
        $sql = "SELECT id, todo FROM todoList";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        // membuat array sebagai penyimpanan sementara ketika data dari database diambil
        $result = [];

        // setelah dieksekusi $statement akan menyimpan data dari database sebagai 
        
        foreach ($statement as $row){
            $todoList = new TodoList();
            $todoList->setId($row["id"]);
            $todoList->setTodo($row["todo"]);

            $result[] = $todoList;
        }
        return $result;

    }
}