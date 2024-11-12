<?php
require_once('usuario.php');

include "conexao.php";

// $usuario = new usuario(); tneho que resolver isso
 
if(isset($_GET['incluir'])){
    $nome = $_GET['nome_usuario'];
    $email = $_GET['email_usuario'];
    $senha = $_GET['senha_usuario'];
    $confsenha = $_GET['conf_senha'];

    if($usuario->cadastrar($nome,$email,$senha,$confsenha)){
        echo "cadastro realizado com sucesso!";
    }else{
        echo "erro ao cadastrar";
    }
}
?>