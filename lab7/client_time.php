
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
        $start_p = $_POST['date_start'];
        $end_p = $_POST['date_end'];
        $array = "<div> <p>$start_p - $end_p</p><br>";

        $sql = "SELECT * FROM seanse WHERE start > '$start_p' and end < '$end_p'";
        foreach ($dbh->query($sql) as $row) {
            $str = implode(', ', array_map(
                function ($v, $k) { return sprintf("%s='%s'", $k, $v); },$row,
                array_keys($row)));

            $array .= "<p>$str</p><br><br>";
        }
        $array .= '</div>';
        echo $array;
    } catch (PDOException $e) {
        echo $e;
    }
?>
