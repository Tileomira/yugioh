<?php
include('conect.php');
include('cabecalho.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $id = $_POST['id'];
    // $nomedodeck = $_POST["nome"];
    $iddeck = $_POST["id-deck"];;
    $idcarta = $_POST["id-carta"];
    $idusuario = $_SESSION['id'];



    $sqlyugioh = "INSERT INTO tb_constrdeck(`i_id_deck`, `i_id_carta`, `i_id_usuarios`)values 
    ('$iddeck', '$idcarta',' $idusuario')";
    //echo  $sqlyugioh;
    mysqli_query($link, $sqlyugioh);
    header("Location: alterar_deck.php?id=$iddeck");
    exit();
}





$id = $_GET['id'];
$sql = "SELECT * FROM tb_deck WHERE i_id_deck = $id";
$result = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($result)) {
    $nomedodeck = $tbl[2];
    $iddodeck = $tbl[0];
}
//-----------------------------------------------------
// $sql3 = "SELECT`i_id_constrdeck` FROM `tb_constrdeck` WHERE i_id_deck = $iddodeck";
// $result3 = mysqli_query($link, $sql);
// while ($tbl = mysqli_fetch_array($result3)) {
//     $id_deck = $tbl[0];
// }
//-----------------------------------------------------
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="alterardeck/estilo.css" rel="stylesheet">
    <title></title>
</head>

<input type="hidden" name="id-deck" value="<?= $iddodeck ?>">

<body id="body1">
    <h2>Alterar Deck</h2>
    <div id="div1">
        <form action="alterar_nome_deck.php" method="POST">
            <input type="hidden" value="<?= $id ?>" name="id">
            <label>Nome</label>
            <input type="text" name="nome" value="<?= $nomedodeck ?>" maxlength="40" required><br><br>
            <input type="submit" value="Gravar">
        </form>
    </div>
    <br><br>



    <!-- CARTAS INSERIDAS NO DECK DAQUI PARA BAIXO -->

    <div id="div2">
        <label>Meu Deck</label><br><br>

        <?php
        $sqldeck = "SELECT `i_id_carta`, `i_id_constrdeck` FROM `tb_constrdeck` WHERE i_id_deck = $iddodeck";
        $result = mysqli_query($link, $sqldeck);

        // while($tbl2 = mysqli_fetch_array($result)){
        //     $id_card = $tbl2[0];
        //     $id_constr = $tbl2[1];
        // }
        // echo( "carta:" .$id_card ."deck: ". $id_constr);
        //

        while ($tbl = mysqli_fetch_array($result)) {
            $sql2 = "SELECT s_img_carta FROM tb_carta WHERE i_id_carta = $tbl[0]";
            $sql3 = "SELECT`i_id_constrdeck` FROM `tb_constrdeck` WHERE `i_id_constrdeck` = $tbl[1]";



            $result2 = mysqli_query($link, $sql2);
            while ($tbl2 = mysqli_fetch_array($result2)) {
                $card = $tbl2[0];
            }

            //-------------id da carta-----------------
            $result3 = mysqli_query($link, $sql3);
            while ($tbl3 = mysqli_fetch_array($result3)) {
                $constr = $tbl3[0];
            }
            //------------id da carta----------------
        ?>
            <form  id="frm"  action="excluirdeck.php" method="POST">
                <div class="product-card">
                    <input type="hidden" value="<?= $constr ?>" name="idcarta">
                    <input type="hidden" value="<?= $id ?>" name="id">
                    <img src="imagens/<?= $card ?>" alt="imagem">
                    <input type="submit" value="Excluir">
                </div>
            </form>

        <?php
        }
        ?>


    </div>
    <!-- CARTAS INSERIDAS NO DECK DAQUI PARA CIMA -->
    <br>


    <!-- CARTA DAQUI PARA BAIXO -->

    <?php
    $sqlcartas = "SELECT `s_img_carta`, `i_limite_carta`,`i_id_carta` FROM `tb_carta`";
    $result = mysqli_query($link, $sqlcartas);
    ?>



    <?php
    while ($tbl = mysqli_fetch_array($result)) {
    ?>
        <form action="alterar_deck.php" method="POST">

            <div class="product-card">
                <img src="imagens/<?= $tbl[0] ?>" alt="imagem">
                <!-- <h2>Nome do Produto</h2>
                <p class="descricao">Descrição do Produto</p>
                <p class="preco">$10.00</p> -->
                <!-- <button class="adicionar">Adicionar ao Deck</button> -->
                <input type="hidden" name="id-carta" value="<?= $tbl[2] ?>">
                <input type="hidden" name="id-deck" value="<?= $iddodeck ?>">
                <input type="submit" value="Gravar">
            </div>
        </form>

    <?php
    }
    ?>
    </form>

</body>

</html>