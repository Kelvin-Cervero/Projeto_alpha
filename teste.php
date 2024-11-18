<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redireciona para o login
    header("Location: Login.php");
    exit;
}

// Caso esteja logado, exibe a página interna
echo "Bem-vindo, " . $_SESSION['user_email'] . "!";
?>