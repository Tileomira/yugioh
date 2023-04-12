<?php
include('cabecalho.php');
include('conecet.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $id = $_POST['id'];
 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $email_old= $_POST['email_old'];
 $fone = $_POST['fone'];
 $senha = $_POST['pass'];
 $pass_old = $_POST['pass_old'];
    if($senha != $pass_old){
     $senha = md5($senha);
    }
 $nivel = $_POST['nivel'];
    if($email != $email_old){//o usuario está tentando alterar o email
        $sql = "SELECT COUNT(s_email_usuarios) FROM tb_usuarios WHERE
        s_email_usuarios = '$email'";
        $response = mysqli_query($link,$sql);
           while($tbl = mysqli_fetch_array($response)){
             $cont = $tbl[0];
            }
            if($cont != 0){
             ?>
                <script>
                 alert("Email já cadastrado!")
                  window.location.href ='alterar_usuario.php?id=<?=$id?>'   
                </script>
             <?php
             exit();
            }
    }
 $sql = "UPDATE tb_usuarios SET 
 s_nome_usuarios = '$nome',
 s_email_usuarios ='$email',
 s_telefone_usuarios ='$fone',
 s_senha_usuarios ='$senha',
 i_nivel_usuarios ='$nivel'
 WHERE  i_id_usuarios = $id";
 mysqli_query($link,$sql);
 header("Location: lista_usuarios.php");
 exit();
}



$id=$_GET['id'];
$sql = "SELECT * FROM tb_usuarios WHERE i_id_usuarios = $id";
$result = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($result)){
 $nome = $tbl[1];
 $email = $tbl[2];
 $fone = $tbl[3];
 $senha = $tbl[4];
 $nivel = $tbl[7];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cadstro/estilo.css" rel="stylesheet" >
    <title>Alterar Usuario</title>
</head>
<body>
    <div>
        <form action="alterar_usuario.php" method="POST">
          <input type="hidden" value="<?=$id?>" name="id">    


          <label>Nome</label>
          <input type="text" name="nome" value="<?=$nome?>" maxlength="50" required><br><br>
        
          <label>Email</label>
          <input type="email" name="email" value="<?=$email?>" maxlength="50" required>
          <input type="hidden" name="email_old" value="<?=$email?>"><br><br>

          <label>Telefone</label>
          <input type="text" name="fone" value="<?=$fone?>" maxlength="20" required><br><br>

          <label>Senha</label>
          <input type="password" name="pass" value="<?=$senha?>" maxlength="32" required>
          <input type="hidden" name="pass_old" value="<?=$senha?>">
          <br><br>
          <label>Tipo Usuario</label>
            <select name="nivel">
             <option value="1"<?=$nivel=='1'?"selected":""?>>Usuario</option>
             <option value="10"<?=$nivel=='10'?"selected":""?>>Adiministrador</option>
            </select>
            <input type="submit" value="Gravar">
        </form>
    </div>
</body>
</html> 