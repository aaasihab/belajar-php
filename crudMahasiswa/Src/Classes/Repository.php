<?php

class Repository
{    
    public function __construct(private \PDO $connection)
    {
    }
    use loginRepo, adminRepo, mahasiswaRepo, prodiRepo, fakultasRepo;
}

trait loginRepo
{
    public function login(Login $login): void
    {
        $idAdmin = $login->getIdAdmin();
        $tanggal = $login->getTanggal();
        $waktu = $login->getWaktu();
        
        $sql = "INSERT INTO login(id_admin, tanggal, waktu) values (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$idAdmin, $tanggal, $waktu]);
    }
}

trait adminRepo
{
    public function addAdmin(Admin $admin): void
    {
        $sql = "INSERT INTO admin(nama_admin, password) values (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$admin->getNama(), $admin->getPassword()]);
    }

    public function findAdmin(Admin $admin): Admin|null
    {
        $sql = "SELECT * FROM admin WHERE nama_admin = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$admin->getNama()]);

        foreach ($statement as $row){
            $dbAdmin = new Admin();
            $dbAdmin->setId($row['id_admin']);
            $dbAdmin->setNama($row['nama_admin']);         
            $dbAdmin->setPassword($row['password']);         
            return $dbAdmin;
        }
        return null;
    }
}

trait mahasiswaRepo
{
    public function findLastMahasiswa(): Mahasiswa|null
    {
        $sql = "SELECT * FROM view_mahasiswa ORDER BY nim DESC LIMIT 1";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        
        foreach ($statement as $row){
            $fakultas = new fakultas();
            $fakultas->setFakultas($row['fakultas']);

            $prodi = new Prodi();
            $prodi->setProdi($row['prodi']);

            $mhs = new Mahasiswa();
            $mhs->setNim($row['nim']);
            $mhs->setNama($row['nama']);
            $mhs->setJenisKelamin($row['jenis_kelamin']);
            $mhs->setSemester($row['semester']);
            $mhs->setProdi($prodi);
            $mhs->setFakultas($fakultas);          

            return $mhs;
        }
        return null;
    }

    public function update(Mahasiswa $mahasiswa, string $nimLama): void
    {
        $nim = $mahasiswa->getNim();
        $nama = $mahasiswa->getNama();
        $jenisKelamin = $mahasiswa->getJenisKelamin();
        $semester = $mahasiswa->getSemester();
        $kodeFakultas = $mahasiswa->getFakultas()->getKode();
        $kodeProdi = $mahasiswa->getProdi()->getKodeProdi();

        $sql = "UPDATE mahasiswa SET nim = ?, nama = ?, jenis_kelamin = ?, semester = ?, kode_fakultas = ?, kode_prodi = ? WHERE nim = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$nim, $nama, $jenisKelamin, $semester, $kodeFakultas, $kodeProdi, $nimLama]);
    }

    public function delete(Mahasiswa $mahasiswa): void
    {
        $sql = "DELETE FROM mahasiswa WHERE nim = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$mahasiswa->getNim()]);
    }

    public function save(Mahasiswa $mahasiswa): void
    {
        $nim = $mahasiswa->getNim();
        $nama = $mahasiswa->getNama();
        $jenisKelamin = $mahasiswa->getJenisKelamin();
        $semester = $mahasiswa->getSemester();
        $kodeFakultas = $mahasiswa->getFakultas()->getKode();
        $kodeProdi = $mahasiswa->getProdi()->getKodeProdi();
    
        $sql = "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, semester, kode_fakultas, kode_prodi) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$nim, $nama, $jenisKelamin, $semester, $kodeFakultas, $kodeProdi]);
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM view_mahasiswa ORDER BY nim";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $result = [];
    
        $no = 1;
        foreach ($statement as $row){
            $fakultas = new fakultas();
            $fakultas->setFakultas($row['fakultas']);

            $prodi = new Prodi();
            $prodi->setProdi($row['prodi']);

            $mhs = new Mahasiswa();
            $mhs->setNomor($no);
            $mhs->setNim($row['nim']);
            $mhs->setNama($row['nama']);
            $mhs->setJenisKelamin($row['jenis_kelamin']);
            $mhs->setSemester($row['semester']);
            $mhs->setProdi($prodi);
            $mhs->setFakultas($fakultas);            

            $result[] = $mhs;
            $no += 1;
        }
        $no = 1;
        return $result;
    }
    
    # mencari mahasiswa yang general
    public function searchMahasiswa(string $cari): Array
    {
        $cari = "%$cari%";
        $sql = "SELECT * FROM view_mahasiswa WHERE nim LIKE ?
                OR nama LIKE ? OR jenis_kelamin LIKE ? OR semester LIKE ? 
                OR prodi LIKE ? OR fakultas LIKE ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$cari, $cari, $cari, $cari, $cari, $cari]);

        $result = [];

        $no = 1;
        foreach ($statement as $row){
            $fakultas = new fakultas();
            $fakultas->setFakultas($row['fakultas']);

            $prodi = new Prodi();
            $prodi->setProdi($row['prodi']);

            $mhs = new Mahasiswa();
            $mhs->setNomor($no);
            $mhs->setNim($row['nim']);
            $mhs->setNama($row['nama']);
            $mhs->setJenisKelamin($row['jenis_kelamin']);
            $mhs->setSemester($row['semester']);
            $mhs->setProdi($prodi);
            $mhs->setFakultas($fakultas);          

            $result[] = $mhs;
            $no += 1;
        }
        $no = 1;
        return $result;
    }

    # mencari mahasiswa yang spesifik
    public function findMahasiswa(Mahasiswa $mahasiswa): Mahasiswa|null
    {
        $sql = "SELECT * FROM view_mahasiswa WHERE nim = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$mahasiswa->getNim()]);

        foreach ($statement as $row){
            $fakultas = new fakultas();
            $fakultas->setFakultas($row['fakultas']);

            $prodi = new Prodi();
            $prodi->setProdi($row['prodi']);

            $mhs = new Mahasiswa();
            $mhs->setNim($row['nim']);
            $mhs->setNama($row['nama']);
            $mhs->setJenisKelamin($row['jenis_kelamin']);
            $mhs->setSemester($row['semester']);
            $mhs->setProdi($prodi);
            $mhs->setFakultas($fakultas);          

            return $mhs;
        }
        return null;
    }
}

