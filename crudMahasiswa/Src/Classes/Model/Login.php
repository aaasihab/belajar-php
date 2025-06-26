<?php

class Login
{
    private int $id;
    private int $idAdmin;
    private string $tanggal;
    private string $waktu;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int|null $id)
    {
        $this->id = $id;
    }
    
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    public function setIdAdmin(int $idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }
    
    public function getTanggal()
    {
        return $this->tanggal;
    }
    
    public function setTanggal(string|null $tanggal)
    {
        $this->tanggal = $tanggal;
    }
    
    public function getWaktu()
    {
        return $this->waktu;
    }

    public function setWaktu(string|null $waktu)
    {
        $this->waktu = $waktu;
    }

}

?>