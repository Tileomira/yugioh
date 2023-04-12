<?php
include('cabecalho.php');
include('conect.php');
$_DECK = ['id_deck'];

if (isset($_DECK['id_deck'])) {


    echo ("criando o deck com as cartas");
} else {
} ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index/estilo.css" rel="stylesheet">
    <title>Deck Builder</title>

</head>
<style>
    body {
        background-color: gray;
    }

    div {
        border: white 4px solid;
        border-radius: 50px;
        padding: 15px;

    }

    button {
        background: linear-gradient(to bottom, gray 0%, black 30%, gray 70%, black 100%);
        border: none;
        display: inline-block;
        cursor: pointer;
    }

    a {
        text-decoration: none;
    }

    img{
        width: 130px;
    }
</style>

<body>
    <h2 id="id1">Contrunções de Decks</h2>
    <br><br>
    <p id="p1">Aqui nesse site vocês podem fazer construnções de decks com algumas cartas , você pode alterar os nomes
        dos decks ,você pode adicionar cartas e excluir também.
    </p>

</body>
<img src=" imagens/duel links.jpg">

</html>