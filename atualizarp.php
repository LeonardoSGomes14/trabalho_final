<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('location: listar.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo-> prepare('SELECT * FROM perguntas WHERE id = ?');
$stmt ->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('location: listar.php');
    exit;
}

$qname = $appointment ['qname'];
$title = $appointment['title'];
$content = $appointment['content'];



?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Pergunta</title>
</head>
<body>
    <h1>Atualizar Pergunta</h1>
    <form method = "post">
        <label for = "qname">qname: </label>
        <input type = "text" name = "qname" value = "<?php echo $qname; ?>" required><br>
        
        <label for = "title">título: </label>
        <input type = "text" name = "title" value = "<?php echo $title; ?>" required><br>

        <label for = "content"> Conteúdo: </label>
        <input type = "text" name = "content" value = "<?php echo $content; ?>" required><br>


        <button type ="submit">Atualizar</button>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qname = $_POST['qname'];
    $title = $_POST['title'];
    $content = $_POST['content'];



//Validação dos dados dos formulários aqui.\\

$stmt = $pdo -> prepare('UPDATE perguntas SET qname = ?,title = ?, content = ? WHERE id = ?');
$stmt -> execute([$qname, $title, $content, $id]);
header('location: perguntas.php');
exit;
}
?>