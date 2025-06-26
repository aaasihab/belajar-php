<?php

// include 'Template/header.php';
// include 'Template/sidebar.php';
try {
    if (!empty($_GET['page'])){
        include_once 'Src/Module/' . $_GET['page'] . '/Index.php';
    } else {
        include_once 'Src/Index.php';
    }
} catch (Exception) {
    include_once '404.php';
}
// include 'Template/footer.php';

?>

