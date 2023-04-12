<?php
include("conect.php");
include("cabecalho.php");
$sql = "SELECT * FROM   tb_carta";
$result = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="tb_carta/estilo.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    img {
        width: 130px;
    }

    td{
        text-align: center;
    }
</style>

<body>
    <h2>Lista Cartas</h2><br>
    <table border="1">

        <tr>
            <th>Nome da Carta</th>
            <th>Descricao da Carta</th>
            <th>Tipo da Carta</th>
            <th>Efeito da Carta</th>
            <th>Nível da Carta</th>
            <th>Atake da Carta</th>
            <th>Defesa da Carta</th>
            <th>Atributo da Carta</th>
            <th>Imagem da Carta</th>
            <th>Limite da Carta</th>
            <?php
            if ($_SESSION['nivel'] == $nivel) {
            ?>
                <th>Excluir</th>
            <?php
            }
            ?>
        </tr>

        <?php
        while ($tbl = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?= $tbl[1] ?></td>
                <td><?= $tbl[2] ?></td>
                <td><?= $tbl[3] ?></td>
                <td><?= $tbl[4] ?></td>
                <td><?= $tbl[5] ?></td>
                <td><?= $tbl[6] ?></td>
                <td><?= $tbl[7] ?></td>
                <td><?= $tbl[8] ?></td>
                <td><img src="imagens/<?= $tbl[9] ?>"></td>
                <td><?= $tbl[10] ?></td>
                <?php
                if ($_SESSION['nivel'] == $nivel) {
                ?>
                    <td><a href="apagar_carta.php?id=<?= $tbl[0] ?>">&#128465;</a></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>