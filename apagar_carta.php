<?php
?>
<?php
include('conect.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id_carta'];
    $sql = "DELETE FROM tb_carta WHERE i_id_carta = $id";
    mysqli_query($link,$sql);
    header("Location:lista_carta.php");
    exit();
}



if(!isset($_GET['id'])){
    header("location:lista_carta.php");
    exit();
}
$id = $_GET['id'];
$sql = "SELECT s_nome_carta FROM tb_carta WHERE i_id_carta = $id";
$response = mysqli_query($link,$sql);
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
    <link href="apagarcarta/estilo.css" rel="stylesheet">
    <title>Apagar Produtos</title>
</head>
<body>
    <div id="div1">
        <h2>Apagar Produto</h2>
        <p>Gostaria de Apagar esta Carta? <?=$nome?></p>
        <div>
            <form action="apagar_carta.php" method="POST">
                <input type="hidden" name="id_carta" value="<?=$id?>">
                <input type="submit" value="SIM">
            </form>
            <a href="lista_carta.php"><button>NÂO</button></a>
        </div>
    </div>
</body>
</html>