<?php
$host = 'localhost';
$dbname = 'forum';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;
    chasret=utf8",$username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo ' Error ao conectar ao banco de dados:'
    .$e -> getMessage();
    exit;
}

$mysqli = new mysqli($host, $username, $password, $dbname);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

?>

