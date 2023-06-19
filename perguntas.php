<?php include 'db.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perguntas</title>
    <link rel="stylesheet" href="listar.css">
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


<h1> Perguntas </h1>

<?php
$stmt = $pdo->query ('SELECT * FROM perguntas ORDER BY title, content');
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($perguntas) == 0) {
    echo '<p class="spanclss">Nenhuma pergunta cadastrada.</p>';
} else {
    echo '<table border="1">';
    echo '<thead class="spanclss"><tr>Perguntas</th><th>nome</th><th>título</th><th>conteúdo</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($perguntas as $quests) {
        echo '<tr class="spanclss">';
        echo '<td class="spanclss"> ' . $quests['qname'] . '</td>';
        echo '<td class="spanclss"> ' . $quests['title'] . '</td>';
        echo '<td class="spanclss"> ' . $quests['content'] . '</td>';
        echo '<td><a style="color:blue;" href="atualizarp.php?id=' .
        $quests['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:blue;" href="deletar.php?id=' .
        $quests['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>    


<section class="footer">
<div class="copy"> Português (BR) </div>
<div class="copy"> Todos os dierietos reservados à ©2023FULLQUESTIONS </div>
<div class="copy"><a href="terms.php"> Termos e Regras </a></div>
<div class="copy"><a href="security.php"> Política de Privacidade </a></div>
</section>


</body>
</html>