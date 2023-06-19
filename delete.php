<?php
include 'db.php';

if(!isset($_GET['id'])) {
    header('location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM cadastro WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt -> fetch(PDO::FETCH_ASSOC);

if(!$appointment) {
    header('location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM cadastro WHERE id = ?');
    $stmt ->execute ([$id]);
    header('location: listar.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar Dados</title>
</head>
<body>
    <h1>Deletar Dados</h1>
    <p>Tem certeza que deseja deletar os dados de <?php echo $appointment['nome']; ?>
        
<form method = "post">
    <button type = "submit"> Sim </a></button>
    <a href = "listar.php"> Não </a>

</form> 
</body>
</html>