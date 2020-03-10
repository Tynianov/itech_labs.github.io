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
        $client_id = $_POST['client_id'];
        $array = '<div>';

        $sql = "SELECT * FROM seanse WHERE client_id=$client_id";
        foreach ($dbh->query($sql) as $row) {
            $array .= "<p>" . $implode(' ', $row) . "</p><br><br";
        }
        $array .= '</div>';

        var_dump($array);
    } catch (PDOException $e) {
        echo $e;
    }
?>
