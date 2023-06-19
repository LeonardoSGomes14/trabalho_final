
<?php 
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="stylecad.css">

</head>
<body>

    <nav>
 <div class = "logo"><p><a href="forum.php"> FULL QUESTIONS FORUM </a></p></div>

</nav>

<div>

<ul>
      <li><a href="perguntas.php"> Perguntas </a></li>
      <li><a href="forum.php"> Fórum </a></li>
    </ul>

</div>

<br><br><br><br>

        <?php 
        if (isset($_POST['submit'])){
            $nome = $_POST['nome'];
            $data = $_POST['data'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM cadastro WHERE email = ? AND senha = ?');
            $stmt->execute([$email, $senha]);
            $count = $stmt->fetchColumn();
            
            if ($count > 0){
                $error = 'Esse perfil já foi cadastrado.';}
            else{
                $stmt = $pdo->prepare('INSERT INTO cadastro (nome, data, email, senha)
                VALUES (:nome, :data, :email, :senha)');
                $stmt->execute(['nome' => $nome, 'data' => $data, 'email' => $email,
                'senha' => $senha]);

                if ($stmt->rowCount()){
                    echo '<span class="spanclass">Cadastro realizado com sucesso!</span>';
                }else{
                    echo '<span class="spanclass">Erro na realização de cadastro. Tente novamente mais tarde!</span>';
                }

            }header("Location: login.php");

            if (isset($error)) {
                echo '<span>' . $error . '</span>';
            }
        }
?>

<section class="container">

<div><h1>Cadastre-se</h1></div>

<form method="post">

<label for="nome">Nome completo:</label>
<input type="text" name="nome" required><br>

<label for = "data">Data de nascimento: </label>
        <input type = "date" name = "data" value = "<?php echo $data; ?>" required><br>

<label for="email">Email:</label>
<input type="email" name="email" required><br>

<label for="senha">Senha:</label>
<input type="password" name="senha" required><br>

    <div>
    <button class ="bttncadlog"type="submit" name="submit" value="cadastrar">Cadastrar-se</button>
    <button class="bttncadlog"><a href="listar.php">Listar</a></button>
</div>

<div class = "cadlog">
    <h5> Já tem uma conta? </h5><a href="login.php">Logar</a>
</div>
    </form>

</section>


<br><br><br><br><br><br><br><br>

<section class="footer">
<div class="copy"> Português (BR) </div>
<div class="copy"> Todos os dierietos reservados à ©2023FULLQUESTIONS </div>
<div class="copy"><a href="terms.php"> Termos e Regras </a></div>
<div class="copy"><a href="security.php"> Política de Privacidade </a></div>


</section>
    
</body>
</html>

