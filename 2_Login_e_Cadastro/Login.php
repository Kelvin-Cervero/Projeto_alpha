<?php
if(isset($_POST['Login'])) {

 // inicinado uma sessão
    session_start();

    /* Recebendo os dados de email e senha
       digitados pelo user na pagina de login */ 
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include "conexao.php";

    /*  A variavel $Comando pega as variaveis $login e $senha, 
        faz uma pesquisa na tablea TB_CLIENTE */
    $Comando->bindParam(1, $email);
    $Comando->bindParam(2, $senha);
    # bindParam: vincula um parâmetro a uma variável em uma instrução SQL preparada

    // Executa a consulta no Banco de Dados;
    $Comando->execute();

    /* Logo abaixo existe um bloco com if e else, verificando se a variável 
       $Comando foi bem sucessida, ou seja se ela encontrar algum registro 
       idêntico o seu valor será igual a 1, se não tiver registros seu valor 
       será igual a 0. Dependendo do resultado ele redicionará para a página 
       pagamento.php ou retornara para a página do formulário inicial para 
       que se possa tentar novamente realizar o login. */

    if ($Comando->rowCount() > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;

        header('location:pagamento.php'); # coloque a localização correta
        exit();
    }
    else {
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);

        echo "<script> alert('Email e/ou Senha incorretos!') </script>";
        header('location:Login.php');
        exit();
    }

    /*
        header: função que envia um cabeçalho HTTP para o navegador
        unset: usada para destruir variáveis, elementos de arrays ou objetos (limpar dados)
        exit: usada para finalizar imediatamente a execução de um script
    */
}
else {
    echo "<script> alert('erro') </script>";
    header('location:Login.php');
}
?>