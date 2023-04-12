<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cel = $_POST["cell"];
    $tempero = md5(rand() . date('H:i:s'));
    $senha = md5($_POST["pass"] . $tempero);

    include("conect.php");

    $sql = "SELECT COUNT(s_email_usuarios) FROM tb_usuarios WHERE s_email_usuarios = '$email'";

    $response = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($response)) {
        $cont = $tbl[0];
    }
    if ($cont != 0) {
?>
        <script>
            alert("Email já cadastrado!")
            window.location.href = 'cadastro.php'
        </script>
<?php
        exit();
    }

    $sql = "INSERT INTO tb_usuarios (s_nome_usuarios, s_email_usuarios, 
      s_celular_usuarios, s_senha_usuarios, s_tempero_usuarios) VALUES 
      ('$nome','$email','$cel','$senha','$tempero')";

    mysqli_query($link, $sql);
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Sua Conta</title>
</head>

<style>
    body {
        text-align: center;
        background-color: gray;
    }

    h3 {
        text-align: center;
        color: #333;
        margin-top: 50px;
        color: #ffffff;
    }

    div {
        background: linear-gradient(to bottom, gray 0%, black 30%, gray 70%, black 100%);
        color: white;
        padding: 15px;
        display: inline-block;
        border: white 4px solid;
        border-radius: 50px;
    }
</style>

<body>
    <h3>Cadastra-se para acessar esse site</h3>
    <div>

        <br><br>
        <form action="cadastro.php" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" maxlength="50">
            <br><br>
            <label>Celular:</label>
            <input type="text" name="cell" maxlength="20">
            <br><br>
            <label>Email:</label>
            <input type="email" name="email" maxlength="50">
            <br><br>
            <label>Senha:</label>
            <input type="password" name="pass" maxlength="32">
            <br><br>
            <input type="submit" value="Criar">
    </div>
</body>

</html>