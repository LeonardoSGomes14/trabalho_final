<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelog.css">
    <title>protect</title>
</head>
<body>
<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die('<span class="spanclass">Você não pode acessar esta página porque não está logado.<p><a href="login.php">Entrar</a></p></span>');
}

?>
</body>
</html>





