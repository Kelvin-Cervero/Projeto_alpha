<?php
class Usuario 
{
    //Cria uma classe Publica, onde todos os arquivis do projeto tema cesso
    public $Nome; 
    public $Endereco; 
    public $Email;
    public $Senha;
        
    public function __construct($Nome, $Endereco, $Email, $Senha)
    {
        //Método construtor é respnsavel pelo vinculo dos campos aos objetos criados
        $this->Nome = $Nome; 
        $this->Endereco = $Endereco;
        $this->Email = $Email;
        $this->Senha = $Senha; 
    }

    public function cadastrar()
    {
        include "conexao.php";
        //verificar se já esta cadastrado
        $Comando=$conexao->prepare("SELECT id FROM TB_CLIENTE WHERE EMAIL_CLIENTE = ?");
        $Comando->bindParam("1", $this-> $Email);
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
                $Comando->bindParam("1", $this-> $Nome);
                $Comando->bindParam("2", $this-> $Endereco);
                $Comando->bindParam("3", $this-> $Email);
                $Comando->bindParam("4", $this-> $Senha);
                $Comando->execute();
                return true;
            }
    }

    public function logar()
    {
        include "conexao.php";
        //verificar se o email e senha estão cadastrados, se sim
        $Comando=$conexao->prepare("SELECT ID_CLIENTE FROM TB_CLIENTE WHERE EMAIL_CLIENTE = ? AND SENHA_CLIENTE = ?");
            $Comando->bindParam("1", $this-> $Email);
            $Comando->bindParam("2", $this-> $Senha);
            $Comando->execute();

            if($Comando->rowCount() > 0)
            {
                //Entrar no sistema (Sessão)
                $dado = $Comando->fetch(); //fetch pega o que vem do bd e transforma em vetor
                session_start();
                $_SESSION['user_id'] = $dado['ID_CLIENTE'];
                $_SESSION['user_email'] = $this->Email;

                return true; 
            }
            else
            {
                return false; //não conseguiu logar
            }
    }

    public function alterar () {

        // aqui vc segue o que tem anteriormente, porém modificado para aletar os dados
    }
}
?>