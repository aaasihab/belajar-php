<?php

// Class about merupakan nama controller jika $url[0] sudah sesuai
class About extends Controller {

    // method default yang akan dipanggil saat url kosong
    public function index($data): void{
        // mengecek apakah url[=>2] atau params ada
        if ( $data != null ){
            // judul default pada browser
            $data['nama'] = $data[0];
            $data['pekerjaan'] = $data[1];
        } else {
            $data['nama'] = 'Sihab';
            $data['pekerjaan'] = 'Mahasiswa';
        }
        $data['judul'] = 'About';
        // memanggil view untuk menampilkan file html
        $this->view('templates/header', data: $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page($data): void{
        // mengecek apakah url[=>2] atau params ada
        if ( $data != null ){
            $data['nama'] = $data[0];
            $data['pekerjaan'] = $data[1];
        }
        $data['judul'] = 'About';
        // memanggil view untuk menampilkan file html
        $this->view('templates/header', data: $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}