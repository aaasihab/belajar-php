<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db; // ---> database handler

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }
    public function getMahasiswaById($id){
        $this->db->query("SELECT * FROM $this->table WHERE id =:id");
        $this->db->bind('id', $id);
        
        return $this->db->single();
    }
    
    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nim, :prodi)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('prodi', $data['prodi']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataMahasiswa($id){
        $this->db->query("DELETE FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function ubahDataMahasiswa($data){
        $this->db->query("UPDATE mahasiswa set nama = :nama, nim = :nim, prodi = :prodi WHERE id = :id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa($data){
        $keyword = $data;
        $query = "SELECT * FROM $this->table WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}