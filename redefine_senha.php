<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conect.php');
    $email = $_POST['email'];
    $cod = $_POST['cod'];
    $pass = $_POST['pass'];

    //Se o código estiver vazio regarrega a página
    if ($cod == "") {
        Header("Location:redefine_senha.php?msgCódigo Inválido!");
        exit();
    }

    $sql = "SELECT COUNT(i_id_usuarios) FROM tb_usuarios WHERE s_email_usuarios = '$email' AND s_recupera_usuarios = '$cod'";
    //echo $sql;
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        $cont = $tbl[0];
    }
    //Se o contador der 0, o cod ou o email errado. vamos apagar o cod do banco 
    if ($cont == 0) {
        $sql = "UPDATE tb_usuarios SET s_recupera_usuarios = '' WHERE s_email_usuarios = 
    '$email'";
        mysqli_query($link, $sql);
        header("Location:redefine_senha.php?msg=Código Inválido! Solicite um novo código.");
        exit();
    }
    //encontrado um email com o cod correspondente 
    $sql = "SELECT s_tempero_usuarios FROM tb_usuarios WHERE s_email_usuarios = 
    '$email'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        $tempero = $tbl[0];
    }
    $nova_senha = md5($pass . $tempero);
    $sql = "UPDATE tb_usuarios SET s_senha_usuarios = '$nova_senha', 
    s_recupera_usuarios = '' WHERE s_email_usuarios = '$email'";
    mysqli_query($link, $sql);
    Header("Location:login.php?msgSenha alterada com sucesso!!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="redefinesenha/estilo.css" rel="stylesheet">
    <title>Redefine Senha</title>

</head>

<body>

    <h2>Redefinir Senha</h2>
    <div id="div1">
        <form action="redefine_senha.php" method="post">
            <label>Email:</label>
            <input type="email" name="email" maxlength="50" required>
            <br><br>
            <label>Código:</label>
            <input type="text" name="cod" maxlength="10" required>
            <br><br>
            <label>Senha:</label>
            <input type="password" name="pass" maxlength="32" required>
            <br><br>
            <button>Confirmar</button>
        </form>
    </div>
</body>

</html>