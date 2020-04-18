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
            <td>сообщения от выбранного клиента</td>
            <td>общий входящий и исходящий трафик</td>
            <td>список клиентов с отрицательным балансом счета.</td>
        </tr>
        <tr>
            <td>
                <form action="client_msg.php" method="POST">
                    <select id="client_id" name="client_id">
                        <?php
                        require_once __DIR__ . "/vendor/autoload.php";

                        phpinfo();
                        $m = new MongoDB\Client();
                        try {
                            foreach ($m->itech_var8->user->find() as $row) {
                                $ip = $row['ip'];
                                $name = $row['login'];
                                print "<option value='$ip'>$name</option>";
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
                <form action="io_traffic.php" method="post">
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
