<?php
include('conect.php');
$idcarta = $_POST['idcarta'];
$id = $_POST['id'];
// $sql = "UPDATE tb_deck SET s_nm_deck ='$nome' WHERE i_id_deck = '$id'";
$sql = "DELETE FROM `tb_constrdeck` WHERE i_id_constrdeck = '$idcarta' ";
//echo($sql);
    mysqli_query($link, $sql);
     header("Location: alterar_deck.php?id=$id");
    exit();