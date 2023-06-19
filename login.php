


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="stylelog.css">

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
include('db.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo '<span class="spanclass">Preencha seu e-mail </span>';
    } else if(strlen($_POST['senha']) == 0) {
        echo '<span class="spanclass">Preencha sua senha </span>';
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die('<span class="spanclass">Falha na execução do código SQL: </span>' . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $cadastro = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $cadastro['id'];
            $_SESSION['nome'] = $cadastro['nome'];

            header("Location: forum.php");

        } else {
            echo '<span class="spanclass">Falha ao logar! E-mail ou senha incorretos</span>';
        }

    }

}
?>

<section class="container">

<div><h1>LOGIN</h1></div>

<form  action="" method="post">

<label for="email">Email:</label>
<input type="email" name="email" required><br>

<label for="senha">Senha:</label>
<input type="password" name="senha" required><br>


    <div>

    <button class="bttncadlog" type="submit" name="submit" value="login">Logar</button>
    
</div>

<div class = "cadlogbtn">
    <h5> Ainda não tem conta? </h5><a href="cad.php">Cadastrar-se</a>
</div>

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

    
</body>
</html>