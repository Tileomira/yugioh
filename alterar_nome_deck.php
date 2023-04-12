<?php
include('conect.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$sql = "UPDATE tb_deck SET s_nm_deck ='$nome' WHERE i_id_deck = '$id'";
    mysqli_query($link, $sql);
    header("Location: alterar_deck.php?id=$id");
    exit();