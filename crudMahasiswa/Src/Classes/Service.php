<?php

class Service
{
    public function __construct(private Repository $repository)
    {
    }
    use loginService, adminService, mahasiswaService, prodiService, fakultasService;
}


trait loginService
{
    public function addLogin(array $dataInput): bool
    {
        if (empty($dataInput['nama']) || empty($dataInput['password'])){
            return false;
        }

        $admin = $this->findAdmin(["nama" => $dataInput['nama'], "password" => $dataInput['password']]);
        if ($admin == null){
            return false;
        }

        $_SESSION["login"] = true;
        $idAdmin = $admin->getId();
        $data = ["idAdmin" => $idAdmin, "tanggal" => $dataInput['tanggal'], "waktu" => $dataInput['waktu']];

        $login = new Login();
        $login->setIdAdmin($data["idAdmin"]);
        $login->setTanggal($data["tanggal"]);
        $login->setWaktu($data["waktu"]);
        
        $this->repository->login($login);
        return true;
    }
}

trait adminService
{
    # crud untuk admin
    public function findAdmin(array $data): Admin|null
    {
        $admin = new Admin();
        $admin->setNama($data["nama"]);
        $admin->setPassword($data["password"]);

        # pengecekan username
        $find = $this->repository->findAdmin($admin);
        if ($find == null){
            return null;
        }

        $passwordUser = $admin->getPassword();
        $dbPassword = $find->getPassword();
        
        # pengecekan password
        $cek = password_verify($passwordUser, $dbPassword);
        if ($cek != true){
            return null;
        }
        return $find;
    }

    public function addAdmin(array $data): bool|string
    {
        if (empty($data['nama'])){
            $message = 'nama tidak boleh kosong!';
            return $message;
        }
        
        if (strlen($data["nama"]) > 7 ){
            $message = 'nama tidak boleh lebih dari 7 angka!';
            return $message;
        }

        if (empty($data['password'])){
            $message = 'password tidak boleh kosong!';
            return $message;
        }

        if (strlen($data['password']) != 5){
            $message = 'password harus terdiri dari 5 angka!';
            return $message;
        }
        
        $findAdmin = $this->findAdmin(['nama' => $data["nama"], 'password' => $data["password"]]);
        if ($findAdmin != null){
            $message = 'Nama tersebut sudah terpakai';
            return $message;
        }

        $passwordHashed = password_hash($data['password'], PASSWORD_DEFAULT);
        $admin = new Admin();
        $admin->setNama($data["nama"]);
        $admin->setPassword($passwordHashed);

        if (!isset($message)){
            $this->repository->addAdmin($admin);
            return true;
        }
        
    }
}

trait mahasiswaService
{
    public function searchMahasiswa(string $cari): array
    {
        return $this->repository->searchMahasiswa($cari);
    }

    public function createNim(): null|int
    {
        $lastMhs = $this->repository->findLastMahasiswa();
        if ($lastMhs == null){
            return null;
        }
        $nim = $lastMhs->getNim() + 1;;
        return $nim;
    }

