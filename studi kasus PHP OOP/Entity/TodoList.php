<?php


// membuat namespace agar lebih rapi
namespace Entity
{
    // membuat model yang biasanya merupakan implementasi dari nama tabel  dan bersifat encapsulation
    class TodoList
    {
        public function __construct(private string $todo = "")
        {
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
}