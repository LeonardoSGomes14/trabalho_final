<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('location: listar.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo-> prepare('SELECT * FROM cadastro WHERE id = ?');
$stmt ->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('location: listar.php');
    exit;
}

$nome = $appointment ['nome'];
$data = $appointment['data'];
$email = $appointment['email'];
$senha = $appointment['senha'];


?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Dados</title>
</head>
<body>
    <h1>Atualizar Dados</h1>
    <form method = "post">
        <label for = "nome">Nome: </label>
        <input type = "text" name = "nome" value = "<?php echo $nome; ?>" required><br>
        
        <label for = "data">Data: </label>
        <input type = "date" name = "data" value = "<?php echo $data; ?>" required><br>

        <label for = "email"> E-mail: </label>
        <input type = "email" name = "email" value = "<?php echo $email; ?>" required><br>

        <label for = "senha">: </label>
        <input type = "password" name = "senha" value = "<?php echo $senha; ?>"><br>

        <button type ="submit">Atualizar</button>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];



//Validação dos dados dos formulários aqui.\\

$stmt = $pdo -> prepare('UPDATE cadastro SET nome = ?,data = ?, email = ?, senha = ? WHERE id = ?');
$stmt -> execute([$nome, $data, $email, $senha, $id]);
header('location: listar.php');
exit;
}
?>