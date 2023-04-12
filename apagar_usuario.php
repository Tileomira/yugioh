<?php
include('conect.php');

if($_SERVER["REQUEST_METHOD"]== "POST"){
 $id = $_POST['id_usuario'];
 $sql = "DELETE FROM tb_usuarios WHERE i_id_usuarios = $id";
 mysqli_query($link,$sql);   
 header("Location:lista_usuarios.php");
 exit();
} 

if(!isset($_GET['id'])){
 header("Location:lista_usuarios.php");
 exit();
}
$id = $_GET['id'];
$sql = "SELECT s_nome_usuarios FROM tb_usuarios WHERE i_id_usuarios = $id";
$response = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($response)){
 $nome = $tbl[0];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="apagarusuario/estilo.css" rel="stylesheet">
 <title>Document</title>
</head>
<body>
    <div id="div1" >
     <h2>Apagar Usúario</h2>
     <p id="p1">Deseja excluir este usúario <b> <?=$nome?></b>?</p>
        <form action="apagar_usuario.php" method="post">
         <input type="hidden" name="id_usuario" value="<?=$id?>">
         <input type="submit" value="Sim">
        </form>
        <a href="lista_usuarios.php"><button>Não</button></a>
    </div>
</body>
</html>
