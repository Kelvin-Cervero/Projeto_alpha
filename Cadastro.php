<?php
// Incluindo a classe Usuario
include 'Usuario.php';  // Incluindo o arquivo onde a classe está definida
$user = new Usuario;


// Verifica se o formulario foi enviado
if (isset($_POST['incluir'])) {

            $Nome = $_POST['nome_usuario'];
            $Endereco = $_POST['endereco_usuario'];
            $Email = $_POST['email_usuario'];
            $Senha = trim($_POST['senha_usuario']);
            $senhaConfirma = trim($_POST['confi_senha']);


            // var_dump($Senha, $senhaConfirma);
            
    // Verifica se todos os dados foram preenchidos
    if (!empty($Nome) && !empty($Endereco) && !empty($Email)
        && !empty($Senha) && !empty($senhaConfirma))  {

        try{

            include "conexao.php";

            if ($Senha == $senhaConfirma) {
                if ($user->cadastrar($Nome, $Endereco, $Email, $Senha)) {
                    ?>
                    <div class="msg-sucesso">
                    Cadastrado com sucesso! Acesse para entrar!
                    </div>
                    <?php
                    header('location:Login.html');
                } 
                else {
                    ?>
                    <div class="msg-erro">
                    Email já cadastrado!
                    </div>
                    <?php
                }
            } 
            else {
                ?>
                <div class="msg-erro">
                Senha e confirmar senha não correspondem
                </div>
                <?php
            }
        }
        catch (Exception $erro) {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$user->msgErro;?>
            </div>
            <?php
        }
    }
    else { // se todos os campos não forem preenchidos
        ?>
        <div class="msg-erro">
        Preencha todos os campos!
        </div>
        <?php
    }
}
else{ // se o formulario não for enviado
    header('location:Cadastro.html');
}
?>