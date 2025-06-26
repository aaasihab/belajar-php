<!DOCTYPE html>
<html>
    <head>
        <title>
            global-variable
        </title>
        <style>
            body {
                background-color: black;
                color: white;
            }

        </style>
    </head>
    <body>
        <h1>$_SERVER</h1>
        <table border="1">
            <?php foreach ($_SERVER as $key => $value){ ?>
                <tr>
                    <td> <?=$key?> </td>
                    <td> <?=$value?> </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>