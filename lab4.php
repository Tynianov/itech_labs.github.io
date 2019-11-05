<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ответ</title>
</head>
<body>
    <a href="lab4.html">Назад</a>
    <br><br>
    <?php
    $rows = $_POST['rows'] + 0;
    $columns = $_POST['columns'] + 0;
    $result = "<table border='1'>";
    if ($rows <= 0 || $columns <= 0) {
        echo 'Количество колонок или столбцов не должно быть равным или меньше 0!';
    }
    else {
        for ($i = 0; $i < $rows; $i++) {
            $result .= "<tr>";
            for ($j = 0; $j < $columns; $j++) {
                if(!$i) {
                    $result .= "<th> $j </th>";
                }
                else {
                    $rand_num_1 = rand(10, 20);
                    $rand_num_2 = rand(20, 30);
                    $result .= "<td> {$rand_num_1} - {$rand_num_2} </td>";
                }
            }
            $result .=  '</tr>';
        }
        $result .= '</table>';
        echo $result;
    }
    ?>
</body>
</html>