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
    $sql = "SELECT * FROM seanse WHERE client_id=$client_id";

    $dom = new DOMDocument();
    $dom->encoding = 'utf-8';
    $dom->xmlVersion = '1.0';
    $dom->formatOutput = true;

    $root = $dom->createElement('Clients');
    foreach ($dbh->query($sql) as $row) {
        $client_node = $dom->createElement('client');
        $client_node->setAttributeNode(new DOMAttr('id', $row['id']));
        $client_node->appendChild($dom->createElement('start', $row['start']));
        $client_node->appendChild($dom->createElement('end', $row['end']));
        $client_node->appendChild($dom->createElement('in_trafic', $row['in_trafic']));
        $client_node->appendChild($dom->createElement('out_trafic', $row['out_trafic']));
        $client_node->appendChild($dom->createElement('client_id', $row['client_id']));
        $root->appendChild($client_node);
    }
    $dom->appendChild($root);
    echo $dom->saveXML();
} catch (PDOException $e) {
    echo $e;
}
