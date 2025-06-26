<?php

class Mahasiswa
{
    private int $nomor;
    private int $nim;
    private string $nama;
    private string $jenisKelamin;
    private int $semester;
    private Fakultas $fakultas;
    private Prodi $prodi;
    
    public function getNomor()
    {
        return $this->nomor;
    }
    
    public function setNomor(int|null $nomor)
    {
        $this->nomor = $nomor;
    } 
    
    public function getNim()
    {
        return $this->nim;
    }
    
    public function setNim(int|null $nim)
    {
        $this->nim = $nim;
    } 
    
    public function getNama()
    {
        return $this->nama;
    }

    public function setNama(string|null $nama)
    {
        $this->nama = $nama;
    }
    
    public function getJenisKelamin()
    {
        return $this->jenisKelamin;
    }
    
    public function setJenisKelamin(string|null $jenisKelamin)
    {
        $this->jenisKelamin = $jenisKelamin;
    } 
    
    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester(int|null $semester)
    {
        $this->semester = $semester;
    }

    public function getProdi()
    {
        return $this->prodi;
    }

    public function setProdi(Prodi|null $prodi)
    {
        $this->prodi = $prodi;
    }
    
    public function getFakultas()
    {
        return $this->fakultas;
    }

    public function setFakultas(Fakultas|null $fakultas)
    {
        $this->fakultas = $fakultas;
    }
}

?>