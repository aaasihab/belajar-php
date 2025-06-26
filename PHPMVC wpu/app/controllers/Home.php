<?php

// Class about merupakan nama controller jika $url[0] sudah sesuai
class Home extends Controller{

    // method default yang akan dipanggil saat url kosong
    public function index($data){
        // judul default pada browser
        $data['judul'] = 'Home';
        // mengambil data dari model
        $data['nama'] = $this->model('user_model')->getUser();
        // memanggil view untuk menampilkan file html
        // method view merupakan method dari class Controller yang ada di Core
        // mengapa bisa digunakan? karena class home merupakan turunan dari class controller
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}