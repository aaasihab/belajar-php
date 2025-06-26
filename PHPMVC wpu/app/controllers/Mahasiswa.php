<?php

class Mahasiswa extends Controller {
    
    public function index(){
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
    public function detail($data){
        if ( $data != null ){
            // mengubah string ke integer
            $data['id'] = (int)($data[0]);
        }
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($data['id']);
        $data['judul'] = 'Daftar Mahasiswa';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }
    public function tambah(){
        if ( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location:' . BASEURL . '/mahasiswa');
            exit();
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location:' . BASEURL . '/mahasiswa');
            exit();
        }
    }
    public function hapus($data){
        if ( $data != null ){
            // mengubah string ke integer
            $data['id'] = (int)($data[0]);
        }
        if ( $this->model('Mahasiswa_model')->hapusDataMahasiswa($data['id']) > 0 ){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location:' . BASEURL . '/mahasiswa');
            exit();
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location:' . BASEURL . '/mahasiswa');
            exit();
        }
    }

    // method untuk mengembalikan data bertipe json ke ajax
    public function getDataUbah(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah($data){
        if ( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location:' . BASEURL . '/mahasiswa');
            exit();
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location:' . BASEURL . '/mahasiswa');
            exit();
        }
    }
    public function cari(){
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa($_POST['keyword']);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function getCariMahasiswa(){
        echo"ok";
        // echo json_encode($this->model('Mahasiswa_model')->cariDataMahasiswa($_POST['keyword']));
    }
}