    # crud untuk mahasiswa
    public function updateMahasiswa(array $data): bool|string
    {
        if (empty($data['nama'])){    
            $message = 'Nama tidak boleh kosong!';
            return $message;
        }
        if (empty($data['jenisKelamin'])){    
            $message = 'Jenis kelamin tidak boleh kosong!';
            return $message;
        }
        if (empty($data['semester'])){
            $message = 'Semester tidak boleh kosong!';
            return $message;
        }
        if (empty($data['fakultas'])){
            $message = 'Fakultas tidak boleh kosong!';
            return $message;
        }
        if (empty($data['prodi'])){
            $message = 'Prodi tidak boleh kosong!';
            return $message;
        }

        $findFakultas = $this->findFakultas($data["fakultas"]);            
        if ($findFakultas == null){
            # pesan jika fakultas tidak sesuai
            $message = 'Fakultas tidak ada!';
            return $message;
        }

        $findProdi = $this->findProdi(["prodi" => $data["prodi"], "fakultas" => $findFakultas]);
        if ($findProdi == null){    
            # pesan jika prodi tidak sesuai
            $message = 'Prodi tidak ada!';
            return $message;
        }

        $dataBaru = [
            "nimLama" => $data["nimLama"],
            "nim" => $data["nim"], 
            "nama" => $data["nama"], 
            "jenisKelamin" => $data["jenisKelamin"], 
            "prodi" => $findProdi, 
            "semester" => $data["semester"], 
            "fakultas" => $findFakultas
        ];
        
        $mahasiswa = new Mahasiswa();
        $mahasiswa->setNim($dataBaru["nim"]);
        $mahasiswa->setNama($dataBaru["nama"]);
        $mahasiswa->setJenisKelamin($dataBaru["jenisKelamin"]);
        $mahasiswa->setSemester($dataBaru["semester"]);
        $mahasiswa->setProdi($dataBaru["prodi"]);
        $mahasiswa->setFakultas($dataBaru["fakultas"]);
        
        if (!isset($message)){
            $this->repository->update($mahasiswa, $dataBaru["nimLama"]);
            return true;
        }
    }

    public function deleteMahasiswa(array $data): bool
    {
        $findMhs = $this->findMahasiswa(['nim' => $data["nim"]]);
        if ($findMhs == null){
            return false;
        } else {   
            $mahasiswa = new Mahasiswa();
            $mahasiswa->setNim($data["nim"]);
            $this->repository->delete($mahasiswa);
            return true;
        }

    }


    public function addMahasiswa(array $data): string|bool
    {   
        # pengecekan isi inputan 
        if (empty($data['nim'])){
            $message = 'NIM tidak boleh kosong!';
            return $message;
        }
        if (strlen($data['nim']) != 5){
            $message = 'NIM harus terdiri dari 5 angka!';
            return $message;
        }
        if (empty($data['nama'])){    
            $message = 'Nama tidak boleh kosong!';
            return $message;
        }
        if (empty($data['jenisKelamin'])){    
            $message = 'Jenis Kelamin tidak boleh kosong!';
            return $message;
        }
        if (empty($data['semester'])){
            $message = 'Semester tidak boleh kosong!';
            return $message;
        }
        if (empty($data['fakultas'])){
            $message = 'Fakultas tidak boleh kosong!';
            return $message;
        }
        if (empty($data['prodi'])){
            $message = 'Prodi tidak boleh kosong!';
            return $message;
        }

        $findMhs = $this->findMahasiswa(['nim' => $data["nim"]]);
        if ($findMhs != null){
            $message = 'NIM sudah terpakai!';
            return $message;
        }

        $findFakultas = $this->findFakultas($data["fakultas"]);            
        if ($findFakultas == null){
            # pesan jika fakultas tidak sesuai
            $message = 'Fakultas tidak ada!';
            return $message;
        }

        $findProdi = $this->findProdi(["prodi" => $data["prodi"], "fakultas" => $findFakultas]);
        if ($findProdi == null){    
            # pesan jika prodi tidak sesuai
            $message = 'Prodi tidak ada!';
            return $message;
        }

        $data = [
            "nim" => $data["nim"], 
            "nama" => $data["nama"], 
            "jenisKelamin" => $data["jenisKelamin"], 
            "prodi" => $findProdi, 
            "semester" => $data["semester"], 
            "fakultas" => $findFakultas
        ];   
        
        $mahasiswa = new Mahasiswa();
        $mahasiswa->setNim($data["nim"]);
        $mahasiswa->setNama($data["nama"]);
        $mahasiswa->setJenisKelamin($data["jenisKelamin"]);
        $mahasiswa->setSemester($data["semester"]);
        $mahasiswa->setProdi($data["prodi"]);
        $mahasiswa->setFakultas($data["fakultas"]);
        
        if (!isset($message)){
            $this->repository->save($mahasiswa);
            return true;
        }
        
    }

    public function findMahasiswa(array $data): Mahasiswa|null
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->setNim($data["nim"]);

        $find = $this->repository->findMahasiswa($mahasiswa);
        return $find;
    }
    
    public function showMahasiswa(): array
    {
        return $this->repository->findAll();
    }
}

