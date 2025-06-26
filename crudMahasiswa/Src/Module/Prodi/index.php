<?php
require_once __DIR__ . '/../../Object.php';
$data = $view->showProdi();
?>

<html>
    <head>
        <title>Data Prodi</title>
        <link rel="stylesheet" href="../Css/Style.css">
    </head>
    <body class="home-container">
        <div>
            <header>
                <h1>Daftar Prodi</h1>
            </header>
            <form action="Index.php" method="post">
                <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword pencarian">
                <input type="submit" name="cari" value="Cari" >
            </form>
            <table class="home-table">
                <thead>
                    <tr class="home-thead">
                        <th>No</th>
                        <th>Kode Prodi</th>
                        <th>fakultas</th>
                        <th>Prodi</th>
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
                        <td><?= $value->getKodeProdi(); ?></td>
                        <td><?= $value->getfakultas()->getFakultas(); ?></td>
                        <td><?= $value->getProdi(); ?></td>
                        <td>
                            <div class="button" id="aksi">
                                <a class="crud" href="Index.php?page=Prodi/Update&kodeProdi=<?= $value->getKodeProdi(); ?>">
                                    <span>Edit</span>
                                </a>
                                <a class="crud" href="Index.php?page=Prodi/Delete&kodeProdi=<?= $value->getKodeProdi(); ?>">
                                    <span>Hapus</span>
                                </a> 
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="button">
                <a class="crud" href="Index.php?page=prodi/add"><span>Tambah Prodi</span></a>
            </div>
            <br>
            <a class="logout" href="Index.php">Kembali</a>
        </div>
    </body>
</html>
