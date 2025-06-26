<?php

// class Controller digunakan untuk mengatur file mana yang akan dijalankan pada view
class Controller {
    public function view($view, $data = []): void{
        require_once "../app/views/" . $view . '.php';
    }
    public function model($model): object{
        require_once "../app/models/" . $model . '.php';
        return new $model;
    }
}