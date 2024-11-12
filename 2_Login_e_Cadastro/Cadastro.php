<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start(); // Inicia a sessão

    // Recebe os dados do formulário
    $Nome = $_POST['nome'];
    $Endereco = $_POST['endereco'];
    $Email = $_POST['email'];
    $Senha = $_POST['senha'];
    $conf_senha = $_POST['conf_senha_usuario'];

    include "conexao.php"; // Conexão com o banco

    if (isset($_POST['incluir'])) {
        // Verificação das senhas digitadas, se ambas são iguais
        if ($Senha !== $conf_senha) {
            echo "<script> alert('As senhas são diferentes!') </script>";
        } else {
            // Salva dados na sessão
            $_SESSION['nome'] = $Nome;
            $_SESSION['endereco'] = $Endereco;
            $_SESSION['email'] = $Email;
            $_SESSION['senha'] = $Senha;

            try {
                // Prepara e executa a inserção no banco
                $Comando = $conexao->prepare("INSERT INTO TB_CADASTRO_ADM (NOME_CLIENTE, END_CLIENTE, EMAIL_CLIENTE, SENHA_CLIENTE) VALUES (?, ?, ?, ?)");
                $Comando->bindParam(1, $Nome);
                $Comando->bindParam(2, $Endereco);
                $Comando->bindParam(3, $Email);
                $Comando->bindParam(4, $Senha);

                // Executa o comando e verifica sucesso
                if ($Comando->execute()) {
                    echo "<script> alert('Cadastro Realizado com Sucesso!')</script>";

                    // Limpeza de variáveis e controle de sessão
                    $_SESSION["controleAdm"] = "cadastrado";

                    echo "<a href='LoginAdm.php'>Clique aqui para logar</a>";
                } else {
                    echo "Erro ao tentar efetivar o cadastro.";
                }
            } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
            }
        }
    }
} else {
    header('Location: Cadastro.php'); // Redireciona caso o método não seja POST
}
?>