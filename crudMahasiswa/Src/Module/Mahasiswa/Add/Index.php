<?php

require_once __DIR__ . '/../../../Object.php';
$view->addMahasiswa();
$nim = $view->createNim();
?>

<html>
    <head>
        <title>Tambah Mahasiswa</title>
    </head>
    <body>
        <div>
            <h2>Tambah Mahasiswa</h2>
            <form action="" method="post">
                <table>
                    <tr>                        
                        <label for="nim">
                            <th>NIM</th>
                            <td><input type="number" name="nim" readonly="readonly" value="<?= $nim; ?>"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="nama">
                            <th>NAMA</th>                          
                            <td><input type="text" name="nama"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="jenis-kelamin">
                            <th>JENIS KELAMIN</th>                          
                            <td>
                                <input type="Radio" name="jenis-kelamin" value="laki-laki"><label for="laki-laki">laki-laki</label>
                                <input type="Radio" name="jenis-kelamin" value="perempuan"><label for="perempuan">perempuan</label>
                            </td>
                        </label>
                    </tr>
                    <tr>
                        <label for="semester">
                            <th>SEMESTER</th>
                            <td><input type="number" name="semester" min="1" max="14"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="fakultas">
                            <th>FAKULTAS</th>
                            <td><input type="text" name="fakultas"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="prodi">
                            <th>PRODI</th>
                            <td><input type="text" name="prodi"></td>
                        </label>
                    </tr>
                </table>
                <input type="submit" name="tambahMahasiswa" value="Tambah data">               
            </form>
            <br>
            <a class="kembali" href="Index.php">kembali</a>
        </div>
    </body>
</html>
