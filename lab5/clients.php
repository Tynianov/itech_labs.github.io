<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background: #282828;
            color: white;
        }

        input {
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php
    $database = "itech_var8";
    $username = "root";
    $password = "";
    $dsn = "mysql:host=127.0.0.1;port=3306;dbname=$database;charset=utf8";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    try {
    $dbh = new PDO($dsn, $username, $password, $options);
    $start = $_POST['date_start'];
    $end = $_POST['date_end'];

    $sql = "SELECT * FROM seanse WHERE start=$start and end=$end";
        foreach ($dbh->query($sql) as $row) {
            $in_trafic = $row['in_trafic'];
            $out_trafic = $row['out_trafic'];
            $client_id = $row['client_id'];

            print "<br> in: $in_trafic  out: $out_trafic client_id: $client_id";
        }

    } catch(PDOException $e) {
        echo $e;
    }

    ?>
</body>

</html>