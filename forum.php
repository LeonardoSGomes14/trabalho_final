<?php

include('protect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="styleforum.css">

</head>
<body>

    <nav>
        <div class = "logo"><p><a href="forum.php"> FULL QUESTIONS FORUM </a></p></div>

        <div class="entrar"><img src="user.png" class="imgprofile"><a class="profile" href = "login.php">Login/Cadastro</a></div>

</nav>

<div>

<ul>
<li><a href="perguntas.php"> Perguntas </a></li>
    </ul>

</div>

<div class="bemvindo">
Bem vindo ao Fórum, <?php echo $_SESSION['nome']; ?>.
</div>

<section class = "container1">
    <div class ="section1">

   

<h3> Principais tópicos </h3>

<div> <a href="forum1.php"> 💭 COMPATIBILIDADE </a> </div>
<div> <a href="forum1.php"> 💭 PLACA DE VÍDEO E MONITORES </a> </div>
<div> <a href="forum1.php"> 💭 PLACAS-MÃE </a> </div>
<div> <a href="forum1.php"> 💭 PROCESSADORES </a> </div>
<div> <a href="forum1.php"> 💭 OVERCLOCK </a> </div>
</div>

<div class = "section2">
<h3>Fóruns mais famosos</h3>

<div>
    <a href="forum1.php">PLACAS-MÃE</a><br>
    <a href="forum1.php">PROCESSADORES</a><br>
    <a href="forum1.php">OVERCLOCK</a><br>
</div>
</div>

</section>


<p class="logout">
    <a href="logout.php">Sair da sessão</a>
</p>


<section class="footer">
<div class="copy"> Português (BR) </div>
<div class="copy"> Todos os dierietos reservados à ©2023FULLQUESTIONS </div>
<div class="copy"><a href="terms.php"> Termos e Regras </a></div>
<div class="copy"><a href="security.php"> Política de Privacidade </a></div>


</section>


</body>
</html>