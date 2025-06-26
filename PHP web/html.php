<?php

// jika ingin menampilkan string / varabel singkat kode (<?php) bisa diganti dengan (<?=)

$title = "Hello World!";
$body = "Hello World!!!";

?>

<html>
    <head>
        <title>
            <?= $title ?>
        </title>
        <style type="text/css">
            body {
                background-color: azure;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            div.container {
                background-color: green;
                width: 20%;
                height: auto;
                transition: 1s;
            }
            div.container:hover {
                border-radius: 50%;
                color: black;
                transform: rotate(360deg);
            }
            h1 {
                color: black;
                text-align: center;
                font-size: 400%;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h1> <?= $body ?> </h1>
        </div>
    </body>
</html>