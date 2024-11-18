<?php
// Incluindo a classe Usuario
include 'Usuario.php';
$user = new Usuario;

$emailLogin = $_POST['log_email_usuario'];
$senhaLogin = $_POST['log_senha_usuario'];

// Verifica se o formulario foi enviado
if (isset($_POST['Login'])) {
    //verificar se esta preenchido (Validação form)
    if(!empty($emailLogin) && !empty($senhaLogin)) {

        include 'conexao.php';
        if($user->msgErro == "")//se não teve erro, OK
        {
            if ($user->logar($emailLogin, $senhaLogin))
            {
                header("location: teste.php");
            }
            else { 
                ?>
                <div class="msg-erro">
                Email e/ou senha estão incorretos!
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
            <?php echo "Erro: ".$user->msgErro; ?>
            </div>
            <?php
        }
    }
    else {
        ?>
        <div class="msg-erro">
        Preencha todos os campos!
        </div>
        <?php
    }
}
else {
    header('location:Login.html');
}
?>