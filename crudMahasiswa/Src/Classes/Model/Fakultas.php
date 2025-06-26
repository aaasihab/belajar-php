<?php

class Fakultas
{
    private int $nomor;
    private int $kode;
    private string $fakultas;

    
    public function getNomor()
    {
        return $this->nomor;
    }

    public function setNomor(int|null $nomor)
    {
        $this->nomor = $nomor;
    }

    public function getKode()
    {
        return $this->kode;
    }

    public function setKode(int|null $kode)
    {
        $this->kode = $kode;
    }
    
    public function getFakultas()
    {
        return $this->fakultas;
    }

    public function setFakultas(string|null $fakultas)
    {
        $this->fakultas = $fakultas;
    }
}

?>