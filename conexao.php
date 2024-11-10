<?php

$Bco ='Loja'; // Nome do banco de dados
$Usuario  ='root';
$Senha = '';

try 
{
    $conexao = new PDO("mysql:host=localhost; dbname=$Bco", "$Usuario", "$Senha");  
    /*
    PDO : É uma classe em PHP usada para acessar bancos de dados, onde o comando que
    está sendo executado estabelece a conexão com o banco de dados MySQL.
    */

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    /* 
    setAttribute(): Define atributos para o objeto de conexão.
    PDO::ATTR_ERRMODE: Atributo que determina como os erros serão tratados pelo PDO.
    PDO::ERRMODE_EXCEPTION: Configura o PDO para lançar exceções (PDOException) caso ocorra um erro, 
    o que facilita o tratamento de erros em PHP.
    */

    $conexao->exec("set names utf8");
    /* 
    exec("set names utf8"): Executa uma consulta SQL diretamente no banco de dados para definir a 
    codificação de caracteres. O comando SQL "set names utf8" configura a codificação de caracteres
    para UTF-8, que é uma codificação amplamente utilizada para garantir que todos os caracteres,
    incluindo acentos e caracteres especiais, sejam armazenados e manipulados corretamente no banco de dados. 
    */
}
catch (PDOException $erro)
{
    echo "Erro na conexão" . $erro->getMessage();
    /*
    Caso ocorra um erro no try, o código entra no bloco catch e o erro é tratado (Tratamento de erro)
    em seguida será exibido uma mensagem de erro.
    */
}
?>