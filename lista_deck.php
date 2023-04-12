<?php
include("conect.php");
include("cabecalho.php");
$sql = "SELECT * FROM   tb_deck";
$result = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="tb_carta/estilo.css" rel="stylesheet">
  <title></title>
</head>

<body>
  <h2>Lista Usuários</h2><br>
  <div>
    <table border="1">

      <tr>
        <th>Nome do Deck</th>
        <?php
        if ($_SESSION['nivel'] == $nivel) {
        ?>
          <th>Alterar</th>

        <?php
        }
        ?>
      </tr>

      <?php
      while ($tbl = mysqli_fetch_array($result)) {
      ?>

        <tr>
          <td><?= $tbl[2] ?></td>
          <?php
          if ($_SESSION['nivel'] == $nivel) {
          ?>
            <td><a href="alterar_deck.php?id=<?= $tbl[0] ?>">&#9998;</a></td>
          <?php
          }
          ?>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
</body>

</html>