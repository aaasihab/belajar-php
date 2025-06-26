<!-- get -> mengambil data dari server -->
<!-- datanya akan ditampilkan di url -->

<!DOCTYPE html>
<html >
    <head>
        <title>get</title>
    </head>
    <style>
        body {
            background-color: black;
            display: flex;
            flex-wrap: wrap;
            margin-top: auto;
            /* justify-content: center; */
            align-items: center;
        }
        #container {
            padding: 10px;
            background-color: #efefef;
        }

    </style>
    <body>
        <div id="container">
            <form action="welcome.php" method="get">
                Name : <input type="text" name="name"><br>
                Email : <input type="text" name="email">
                <input type="submit">
            </form>
        </div>
    </body>
</html>