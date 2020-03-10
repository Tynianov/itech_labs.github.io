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
        $sql = "SELECT * FROM client WHERE balance < 0";
        $array = array();

        foreach ($dbh->query($sql) as $row) {
                $array[] = $row;
        }
        echo json_encode($array);
    } catch (PDOException $e) {
        echo $e;
    }
?>
