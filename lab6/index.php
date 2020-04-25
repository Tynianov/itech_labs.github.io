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
                    <select id="client" name="client">
                        <?php
                        require_once __DIR__ . "/vendor/autoload.php";

                        try {
                            foreach ((new MongoDB\Client)->itech_var8->user->find() as $row) {
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
                    <textarea cols="40" rows="10">
                    <?php
                        require_once __DIR__ . "/vendor/autoload.php";

                        try {
                            $collection = (new MongoDB\Client)->itech_var8->sessions;
                            $cursor = $collection->aggregate(array(
                                array(
                                    '$group' => array(
                                        '_id' => NULL,
                                        'total' => array(
                                            '$sum' => '$in_traffic'
                                        )
                                    )
                                )
                            ));
                            foreach ($cursor as $doc) {
                                echo $doc['total'] . "\n";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </textarea>
            </td>
            <td>
                <textarea cols="40" rows="10">
                    <?php
                        require_once __DIR__ . "/vendor/autoload.php";
                        try {
                            $collection = (new MongoDB\Client)->itech_var8->user;
                            $cursor = $collection->aggregate(array(
                                array(
                                    '$match' => array(
                                        'balance' => array(
                                            '$gt' => 0
                                        )
                                    )
                                )
                            ));
                            foreach ($cursor as $doc) {
                                echo $doc['login'] . "\n";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </textarea>
            </td>
        </tr>
    </table>
</body>

</html>
