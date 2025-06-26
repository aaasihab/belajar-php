<?php
// Data array sebagai contoh
$data = array(
    array('id' => 1, 'name' => 'Item 1'),
    array('id' => 2, 'name' => 'Item 2'),
    array('id' => 3, 'name' => 'Item 3'),
    array('id' => 4, 'name' => 'Item 4'),
    array('id' => 5, 'name' => 'Item 5'),
    array('id' => 6, 'name' => 'Item 6'),
    array('id' => 7, 'name' => 'Item 7'),
    array('id' => 8, 'name' => 'Item 8'),
    array('id' => 9, 'name' => 'Item 9'),
    array('id' => 10, 'name' => 'Item 10'),
    array('id' => 11, 'name' => 'Item 11'),
    array('id' => 12, 'name' => 'Item 12'),
    array('id' => 13, 'name' => 'Item 13'),
    array('id' => 14, 'name' => 'Item 14'),
    array('id' => 15, 'name' => 'Item 15'),
    array('id' => 16, 'name' => 'Item 16'),
    array('id' => 17, 'name' => 'Item 17'),
    array('id' => 18, 'name' => 'Item 18'),
    array('id' => 19, 'name' => 'Item 19'),
    array('id' => 20, 'name' => 'Item 20')
);

// Konfigurasi pagination
$itemsPerPage = 5; // Jumlah item per halaman
$currentPage = isset($_GET['page']) && $_GET['page'] < count($data) ? $_GET['page'] : 1; // Halaman saat ini
$offset = ($currentPage - 1) * $itemsPerPage; // Offset data

// Mengambil data sesuai dengan halaman saat ini menggunakan array_slice
$pagedData = array_slice($data, $offset, $itemsPerPage);

// Menghitung jumlah halaman berdasarkan jumlah data dan item per halaman
$totalPages = ceil(count($data) / $itemsPerPage);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Data List</h2>
        <ul class="list-group">
            <?php foreach ($pagedData as $item): ?>
            <li class="list-group-item"><?= $item['name'] ?></li>
            <?php endforeach; ?>
        </ul>

        <!-- Pagination links -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($currentPage == $i ? 'active' : '') ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <!-- Memuat script JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
