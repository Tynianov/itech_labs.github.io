<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <title>Itech Dudka</title>
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
    <table width="100%">
        <tr>
            <td>статистика работы в сети выбранного клиента</td>
            <td>статистика работы в сети за указанный промежуток времени</td>
            <td>список клиентов с отрицательным балансом счета</td>
        </tr>
        <tr>
            <td>
                <form action="client_stat.php" method="POST">
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
                            $sql = "SELECT `id`, `name` FROM client";
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
                    <button>Submit</button>
                </form>
            </td>
            <td>
                <form action="client_time.php" method="post">
                    <label for="date_start">Начало</label>
                    <input type="date" name="date_start" id="date_start"> <br>
                    <label for="date_end">Конец</label>
                    <input type="date" name="date_end" id="date_end"> <br>
                    <button>Submit</button>
                </form>
            </td>
            <td>
                <form action="below_zero.php">
                    <button>Submit</button>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>
