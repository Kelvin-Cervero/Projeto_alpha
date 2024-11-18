<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

session_start(); // 



echo "Nome:" . $_SESSION['nome_usuario'];
echo "Endereço:" . $_SESSION['endereco_usuario'];
echo "Forma de pagamento:" . $_SESSION['forma_pgto'];
echo "Condição de pagamento:" . $_SESSION['cond_pagto'];
echo "Valor da parcela:" . $_SESSION['valor_parce'];
echo "Valor total:" . $_SESSION['valor_total'];


?>

session_destroy();



<a href="gerenciarrrr.php"><input type="button" value="Gerenciar"></a>

</body>
</html>


