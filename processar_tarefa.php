<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = array();
    }

    if (isset($_POST['task_name']) && !empty($_POST['task_name'])) {
        $task_name = $_POST['task_name'];
        // Adicione validação adicional aqui, se necessário.
        $_SESSION['tasks'][] = $task_name;
    }

    if (isset($_POST['clear'])) {
        $_SESSION['tasks'] = array(); // Remove todas as tarefas.
    }

}

// Redirecionar de volta para a página principal após o processamento do formulário
header('Location: index.php'); // Substitua 'index.php' pelo nome correto da sua página principal
exit; // Certifique-se de sair após o redirecionamento.
?>