trait prodiRepo
{
    public function updateProdi(Prodi $prodi, string $kodeProdiLama): void
    {
        $kodeProdi = $prodi->getKodeProdi();
        $kodeFakultas = $prodi->getFakultas()->getKode();
        $prodi = $prodi->getProdi();

        $sql = "UPDATE prodi SET kode_prodi = ?, kode_fakultas = ?, nama_prodi = ? WHERE kode_prodi = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$kodeProdi, $kodeFakultas, $prodi, $kodeProdiLama]);
    }

    public function deleteProdi(Prodi $prodi): string
    {
        try {
            $sql = "DELETE FROM prodi WHERE kode_prodi = ? AND NOT EXISTS (
                    SELECT kode_prodi FROM mahasiswa WHERE mahasiswa.kode_prodi = prodi.kode_prodi)";
            $statement = $this->connection->prepare($sql);
            $success = $statement->execute([$prodi->getKodeProdi()]);
            if ($success) {
                $rowCount = $statement->rowCount();
                if ($rowCount > 0) {
                    return "Berhasil menghapus data";
                }
                return "Tidak dapat menghapus data, prodi terikat dengan data mahasiswa!";
            }
        } catch (PDOException $e) {
            return "Terjadi kesalahan sintaksis! Harap hubungi pengembang";
        }
    }

    public function addProdi(Prodi $prodi): void
    {
        $kodeProdi = $prodi->getKodeProdi();
        $kodeFakultas = $prodi->getFakultas()->getKode();
        $namaProdi = $prodi->getProdi();
        
        $sql = "INSERT INTO prodi(kode_prodi, kode_fakultas, nama_prodi) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$kodeProdi, $kodeFakultas, $namaProdi]);
    }

    public function findKodeProdi(Prodi $prodi): Prodi|null
    {
        $sql = "SELECT * FROM prodi where kode_prodi = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$prodi->getKodeProdi()]);

        foreach ($statement as $row){
            $fakultas = new Fakultas();
            $fakultas->setKode($row["kode_fakultas"]);

            $newProdi = new Prodi();
            $newProdi->setKodeProdi($row["kode_prodi"]);
            $newProdi->setFakultas($fakultas);
            $newProdi->setProdi($row["nama_prodi"]);

            return $newProdi;
        }
        return null;
    }

    public function findProdi(Prodi $prodi): Prodi|null
    {
        $sql = "SELECT * FROM prodi where kode_fakultas = ? and nama_prodi = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$prodi->getFakultas()->getKode(), $prodi->getProdi()]);

        foreach ($statement as $row){
            $fakultas = new Fakultas();
            $fakultas->setKode($row["kode_fakultas"]);

            $newProdi = new Prodi();
            $newProdi->setKodeProdi($row["kode_prodi"]);
            $newProdi->setFakultas($fakultas);
            $newProdi->setProdi($row["nama_prodi"]);

            return $newProdi;
        }
        return null;
    }

    public function showProdi(): array
    {
        $sql = "SELECT *, nama_fakultas FROM prodi 
                INNER JOIN fakultas ON prodi.kode_fakultas = fakultas.kode_fakultas
                ORDER BY prodi.kode_fakultas";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $result = [];

        $no = 1;
        foreach ($statement as $row){
            $fakultas = new Fakultas();
            $fakultas->setKode($row["kode_fakultas"]);
            $fakultas->setFakultas($row["nama_fakultas"]);

            $prodi = new Prodi();
            $prodi->setNomor($no);
            $prodi->setKodeProdi($row["kode_prodi"]);
            $prodi->setFakultas($fakultas);
            $prodi->setProdi($row["nama_prodi"]);

            $result[] = $prodi;
            $no += 1;
        }

        $no = 1;
        return $result;
    }
}

trait fakultasRepo
{
    public function findFakultas(Fakultas $fakultas): Fakultas|null
    {
        $sql = "SELECT * FROM fakultas where nama_fakultas = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$fakultas->getFakultas()]);

        foreach ($statement as $row){
            $newFakultas = new Fakultas();
            $newFakultas->setKode($row["kode_fakultas"]);
            $newFakultas->setFakultas($row["nama_fakultas"]);

            return $newFakultas;
        }
        return null;
    }
    
    public function showFakultas(): array
    {
        $sql = "SELECT * FROM fakultas";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $result = [];

        $no = 1;
        foreach ($statement as $row){
            $fakultas = new Fakultas();
            $fakultas->setNomor($no);
            $fakultas->setKode($row["kode_fakultas"]);
            $fakultas->setFakultas($row["nama_fakultas"]);

            $result[] = $fakultas;
            $no += 1;
        }
        $no = 1;
        return $result;

    }
}



?>