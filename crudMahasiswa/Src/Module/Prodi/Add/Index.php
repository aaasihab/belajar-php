<?php

require_once __DIR__ . '/../../../Object.php';
$view->addProdi();
$dataFakultas = $view->showFakultas();

?>

<html>
    <head>
        <title>Tambah Prodi</title>
    </head>
    <body>
        <div>
            <h2>Tambah Prodi</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <label for="kodeProdi">
                            <th>KODE PRODI</th>
                            <td><input type="text" name="kodeProdi"></td>
                        </label>
                    </tr>
                    <tr>
                        <label for="Fakultas">
                            <th>FAKULTAS</th>
                            <td>
                                <select name="fakultas">
                                    <?php foreach($dataFakultas as $key => $value){; ?>
                                        <?= $fakultas = $value->getFakultas(); ?>
                                        <option value="<?= $fakultas; ?>"><?= $fakultas; ?></option>
                                    <?php }; ?>
                                </select>
                            </td>
                        </label>
                    </tr>
                    <tr>
                        <label for="prodi">
                            <th>PRODI</th>
                            <td><input type="text" name="prodi"></td>
                        </label>
                    </tr>
                </table>
                <input type="submit" name="tambahProdi" value="Tambah data">               
            </form>
            <br>
            <a class="kembali" href="Index.php?page=prodi">kembali</a>
        </div>
    </body>
</html>
