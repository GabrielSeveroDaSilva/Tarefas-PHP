<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas - PHP</title>
    <link rel="stylesheet/less" type="text/css" href="/css/style.less" />
    <link rel="preconnect" href="https://fonts.gstatic.com">

</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="form">
            <form action="processar_tarefa.php" method="post">
                <!-- Defina action para o arquivo que processará o formulário -->
                <label for="task_name">Tarefa:</label>
                <input type="text" name="task_name" placeholder="Nome da Tarefa">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="separator"></div>
        <div class="list-tasks">
            <?php
            if (isset($_SESSION['tasks'])) {
                echo "<ul>";

                foreach ($_SESSION['tasks'] as $key => $task) {
                    // Escape de HTML para segurança
                    echo "<li>" . htmlspecialchars($task) . "</li>";
                }

                echo "</ul>";
            }
            ?>
            <form action="processar_tarefa.php" method="post">
                <!-- Defina action para o arquivo que processará o formulário -->
                <input type="hidden" name="clear" value="clear">
                <button class="btn-clear" type="submit">Limpar Tarefas</button>
            </form>
        </div>
        <div class="footer">
            <p>Desenvolvido por Gabriel</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/less"></script>


</body>

</html>