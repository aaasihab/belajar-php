<?php

require_once __DIR__ . '/../../../Object.php';
$dataProdi = $view->findKodeProdi();
if ($dataProdi != null){
    $dataFakultas = $view->showFakultas();
    $view->UpdateProdi();
}

?>

<html>
    <head>
        <title>Edit Prodi</title>
    </head>
    <body>
        <div>
            <h2>Edit Prodi</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <label for="kodeProdi">
                            <th>KODE PRODI</th>
                            <td><input type="text" name="kodeProdi" value="<?= $dataProdi->getKodeProdi(); ?>"></td>
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
                            <td><input type="text" name="prodi" value="<?= $dataProdi->getProdi(); ?>"></td>
                        </label>
                    </tr>
                </table>
                <input type="submit" name="editProdi" value="Edit data">               
            </form>
            <br>
            <a class="kembali" href="Index.php?page=prodi">kembali</a>
        </div>
    </body>
</html>
