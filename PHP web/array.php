<!DOCTYPE html>
<html>
    <head>
        <title>array</title>
        <style>
            body {
             background-color: black;
            }
            .container {
                width: 50px;
                height: 50px;
                background-color: aquamarine;
                margin: 3px;
                float: left;
                line-height: 50px;
                text-align: center;
                transition: 1s;
            }
            .container:hover {
                transform: rotate(360deg);
                border-radius: 90%;
            }
        </style>
    </head>
    <body>
        <?php $numbers = [1,2,3,4,5]; ?>
        <?php foreach ($numbers as $number) {?>
            <div class="container"><?= $number ?></div>
        <?php } ?>
    </body>
</html>