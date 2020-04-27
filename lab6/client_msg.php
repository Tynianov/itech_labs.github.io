<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background: #282828;
            color: white;
        }

        input {
            margin: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>
    <ul id="messages">
        <?php
            require_once __DIR__ . "/vendor/autoload.php";
            $client = $_POST['client'];
            try {
                $collection = (new MongoDB\Client)->itech_var8->user;
                $cursor = $collection->aggregate(array(
                    array(
                        '$match' => array(
                            'ip' => "$client"
                        )
                    )
                ));
                foreach ($cursor as $doc) {
                    foreach ($doc['messages'] as $msg) {
                        if($msg)
                            echo "<li>$msg</li>";
                    }
                }
            } catch (PDOException $e) {
                echo $e;
            }
        ?>
    </ul>
        <script>
        $(document).ready(function() {
            localStorage.list = $('#messages').html();
        });
        </script>
</body>

</html>
