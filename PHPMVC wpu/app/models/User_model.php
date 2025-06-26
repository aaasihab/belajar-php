<?php

class User_model {
    private string $username = 'Ahmad Sihabillah';

    public function getUser(){
        return $this->username;
    }
}