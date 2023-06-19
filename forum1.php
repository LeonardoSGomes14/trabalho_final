
<?php 
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questions</title>
    <link rel="stylesheet" href="styleff.css">
</head>
<body>

    <nav>
 <div class = "logo"><p><a href="forum.php"> FULL QUESTIONS FORUM </a></p></div>
 <div class="entrar"><img src="user.png" class="imgprofile"><a class="profile" href = "login.php">Login/Cadastro</a></div>

</nav>

<div>

<ul>
<li><a href="perguntas.php"> Perguntas </a></li>
      <li><a href="forum.php"> Fórum </a></li>
    </ul>

</div>


<?php 
        if (isset($_POST['submit'])){
            $qname = $_POST['qname'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            
            
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM perguntas WHERE title = ? AND content = ?');
            $stmt->execute([$title, $content]);
            $count = $stmt->fetchColumn();
            
            if ($count > 0){
                $error = 'Isso já foi perguntado.';}
            else{
                $stmt = $pdo->prepare('INSERT INTO perguntas (qname, title, content)
                VALUES (:qname, :title, :content)');
                $stmt->execute(['qname' => $qname, 'title' => $title, 'content' => $content]);

                if ($stmt->rowCount()){
                    echo '<span class="spanclass">pergunta realizada com sucesso!</span>';
                }else{
                    echo '<span class="spanclass">Erro na realização de pergunta. Tente novamente mais tarde!</span>';
                }

            }header("Location: forum.php");

            if (isset($error)) {
                echo '<span>' . $error . '</span>';
            }
        }
?>

    <section class="container">

<div><h1>Faça sua pergunta.</h1></div>

<form method="post">

<label for="qname">Nome:</label>
<input type="text" name="qname" required><br>

<label for = "title">Título: </label>
        <input type = "text" name = "title"><br>

<label for="content">Conteúdo:</label>
<input type="text" name="content" required><br>

<div>
<button class ="bttncadlog"type="submit" name="submit" value="cadastrar">Registrar pergunta</button>
</div>

</form>
</section>



<section class="footer">
<div class="copy"> Português (BR) </div>
<div class="copy"> Todos os dierietos reservados à ©2023FULLQUESTIONS </div>
<div class="copy"><a href="terms.php"> Termos e Regras </a></div>
<div class="copy"><a href="security.php"> Política de Privacidade </a></div>
</section>



</body>
</html>