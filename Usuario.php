<?php
class Usuario 
{
    public $msgErro = "";

    public function cadastrar($Nome, $Endereco, $Email, $Senha)
    {
        try {
            include "conexao.php";
            //verificar se já esta cadastrado
            $Comando=$conexao->prepare("SELECT id FROM TB_CLIENTE WHERE EMAIL_CLIENTE = ?");
            $Comando->bindParam("1", $Email);
            $Comando->execute();

            //veficar se já esta cadastrado, contando as linhas
            if($Comando->rowCount() > 0)
            {
                return false; //já esta cadastrado
            }
            else
            {
                //caso não, cadastrar   
                $Comando=$conexao->prepare("INSERT INTO TB_CLIENTE (NOME_CLIENTE,
                END_CLIENTE, EMAIL_CLIENTE, SENHA_CLIENTE) VALUES (?, ?, ?, ?)");
                $Comando->bindParam("1", $Nome);
                $Comando->bindParam("2", $Endereco);
                $Comando->bindParam("3", $Email);
                $Comando->bindParam("4", $Senha);
                $Comando->execute();
                return true;
            }
        }
        catch (Exception $erro) {
            $msgErro = $erro->getMessage();
        }
    }

    public function logar($Email, $Senha)
    {
        try {
            include "conexao.php";
            //verificar se o email e senha estão cadastrados, se sim
            $Comando=$conexao->prepare("SELECT ID_CLIENTE FROM TB_CLIENTE 
                                        WHERE EMAIL_CLIENTE = ? AND SENHA_CLIENTE = ?");
            $Comando->bindParam("1", $Email);
            $Comando->bindParam("2", $Senha);
            $Comando->execute();

            if($Comando->rowCount() > 0)
            {
                //Entrar no sistema (Sessão)
                $dado = $Comando->fetch(); //fetch pega o que vem do bd e transforma em vetor
                session_start();
                $_SESSION['user_id'] = $dado['ID_CLIENTE'];
                $_SESSION['user_email'] = $Email;

                return true; 
            }
            else
            {
                return false; //não conseguiu logar
            }
        }
        catch (Exception $erro) {
            $msgErro = $erro->getMessage();
        }
    }

    public function alterar () {

        // aqui vc segue o que tem anteriormente, porém modificado para aletar os dados
    }
}
?>