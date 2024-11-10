<?php
    session_start();

    // Verificando se o formulario foi enviado ou não. 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
/* $_SERVER['REQUEST_METHOD']: é uma forma que o PHP tem de saber qual 
    tipo de pedido foi feito pelo usuário ao acessar uma página */ 

    /* Recebendo os dados nome, endereço, email, senha
       digitados pelo user na pagina de login */
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include "conexao.php";

  if (isset($_POST['incluir'])) {

    try {
        
        if ($_POST["cad_senha_usuario"] == $_POST["cad_confirmar_senha_usuario"]) {
        /*  A variavel $Comando pega as variaveis $nome, $endereco, 
            $email, $senha, faz uma pesquisa na tablea TB_CLIENTE */
        $Comando->bindParam(1, $nome);
        $Comando->bindParam(2, $endereco);
        $Comando->bindParam(3, $email);
        $Comando->bindParam(4, $senha);
        # bindParam: vincula um parâmetro a uma variável em uma instrução SQL preparada
     }
    }
    catch (PDOException $erro) {
    echo"Erro" . $erro->getMessage();
    }
 }
}
else {
    header('location:Cadastro.php');
}
?>