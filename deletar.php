<?php
include 'db.php';

if(!isset($_GET['id'])) {
    header('location: perguntas.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM perguntas WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt -> fetch(PDO::FETCH_ASSOC);

if(!$appointment) {
    header('location: perguntas.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM perguntas WHERE id = ?');
    $stmt ->execute ([$id]);
    header('location: perguntas.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar pergunta</title>
</head>
<body>
    <h1>Deletar pergunta</h1>
    <p>Tem certeza que deseja deletar a pergunta de <?php echo $appointment['qname']; ?>

<form method = "post">
    <button type = "submit"> Sim </button>
    <a href = "perguntas.php"> Não </a>

</form> 
</body>
</html>