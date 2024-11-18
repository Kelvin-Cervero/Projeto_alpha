<?php
// Incluindo a classe Usuario
include 'Classes\Usuario.php';  // Incluindo o arquivo onde a classe está definida
$user = new Usuario;


// Verifica se o formulario foi enviado
if (isset($_POST['incluir'])) {

            $NomeCadastro = $_POST['nome_usuario'];
            $EnderecoCadastro = $_POST['endereco_usuario'];
            $EmailCadastro = $_POST['email_usuario'];
            $SenhaCadastro = trim($_POST['senha_usuario']);
            $senhaConfirma = trim($_POST['confi_senha']);


            // var_dump($Senha, $senhaConfirma);
            
    // Verifica se todos os dados foram preenchidos
    if (!empty($NomeCadastro) && !empty($EnderecoCadastro) && !empty($EmailCadastro)
        && !empty($SenhaCadastro) && !empty($senhaConfirma))  {

        include "conexao.php";
        if($user->msgErro == ""){

            // Verifica se senha e confirmar senha são identicos
            if ($SenhaCadastro == $senhaConfirma) {
                if ($user->cadastrar($NomeCadastro, $EnderecoCadastro, $EmailCadastro, $SenhaCadastro)) {
                    ?>
                    <div class="msg-sucesso">
                    Cadastrado com sucesso!
                    </div>
                    <?php
                    // header('location:Login.html');
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
        else {
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