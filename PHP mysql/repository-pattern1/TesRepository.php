<?php

require_once "Model.php";
require_once "Koneksi.php";
require_once "Comment-repository.php";

use Model1\Comments;
use Repository1\CommentsRepositoryImpl;

try {
    $connection = getConnection2();
    $repository = new CommentsRepositoryImpl($connection);

    try {
        $comment = new Comments(email: "abc@test.com", comment: "haii");
        $repository->insert($comment);

        // $statement = $repository->findAll();
        // if($statement){
        //     foreach($statement as $values){
        //         echo "id: {$values->getId()}\n";
        //         echo "email: {$values->getEmail()}\n";
        //         echo "comment: {$values->getComment()}\n\n";
        //     }
        // }
    } catch(PDOException){
        echo "error: kesalahan dalam kode SQL";
    }
    $connection = null;
} catch(PDOException){
    echo "error: database belum terhubung";
}

