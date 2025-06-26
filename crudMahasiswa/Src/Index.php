<?php
include_once 'Object.php';
// array untuk data mahasiswa
$data = $view->showMahasiswa();
?>

<html>
    <head>
        <title>Data Mahasiswa</title>
        <link rel="stylesheet" href="../Css/Style.css">
    </head>
    <body class="home-container">
        <div>
            <header>
                <h1>Daftar Mahasiswa</h1>
            </header>
            <form action="Index.php" method="post">
                <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword pencarian">
                <input type="submit" name="cari" value="Cari" >
            </form>
            <table class="home-table">
                <thead>
                    <tr class="home-thead">
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Semester</th>
                        <th>Prodi</th>
                        <th>Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $key => $value) {
                    if ($value->getNomor() % 2 == 0){
                        $id = "genap";
                    } else {
                        $id = "ganjil";
                    } ?>
                    <tr class="home-tvalue" id="<?= $id; ?>">
                        <td><?= $value->getNomor(); ?></td>
                        <td><?= $value->getNim(); ?></td>
                        <td><?= $value->getNama(); ?></td>
                        <td><?= $value->getJenisKelamin(); ?></td>
                        <td><?= $value->getSemester(); ?></td>
                        <td><?= $value->getProdi()->getProdi(); ?></td>
                        <td><?= $value->getFakultas()->getFakultas(); ?></td>
                        <td>
                            <div class="button" id="aksi">
                                <a class="crud" href="Index.php?page=Mahasiswa/Update&nim=<?= $value->getNim(); ?>">
                                    <span>Edit</span>
                                </a>
                                <a class="crud" href="Index.php?page=Mahasiswa/Delete&nim=<?= $value->getNim(); ?>">
                                    <span>Hapus</span>
                                </a> 
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="button">
                <a class="crud" href="Index.php?page=mahasiswa/add"><span>Tambah Mahasiswa</span></a>
                <a class="crud" href="Index.php?page=admin/add"><span>Tambah admin</span></a>
                <a class="crud" href="Index.php?page=prodi"><span>Daftar Prodi</span></a>
                <a class="crud" href="Index.php?page=fakultas"><span>Daftar Fakultas</span></a>
            </div>
            <br>
            <a class="logout" href="Logout.php">logout</a>
        </div>
    </body>
</html>
