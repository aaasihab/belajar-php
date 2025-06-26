<?php

require_once __DIR__ . '/../../../Object.php';

$data = $view->findMahasiswa();
if ($data != null){
    $view->UpdateMahasiswa();
}


?>

<html>
    <head>
        <title>Edit Data</title>
    </head>
    <body>
        <div>
            <h2>Edit Data</h2>
            <form action="" method="post">
                <table>
                    <tr>                        
                        <label for="nim">
                            <th>NIM</th>
                            <td><input type="number" name="nimBaru" readonly="readonly" value="<?= $data->getNim();?>"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="nama">
                            <th>NAMA</th>                          
                            <td><input type="text" name="nama" value="<?= $data->getNama();?>"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="jenisKelamin">
                            <th>JENIS KELAMIN</th>                          
                            <td>
                                <input type="Radio" name="jenisKelamin" value="laki-laki"><label for="laki-laki">laki-laki</label>
                                <input type="Radio" name="jenisKelamin" value="perempuan"><label for="perempuan">perempuan</label>
                            </td>
                        </label>
                    </tr>
                    <tr>
                        <label for="semester">
                            <th>SEMESTER</th>
                            <td><input type="number" name="semester" min="1" max="14" value="<?= $data->getSemester();?>"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="fakultas">
                            <th>FAKULTAS</th>
                            <td><input type="text" name="fakultas" value="<?= $data->getFakultas()->getFakultas();?>"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="prodi">
                            <th>PRODI</th>
                            <td><input type="text" name="prodi" value="<?= $data->getProdi()->getProdi();?>"></td>
                        </label>
                    </tr>
                </table>
                <input type="submit" name="editMahasiswa" value="Edit Data">               
            </form>
            <br>
            <a class="kembali" href="Index.php">kembali</a>
        </div>
    </body>
</html>
