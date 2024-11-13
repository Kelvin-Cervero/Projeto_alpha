<?php
// Inicia a sessão para usar variáveis de sessão
session_start();

// Incluindo a classe Usuario
require_once 'Usuario.php';

try {
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Email = $_POST["log_email_usuario"];
        $Senha = $_POST["log_senha_usuario"];

        // Instanciando o objeto Usuario
        $user = new Usuario("", "", $Email, $Senha);  // Apenas email e senha são passados

        // Tenta realizar o login
        if ($user->logar()) {
            // Se o login for bem-sucedido, redireciona para a página interna
            echo "Login bem-sucedido!";
            header("Location: alpha/3_Pagto_Pedido_e_GerPedido/teste.php");
            exit;
        } else {
            // Caso o login falhe, exibe uma mensagem de erro
            echo "Email ou senha incorretos!";
            echo "<a href=\"login_form.php\">Voltar</a>";
        }
    }
}
catch (Exception $erro) {
    echo "<script> alert('Erro: " . $erro->getMessage() . "');</script>";
}
?>