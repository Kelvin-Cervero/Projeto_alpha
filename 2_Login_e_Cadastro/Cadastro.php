<?php
// cadastro.php

// Incluindo a classe Usuario
require_once 'Usuario.php';  // Incluindo o arquivo onde a classe está definida

try{
    $Botao = $_POST["incluir"];
    $Nome = $_POST["nome_usuario"];
    $Endereco = $_POST["endereco_usuario"];
    $Email = $_POST["email_usuario"];
    $Senha = $_POST["senha_usuario"];
    $senhaConfirma = $_POST["confi_senha"];

    // Instanciando o objeto da classe Usuario
    $user = new Usuario($Nome, $Endereco, $Email, $Senha);

    if ($senhaConfirma == $Senha) {
        if ($user->cadastrar()) {
            echo "<script> alert('Cadastro realizado com sucesso!');</script>";
            header("Location: 2_Login_e_Cadastro/Login.php");
        } else {
            echo "<script> alert('Email já cadastrado!');</script>";
        }
    } else {
        echo "<script> alert('Senhas não conferem!');</script>";
    }
}
catch (Exception $erro) {
    echo "<script> alert('Erro: " . $erro->getMessage() . "');</script>";
}
?>