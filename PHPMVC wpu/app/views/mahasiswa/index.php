<div class="container">
    <div class="row">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-6">
            <form action="<?= BASEURL ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-1">
                    <input type="text" class="form-control cariMahasiswa" placeholder="Cari Mahasiswa..."
                        aria-label="Cari Mahasiswa..." aria-describedby="button-addon2" name="keyword" id="keyword" data-id="keyword">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-6">
            <h1><?= $data['judul'] ?></h1>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) { ?>
                    <li class="list-group-item list-group-item border border-dark"><?= $mhs['nama'] ?>
                        <a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id']; ?>"
                            class="badge btn btn-danger float-end ms-1" style="padding: .4rem .5rem; font-size: .7rem;" onclick="return confirm('yakin?');">Hapus</a>
                        <a href="<?= BASEURL ?>/mahasiswa/ubah/<?= $mhs['id']; ?>"
                            class="badge btn btn-success float-end ms-1 modalTampilUbah" style="padding: .4rem .5rem; font-size: .7rem;" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                        <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id']; ?>"
                            class="badge btn btn-primary float-end" style="padding: .4rem .5rem; font-size: .7rem;">Detail</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="row mt-3" id="tombolKembali">
        <div class="col-6">
            <a href="<?= BASEURL ?>/mahasiswa" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Kembali</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="number" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="mb-3">
                            <label for="prodi">Prodi</label>
                            <select class="form-control" id="prodi" name="prodi">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>