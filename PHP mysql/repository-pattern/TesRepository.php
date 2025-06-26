<?php

// repository pattern -> digunakan sebagai jembatan antara bisnis logic dengan semua perintah sql ke database
// jadi, semua perintah sql akan ditulis di repositoy dan kode progaram kita cukup menggunakan repository tersebut

require_once "Koneksi.php";
require_once "Model.php";
require_once "Comment-repository.php";

use Model\Comment;
use Repository\CommentRepositoryImpl;

$connection = getConnection2();
$repository = new CommentRepositoryImpl($connection);

// memanggil function yang berisi perintah sql
// $comment = new Comment(email: "abc@test.com", comment:"hi");
// $newComment = $repository->insert($comment);
// var_dump($newComment->getId());

//$comment = $repository->findById(32);
//var_dump($comment);

$comment = $repository->findAll();
var_dump($comment);

$connection = null;