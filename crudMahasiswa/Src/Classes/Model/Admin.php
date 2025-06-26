<?php

class Admin
{
    private int $id;
    private string $nama;
    private string $password;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId(int|null $id)
    {
        $this->id = $id;
    }
    
    public function getNama()
    {
        return $this->nama;
    }

    public function setNama(string|null $nama)
    {
        $this->nama = $nama;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword(string|null $password)
    {
        $this->password = $password;
    }

}

?>