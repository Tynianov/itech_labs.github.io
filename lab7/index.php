<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="scripts.js" type="text/javascript"></script>
    <title>Itech Dudka</title>
    <style>
        body {
            background: #282828;
            color: white;
        }

        input {
            margin: 5px;
        }

        tr {
            height: 75px;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <td>статистика работы в сети выбранного клиента</td>
            <td>статистика работы в сети за указанный промежуток времени</td>
            <td>список клиентов с отрицательным балансом счета</td>
        </tr>
        <tr>
            <td>
                <select id="client_id" name="client_id">
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
                        $sql = "SELECT * FROM client";
                        foreach ($dbh->query($sql) as $row) {
                            $id = $row['id'];
                            $name = $row['name'];
                            print "<option value='$id'>$name</option>";
                        }
                    } catch (PDOException $e) {
                        echo $e;
                    }
                    ?>
                </select>
                <button id="client_stat">Submit</button>
            </td>
            <td>
                <label for="date_start">Начало</label>
                <input type="date" name="date_start" id="date_start"> <br>
                <label for="date_end">Конец</label>
                <input type="date" name="date_end" id="date_end"> <br>
                <button id="client_time">Submit</button>
            </td>
            <td>
                <button id="below_zero">Submit</button>
            </td>
        </tr>
        <tr>
            <td><label for="xml">XML</label><br><textarea id="xml" cols="30" rows="10"></textarea></td>
            <td><label for="html">HTML</label><br><textarea id="html" cols="30" rows="10"></textarea></td>
            <td><label for="json">JSON</label><br><textarea id="json" cols="30" rows="10"></textarea></td>
        </tr>
    </table>
</body>

</html>
