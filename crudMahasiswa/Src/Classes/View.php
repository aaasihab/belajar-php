<?php

class View
{
    public function __construct(private Service $service)
    {
    }
    use loginView, logoutView, adminView, mahasiswaView, prodiView, fakultasView;
}

trait loginView
{
    public function login(): void
    {
        session_start();

        // membuat session login
        if (!isset($_SESSION["login"])){
            $_SESSION["login"] = false;
        }

        // mengecek session login
        if ($_SESSION["login"] == true){
            header("location: Index.php");
            exit();
        }

        if (isset($_POST["login"])){
            $nama = htmlspecialchars($_POST["nama"]);
            $password = $_POST["password"];
        
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date("Y-m-d");
            $waktu = date("H:i:s");
            
            $dataInput = [
                "nama" => $nama,
                "password" => $password,
                "tanggal" => $tanggal,
                "waktu" => $waktu
            ];
            $result = $this->service->addLogin($dataInput);
            if ($result == true){
                echo "<script>alert('Login Sukses');window.location='Index.php'</script>";
            } else {
                echo "<script>alert('Login Gagal');history.go(-1)</script>";
            }
            
        }
    }
}

trait logoutView
{
    public function logout(): void
    {
        session_start();

        // digunakan untuk menghapus semua session
        session_destroy();

        // akan kembali ke halaman login
        $connection = null;
        echo "<script>alert('Anda telah Logout');window.location='index.php'</script>";
    }
}

trait adminView
{
    public function register(): void
    {
        if (isset($_POST['register'])) {
            $nama = htmlspecialchars($_POST["nama"]);   
            $password = $_POST["password"]; 
            
            $data = ["nama" => $nama, "password" => $password];
        
            $result = $this->service->addAdmin($data);
            if (is_bool($result)){
                echo "<script>alert('Berhasil menambah data')</script>";
            } else if (is_string($result)) {
                echo "<script>alert('$result');history.go(-1)</script>";
            }
        
        }
    }
}   

trait mahasiswaView
{

    public function createNim(): null|int
    {
        return $this->service->createNim();
    }
    
    public function updateMahasiswa()
    {
        $nimLama = $_GET["nim"];
        if (isset($_POST["editMahasiswa"])){  
            $nim = htmlspecialchars($_POST["nimBaru"]);
            $nama = htmlspecialchars(strtolower($_POST["nama"]));
            $jenisKelamin = htmlspecialchars(strtolower($_POST["jenisKelamin"]));
            $semester = htmlspecialchars($_POST["semester"]);
            $prodi = htmlspecialchars(strtolower($_POST["prodi"]));
            $fakultas = htmlspecialchars(strtolower($_POST["fakultas"]));

            $data = [
                "nimLama" => $nimLama,
                "nim" => $nim,
                "nama" => $nama,
                "jenisKelamin" => $jenisKelamin,
                "prodi" => $prodi,
                "semester" => $semester,
                "fakultas" => $fakultas
            ];

            $result = $this->service->updateMahasiswa($data);
            if (is_bool($result)){
                echo "<script>alert('Berhasil mengedit data');window.location=''</script>";
            } else if (is_string($result)) {
                echo "<script>alert('$result');history.go(-1)</script>";
            }
        }
    }


    public function deleteMahasiswa(): void
    {
        $result = $this->service->deleteMahasiswa(['nim' => $_GET["nim"]]);
        if ($result == true){
            echo "<script>alert('Berhasil menghapus data');window.location='index.php'</script>";
        } else {
            echo "<script>alert('gagal menghapus data');history.go(-1)</script>";
        }
    }

    public function addMahasiswa(): void
    {
        if (isset($_POST["tambahMahasiswa"])){  
            $nim = htmlspecialchars($_POST["nim"]);
            $nama = htmlspecialchars(strtolower($_POST["nama"]));
            $jenisKelamin = htmlspecialchars(strtolower($_POST["jenis-kelamin"]));
            $semester = htmlspecialchars($_POST["semester"]);
            $prodi = htmlspecialchars(strtolower($_POST["prodi"]));
            $fakultas = htmlspecialchars(strtolower($_POST["fakultas"]));

            $data = [
                "nim" => $nim,
                "nama" => $nama,
                "jenisKelamin" => $jenisKelamin,
                "prodi" => $prodi,
                "semester" => $semester,
                "fakultas" => $fakultas
            ];

            $result = $this->service->addMahasiswa($data);
            if (is_bool($result)){
                echo "<script>alert('Berhasil menambah data');window.location=''</script>";
            } else if (is_string($result)) {
                echo "<script>alert('$result');history.go(-1)</script>";
            }
        }

    }  
    
    public function findMahasiswa(): Mahasiswa|null
    {
        return $this->service->findMahasiswa(['nim' => $_GET['nim']]);
    }

    public function showMahasiswa(): array|null
    {
        session_start();

        if ($_SESSION["login"] != true){
            header("location: ../../Login.php");
            exit();
        }

        if (isset($_POST["cari"])){
            $cari = htmlspecialchars(strtolower($_POST["keyword"]));
            $result = $this->service->searchMahasiswa($cari);
            return $result;
        }
        return $this->service->showMahasiswa();
    }
}

trait prodiView
{
    public function updateProdi()
    {
        $kodeProdiLama = $_GET["kodeProdi"];
        if (isset($_POST["editProdi"])){  
            $kodeProdi = htmlspecialchars(strtolower($_POST["kodeProdi"]));
            $fakultas = htmlspecialchars($_POST["fakultas"]);
            $prodi = htmlspecialchars(strtolower($_POST["prodi"]));

            $data = [
                "kodeProdiLama" => $kodeProdiLama,
                "kodeProdi" => $kodeProdi,
                "fakultas" => $fakultas,
                "prodi" => $prodi
            ];

            $result = $this->service->updateProdi($data);
            if (is_bool($result)){
                echo "<script>alert('Berhasil mengedit data');window.location='Index.php?page=Prodi'</script>";
            } else if (is_string($result)) {
                echo "<script>alert('$result');history.go(-1)</script>";
            }
        }
    }

    public function findKodeProdi(): Prodi|null
    {
        return $this->service->findKodeProdi(['kodeProdi' => $_GET['kodeProdi']]);
    }


    public function deleteProdi(): void
    {
        $result = $this->service->deleteProdi(['kodeProdi' => $_GET["kodeProdi"]]);
        if ($result){
            echo "<script>alert('$result');window.location='Index.php?page=prodi'</script>";
        }
    }

    public function addProdi()
    {
        if (isset($_POST["tambahProdi"])){ 
            $kodeProdi = htmlspecialchars(strtolower($_POST["kodeProdi"]));
            $fakultas = htmlspecialchars(strtolower($_POST["fakultas"]));
            $prodi = htmlspecialchars(strtolower($_POST["prodi"]));

            $data = [
                "kodeProdi" => $prodi,
                "fakultas" => $fakultas,
                "prodi" => $prodi
            ];

            $result = $this->service->addProdi($data);
            if (is_bool($result)){
                echo "<script>alert('Berhasil menambah data');window.location=''</script>";
            } else if (is_string($result)) {
                echo "<script>alert('$result');history.go(-1)</script>";
            }
        }
    }
    public function showProdi()
    {
        return $this->service->showProdi();
    }

}

trait fakultasView
{
    public function showFakultas()
    {
        return $this->service->showFakultas();
    }
}


?>