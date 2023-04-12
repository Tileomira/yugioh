<?php
include("cabecalho.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["cel"];
    $tempero = md5(rand() . date('H:i:s'));
    $senha = md5($_POST["pass"] . $tempero);
    $nivel = $_POST["nivel"];

    include("conect.php");

    $sql = "INSERT INTO tb_usuarios (s_nome_usuarios,s_email_usuarios,
     s_celular_usuarios, s_senha_usuarios, i_nivel_usuarios, s_tempero_usuarios) VALUES    
     ('$nome', '$email',' $celular','$senha', $nivel , '$tempero')";
    mysqli_query($link, $sql);

    echo ($sql);

    header("location: lista_usuarios.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cadastrousuario/estilo.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <h2>CADASTRE UM NOVO USUÁRIO</h2>
    <div>
        <form action="cadastro_usuarios.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" maxlength="50" ><br><br>

            <label>Email:</label>
            <input type="email" name="email" maxlength="50" ><br><br>

            <label>Celular:</label>
            <input type="text" name="cel" maxlength="20" ><br><br>

            <label>Senha:</label>
            <input type="password" name="pass" maxlength="32" ><br><br>

            <label>Tipo Usuario</label>
            <select name="nivel">
                <option value="1">Usuario</option>
                <option value="10">Administrador</option>
                <input type="submit" value="Salvar">
            </select>
        </form>
    </div>
</body>

</html>