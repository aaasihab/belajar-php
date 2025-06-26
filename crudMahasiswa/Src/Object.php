<?php

include_once 'Config.php';

include_once 'Classes/Model/Admin.php';
include_once 'Classes/Model/Login.php';
include_once 'Classes/Model/Mahasiswa.php';
include_once 'Classes/Model/Fakultas.php';
include_once 'Classes/Model/Prodi.php';

include_once 'Classes/Repository.php';
include_once 'Classes/Service.php';
include_once 'Classes/View.php';

$connection = getConnection();
$repository = new Repository($connection);
$service = new Service($repository);
$view = new View($service);


?>