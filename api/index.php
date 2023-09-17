<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = array();
    }

    if (isset($_POST['task_name']) && !empty($_POST['task_name'])) {
        $task_name = $_POST['task_name'];
        // Você pode adicionar validações adicionais aqui, se necessário.
        $_SESSION['tasks'][] = $task_name;
    }

    if (isset($_POST['clear'])) {
        $_SESSION['tasks'] = array(); // Remove todas as tarefas.
    }

    // Redirecione de volta para a página principal após o processamento do formulário
    header('Location: index.php'); // Substitua 'index.php' pelo nome correto da sua página principal
    exit; // Certifique-se de sair após o redirecionamento.
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas - PHP</title>
    <link rel="stylesheet/less" type="text/css" href="/css/style.less">
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="form">
            <form action="" method="post">
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
            <form action="" method="post">
                <!-- Defina action para o arquivo que processará o formulário -->
                <input type="hidden" name="clear" value="clear">
                <button class="btn-clear" type="submit">Limpar Tarefas</button>
            </form>
        </div>
        <div class="footer">
            <p>Desenvolvido por Gabriel</p>
        </div>
    </div>
</body>
</html>
