<?php


// membuat namespace agar lebih rapi
    // membuat model yang biasanya merupakan implementasi dari nama tabel dan bersifat encapsulation
class TodoList
{
    private int $id;
    public function __construct(private string $todo = "")
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getTodo()
    {
        return $this->todo;
    }

    public function setTodo(string $todo)
    {
        $this->todo = $todo;
    }
}