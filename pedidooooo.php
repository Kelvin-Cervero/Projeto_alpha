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



echo "Nome:" . $_SESSION['nome_usuario'] . "<br>" . "<br>" ;
echo "Endereço:" . $_SESSION['endereco_usuario'] . "<br>" . "<br>"  ;
echo "Forma de pagamento:" . $_SESSION['forma_pgto'] . "<br>" . "<br>"  ;
echo "Condição de pagamento:" . $_SESSION['cond_pgto'] . "<br>" . "<br>"  ;
echo "Valor da parcela:" . $_SESSION['valor_parce'] . "<br>" . "<br>"  ;
echo "Valor total:" . $_SESSION['valor_total'] . "<br>" . "<br>"  ;


?>

<a href="gerenciarrrr.php"><input type="button" value="Gerenciar"></a>

</body>
</html>
