<?php

class Prodi
{
    private int $nomor;
    private string $kodeProdi;
    private Fakultas $fakultas;
    private string $prodi;

    public function getNomor()
    {
        return $this->nomor;
    }

    public function setNomor(int|null $nomor)
    {
        $this->nomor = $nomor;
    }

    public function getKodeProdi()
    {
        return $this->kodeProdi;
    }

    public function setKodeProdi(string|null $kodeProdi)
    {
        $this->kodeProdi = $kodeProdi;
    }

    public function getFakultas()
    {
        return $this->fakultas;
    }

    public function setFakultas(Fakultas $fakultas)
    {
        $this->fakultas = $fakultas;
    }
    
    public function getProdi()
    {
        return $this->prodi;
    }

    public function setProdi(string|null $prodi)
    {
        $this->prodi = $prodi;
    }
}

?>