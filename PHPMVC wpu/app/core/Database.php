<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $statement;

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name";

        // optimasi untuk menjaga koneksi database
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
    
        // validasi database
        try {
            $this->dbh = new PDO($dsn, username: $this->user, password: $this->pass);
        } catch(PDOException $e){
            die($e->getMesssage());
        }
    }

    // fungsi untuk menampung semua query
    public function query($query){
        $this->statement = $this->dbh->prepare(query: $query);
    }

    // fungsi untuk mengikat query agar terhindar dari sql injection
    public function bind($param, $value): void{
    // public function bind($param, $value, $type = null){
        // menentukan tipe data secara otomatis
        // if (is_null($type)){
        //     switch(true){
        //         case is_int($value) :
        //             $type = PDO::PARAM_INT;
        //             break;
        //         case is_bool($value) :
        //             $type = PDO::PARAM_BOOL;
        //             break;
        //         case is_null($value) :
        //             $type = PDO::PARAM_NULL;
        //             break;
        //         case is_null($value) :
        //             $type = PDO::PARAM_STR;
        //             break;
        //     }
        // }
        $this->statement->bindValue(param: $param, value: $value);
    }

    // eksekusi query
    public function execute(): void{
        $this->statement->execute();
    }

    // mengambil semua data dari database
    public function resultSet(): array{
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
        
    // mengambil 1 data dari database
    public function single(): mixed{
        $this->execute();
        $result = $this->statement->fetch(mode: PDO::FETCH_ASSOC);
        if ($result){
            return $result;
        }
        return 'gagal mengambil data';
    }

    // nama fungsi
    public function rowCount(): int{
        // fungsi milik PDO untuk mengembalikan jumlah data yang berhasil disimpan di db
        return $this->statement->rowCount();
    }
}