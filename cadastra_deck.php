<?php
include("cabecalho.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id'];
    $nomedeck = $_POST["nm_deck"];


    include("conect.php");

    $sql = "INSERT INTO tb_deck (s_nm_deck, i_id_usuario) VALUES    
    ('$nomedeck','$id')";
    echo ($sql);
    mysqli_query($link, $sql);
    header("location: lista_deck.php");
    exit();
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomedodeck = $_POST["nome"];
    $iddeck = $_POST["id"];
    $id = $_POST["id"];

    include("conect.php");

    $sql = "INSERT INTO tb_deck(s_nm_deck, i_num_deck, i_id_carta) VALUES ('$nomedodeck','$id','$')";
    mysqli_query($link, $sql);

    header("Location: lista_deck.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cadastrocarta/esitlo.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h2>De um nome para o deck</h2><br>
    <div>
        <form action="cadastra_deck.php" method="POST">
            <label>Nome do Deck :</label>
            <input type="text" name="nm_deck" id="nm_deck" maxlength="40" required><br><br>

            <label>Enviar</label>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>