trait prodiService
{ 
    public function updateProdi(array $data): bool|string
    {
        if (empty($data['kodeProdi'])){
            $message = 'Kode Prodi tidak boleh kosong!';
            return $message;
        }
        if (empty($data['prodi'])){
            $message = 'Prodi tidak boleh kosong!';
            return $message;
        }

        $findFakultas = $this->findFakultas($data["fakultas"]);            
        if ($findFakultas == null){
            # pesan jika fakultas tidak sesuai
            $message = 'Fakultas tidak ada!';
            return $message;
        }

        $findProdi = $this->findProdi(["prodi" => $data["prodi"], "fakultas" => $findFakultas]);
        if ($findProdi != null){    
            # pesan jika sudah ada prodi
            $message = 'Prodi sudah ada!';
            return $message;
        }

        // $dataBaru = [
        //     "kodeProdiLama" => $data["kodeProdiLama"], 
        //     "kodeProdi" => $data["kodeProdi"], 
        //     "fakultas" => $findFakultas,
        //     "prodi" => $data["prodi"]
        // ];
        
        $prodi = new Prodi();
        $prodi->setKodeProdi($data['kodeProdi']);
        $prodi->setFakultas($findFakultas);
        $prodi->setProdi($data['prodi']);
        
        if (!isset($message)){
            $this->repository->updateProdi($prodi, $data["kodeProdiLama"]);
            return true;
        }
    }


    public function deleteProdi(array $data): string|bool
    {
        $findProdi = $this->findKodeProdi(['kodeProdi' => $data["kodeProdi"]]);
        if ($findProdi == null){
            return false;
        } 
        return $this->repository->deleteProdi($findProdi);
    }

     public function addProdi(array $data): string|bool
     {
        if (empty($data['kodeProdi'])){
            $message = 'Kode Prodi tidak boleh kosong!';
            return $message;
        }
        if (empty($data['fakultas'])){
            $message = 'Fakultas tidak boleh kosong!';
            return $message;
        }
        if (empty($data['prodi'])){
            $message = 'Prodi tidak boleh kosong!';
            return $message;
        }
        $findFakultas = $this->findFakultas($data["fakultas"]);            
        if ($findFakultas == null){
            # pesan jika fakultas tidak sesuai
            $message = 'Fakultas tidak ada!';
            return $message;
        }
        $findProdi = $this->findProdi(["prodi" => $data["prodi"], "fakultas" => $findFakultas]);
        if ($findProdi != null){    
            # pesan jika prodi sama
            $message = 'Prodi sudah ada!';
            return $message;
        }

        $prodi = new Prodi();
        $prodi->setKodeProdi($data['kodeProdi']);
        $prodi->setFakultas($findFakultas);
        $prodi->setProdi($data['prodi']);

        if (!isset($message)){
            $this->repository->addProdi($prodi);
            return true;
        }
     }

     public function showProdi(): array
     {
         return $this->repository->showProdi();
     }
 
     public function findKodeProdi(array $data): Prodi|null
     {
         $prodi = new Prodi();
         $prodi->setKodeProdi($data['kodeProdi']);
 
         $find = $this->repository->findKodeProdi($prodi);
         if ($find){
             return $find;
         }
         return null;
     }
 
     public function findProdi(array $data): Prodi|null
     {
         $prodi = new Prodi();
         $prodi->setFakultas($data["fakultas"]);
         $prodi->setProdi($data['prodi']);
 
         $find = $this->repository->findProdi($prodi);
         if ($find){
             return $find;
         }
         return null;
     }
}

trait fakultasService
{
     # crud untuk fakultas
     public function findFakultas(string|null $namaFakultas): Fakultas|null
     {
         $fakultas = new Fakultas();
         $fakultas->setFakultas($namaFakultas);
 
         $find = $this->repository->findFakultas($fakultas);
         if ($find){
             return $find;
         }
         return null;
     }
 
     public function showFakultas(): array
     {
         return $this->repository->showFakultas();
     }
 
}



?>