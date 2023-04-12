<?php

session_start();
if (isset($_SESSION['id'])) {
  session_destroy();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include('conect.php');
  $user = $_POST['email'];
  $pass = $_POST['pass'];

  //---------------------// Verefica se o user existe-------
  $sql = "SELECT COUNT(i_id_usuarios) FROM tb_usuarios WHERE
  s_email_usuarios = '$user'";
  $result = mysqli_query($link, $sql);
  while ($tbl = mysqli_fetch_array($result)) {
    $cont = $tbl[0];
  }
  if ($cont == 0) {
    header("Location: login.php?msg=Usuario ou senha incorreta");
    exit();
  }
  //------SE o user existir pega o tempero dele no banco-------

  $sql = "SELECT s_tempero_usuarios FROM tb_usuarios WHERE s_email_usuarios = '$user'";
  $result = mysqli_query($link, $sql);
  while ($tbl = mysqli_fetch_array($result)) {
    $tempero = $tbl[0];
  }




  $pass = md5($pass . $tempero);
  $sql = "SELECT COUNT(i_id_usuarios) FROM tb_usuarios WHERE
    s_email_usuarios = '$user' AND s_senha_usuarios = '$pass'";

  $result = mysqli_query($link, $sql);
  while ($tbl = mysqli_fetch_array($result)) {
    $cont = $tbl[0];
  }

  if ($cont == 0) {
    header("Location: login.php?msg=Usuario ou senha incorreta");
    exit();
  } else {
    $sql = "SELECT * FROM tb_usuarios WHERE s_email_usuarios = '$user'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
      $_SESSION['id'] = $tbl[0];
      $_SESSION['nome'] = $tbl[1];
      $_SESSION['nivel'] = $tbl[7];
      header("Location: index.php");
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="login/estilo.css" rel="stylesheet">
  <title></title>
</head>

<body>
  <h2>ENTRAR</h2>
  <div>
    <form action="login.php" method="POST">
      <label>Email</label>
      <input type="email" name="email" maxlength="50" required><br><br>

      <label>Senha</label>
      <input type="password" name="pass" maxlength="32" required><br><br>

      <button>Login</button><br><br>
    </form>

    <p id="msg">
      <?php
      if (isset($_GET['msg'])) {
        echo ($_GET['msg']);
        if ($_GET['msg'] == "Usuario ou senha incorreta") {
          echo ("<br><br><a href='recupera_senha.php'>Esqueci minha senha</a>");
        }
      }
      ?>
    </p>
  </div>
  <a href="cadastro.php"><button>cadastro</button></a>
</body>

</html>