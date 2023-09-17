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
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<style>
    @font-face {
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/ubuntu/v20/4iCv6KVjbNBYlgoC1CzTtw.ttf) format('truetype');
}
@font-face {
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/ubuntu/v20/4iCs6KVjbNBYlgo6eA.ttf) format('truetype');
}
@font-face {
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/ubuntu/v20/4iCv6KVjbNBYlgoCjC3Ttw.ttf) format('truetype');
}
@font-face {
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/ubuntu/v20/4iCv6KVjbNBYlgoCxCvTtw.ttf) format('truetype');
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
}
body {
  background: #F3F3F5;
  color: #333;
  font-family: 'Ubuntu', sans-serif;
}
.container {
  background: #fff;
  max-width: 450px;
  margin-top: 5%;
  margin-left: auto;
  margin-right: auto;
  padding: 12px;
  box-shadow: 0px 0.25rem 1rem rgba(0, 0, 0, 0.25);
}
.container .header {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 4px;
  margin-bottom: 4px;
}
.container .form {
  margin-top: 4px;
  margin-bottom: 4px;
}
.container .form form {
  display: flex;
  justify-content: center;
  flex-direction: column;
}
.container .form form label {
  font-weight: bold;
  margin-top: 4px;
  margin-bottom: 4px;
}
.container .form form input {
  height: 32px;
  margin-top: 4px;
  margin-bottom: 4px;
  padding-left: 12px;
  border: 1px solid #999;
  border-radius: 4px;
}
.container .form form input:focus {
  background: #f0f0f5;
}
.container .form form button {
  background: #AB47BC;
  height: 32px;
  border: none;
  border-radius: 4px;
  color: #FFF;
  margin-top: 4px;
  margin-bottom: 4px;
  transition: background 0.3s;
}
.container .form form button:hover {
  background: #CE93D8;
}
.container .separator {
  background: #bbb;
  height: 2px;
  border-radius: 1px;
}
.container .list-tasks {
  margin-top: 12px;
  margin-bottom: 12px;
}
.container .list-tasks ul {
  list-style: none;
}
.container .list-tasks ul li {
  background: #4DB6AC;
  height: 54px;
  border: none;
  border-radius: 4px;
  color: #fff;
  margin-top: 4px;
  margin-bottom: 4px;
  display: flex;
  justify-content: left;
  align-items: center;
  transition: background 0.3s;
}
.container .list-tasks ul li:hover {
  background: #80CBC4;
}
.container .list-tasks .btn-clear {
  background: #EF5350;
  border-radius: 4px;
  padding: 0 12px;
  height: 32px;
  color: #fff;
  border: none;
  transition: background 0.3s;
}
.container .list-tasks .btn-clear:hover {
  background: #EF9A9A;
}
.container .footer {
  background: #f0f0f5;
  border-radius: 4px;
  padding: 12px;
}
.container .footer p {
  color: #999;
  font-size: 12px;
}

</style>

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
