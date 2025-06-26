<?php

require_once __DIR__ . '/../Src/Config.php';
require_once __DIR__ . '/../Src/Classes/Model/Admin.php';
require_once __DIR__ . '/../Src/Classes/Model/Login.php';
require_once __DIR__ . '/../Src/Classes/Model/Mahasiswa.php';
require_once __DIR__ . '/../Src/Classes/Model/Fakultas.php';
require_once __DIR__ . '/../Src/Classes/Model/Prodi.php';
require_once __DIR__ . '/../Src/Classes/Repository.php';
require_once __DIR__ . '/../Src/Classes/Service.php';

$connection = getConnection();

function findKodeProdi(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $result = $service->findKodeProdi(["kodeProdi" => "if"]);
    var_dump($result);
    if ($result != null) {
        echo "Prodi ada";
    } else {
        echo "Prodi tidak ada";
    }
}

function addProdi(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $data = [
        "kodeProdi" => "frms",
        "fakultas" => "kesehatan",
        "prodi" => "farmasi"
    ];

    $result = $service->addProdi($data);
    if ($result){
        var_dump($result);
        echo "Berhasil menambah prodi";
    } else {
        echo "Gagal menambah prodi";
    }
}

function searchMahasiswa(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $find = $service->searchMahasiswa("sopo");
    foreach ($find as $key =>$value){        
        $no = $value->getNomor();
        $nim = $value->getNim();
        $nama = $value->getNama();
        $semester = $value->getSemester();
        $prodi = $value->getProdi()->getProdi();
        $fakultas = $value->getFakultas()->getFakultas();

        echo "no : $no\n";
        echo "nim : $nim\n";
        echo "nama : $nama\n";
        echo "semester : $semester\n";
        echo "prodi : $prodi\n";
        echo "fakultas : $fakultas\n";
        echo "<br>";
        echo "<hr>";
        
    }
}

function addAdmin(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $find = $service->addAdmin(["nama" => "sihab", "password" => "54321"]);
    if ($find){
        var_dump($find);
        echo "Berhasil menambah admin";
    } else {
        echo "Gagal menambah admin";
    }
}

function addLogin(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");

    $dataInput = [
        "nama" => '',
        "password" => '',
        "tanggal" => $tanggal,
        "waktu" => $waktu
    ];

    $result = $service->addLogin($dataInput);
    var_dump($result);
    if ($result == true){
        echo "login sukses";
    } else {
        echo "login gagal";
    }
}

function findAdmin(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $find = $service->findAdmin(["nama" => "ahmad", "password" => "54321"]);
    if ($find){
        echo "Admin tersebut ada";
    } else {
        echo "Admin tersebut tidak ada";
    }
}

function showProdi(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);

    $result = $service->showProdi();
    foreach ($result as $key => $value){
        echo $value->getNomor() . "\t";
        echo $value->getKodeProdi() . "\t";
        echo $value->getfakultas()->getKode() . "\t";
        echo $value->getfakultas()->getFakultas() . "\t";
        echo $value->getProdi() . "\t";
        echo "<br>";
        
    }
}

function findProdi(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $dataFakultas = $service->findFakultas("teknik");
    if ($dataFakultas) {
        $data = ["prodi" => 'teknik elektro', "fakultas" => $dataFakultas];
        $findProdi = $service->findProdi($data);
        if ($findProdi){ 
            var_dump($findProdi);
        }
    } else {
        echo "Prodi tidak ada";
    }
}

function findFakultas(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $result = $service->findFakultas("teknik");
    if ($result == true) {
        var_dump($result);
    } else {
        echo "Fakultas tidak ada";
    }
}

function showFakultas(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);

    $result = $service->showFakultas();
    echo $result[0]->getFakultas();
}

function updateMahasiswa(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);

    $data = [
        "nimLama" => "11111",
        "nim" => "11111",
        "nama" => "brodi",
        "jenisKelamin" => "laki-laki",
        "prodi" => "sistem informasi",
        "semester" => "5",
        "fakultas" => "teknik"
    ];

    $result = $service->updateMahasiswa($data);
    if ($result == true){
        echo "Berhasil mengedit data";
    } else {
        echo "Gagal mengedit data";
    }
    
}

function removeMahasiswa(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $result = $service->deleteMahasiswa(["nim"=>"11115"]);
    if ($result == true){
        echo "Berhasil menghapus data";
    } else {
        echo "Gagal menghapus data";
    }
    
}

function addMahasiswa(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $result = $service->addMahasiswa(["nim"=>44444, "nama"=>"Budi", "prodi"=>"Sistem Informasi", "semester"=>3, "fakultas"=>"Teknik"]);
    if ($result == true){
        echo "Berhasil menambah data";
    } else {
        echo "Gagal menambah data";
    }
}

function find(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);
    $result = $service->findMahasiswa(["nama"=>"yanto", "nim"=>22222]);
    if ($result == true) {
        echo "Login Sukses";
    } else {
        echo "Login gagal";
    }
}

function findAll(){
    global $connection;
    $repository = new Repository($connection);
    $service = new Service($repository);

    $result = $service->showMahasiswa();
    end($result);
    $count = key($result);
    $nim = $result[$count]->getNim() + 1;
    var_dump($nim);
    // var_dump($result);
}

// findKodeProdi();
// addProdi();
// searchMahasiswa();
// addAdmin();
// addLogin();
// findAdmin();
// findProdi();
// showProdi();
// findFakultas();
// showFakultas();
// updateMahasiswa();
// removeMahasiswa();
// addMahasiswa();
// find();
// findAll();

$connection = null; 
?>