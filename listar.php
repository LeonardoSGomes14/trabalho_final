<?php include 'db.php';?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="estilo.css">
    <title>Dados Cadastrados</title>
    <link rel="stylesheet" href="listar.css">
</head>

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

<body class="listar">
    <h1>Dados Cadastrados</h1>

    <?php
    $stmt = $pdo->query ('SELECT * FROM cadastro ORDER BY data');
    $cadastro = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($cadastro) == 0) {
        echo '<p class="spanclss">Não há dados cadastrados.</p>';
    } else {
        echo '<table border="1">';
        echo '<thead class="spanclss"><tr>Nome</th><th>data</th><th>email</th><th>senha</th><th colspan="2">Opções</th></tr></thead>';
        echo '<tbody>';

        foreach ($cadastro as $cadastros) {
            echo '<tr class="spanclss">';
            echo '<td class="spanclss">' . $cadastros['nome'] . '</td>';
            echo '<td class="spanclss">' . date('d/m/y',strtotime($cadastros['data'])) . '</td>';
            echo '<td class="spanclss">' . $cadastros['email'] . '</td>';
            echo '<td class="spanclss">' . $cadastros['senha'] . '</td>';
            echo '<td class="spanclss"><a style="color:green;" href="atualizar.php?id=' .
            $cadastros['id'] . '">Atualizar</a></td>';
            echo '<td><a style="color:green;" href="delete.php?id=' .
            $cadastros['id'] . '">Deletar</a></td>';
            
    
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