<?php

// class untuk menampilkan pesan singkat pada CRUD
class Flasher {

    // sebagai pembungkus untuk semua pesan
    public static function setFlash($pesan, $aksi, $tipe): void{
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // isi pesan
    public static function flash(): void{
        if ( isset($_SESSION['flash']) ){
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">Data Mahasiswa
                    <strong>'. $_SESSION['flash']['pesan'] .'</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['flash']);
        }
    }
}