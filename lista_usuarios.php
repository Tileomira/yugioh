<?php
include("conect.php");
include("cabecalho.php");
$sql = "SELECT * FROM   tb_usuarios";
$result = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="listausuario/estilo.css" rel="stylesheet">
    <title></title>
</head>

<body>
    <h2>Lista Usuários</h2>
    <br><br>

    <div>
        <table border="1">

            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Nível</th>
                <th>Excluir</th>
            </tr>

            <?php
            while ($tbl = mysqli_fetch_array($result)) {
            ?>

                <tr>
                    <td><?= $tbl[1] ?></td>
                    <td><?= $tbl[2] ?></td>
                    <td><?= $tbl[3] ?></td>
                    <td><?= $tbl[7] == $nivel ? "Usuário" : "Adiministrador" ?></td>
                    <td><a href="apagar_usuario.php?id=<?= $tbl[0] ?>">&#128465;</a></td>

                </tr>
            <?php
            }
            ?>

        </table>
    </div>

</body>

</html>