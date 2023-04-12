<?php
 include("cabecalho.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
     $nome = $_POST["nm_carta"];
     $descricao = $_POST["desc"];
     $tipodacarta= $_POST["tipo"];
     $efeitodacarta= $_POST["efei"];
     $niveldacarta= $_POST["nivel"];
     $atakedacarta= $_POST["atk"];
     $defesadacarta= $_POST["def"];
     $atributodacarta= $_POST["atr"];
     $imagemdacarta= $_POST["img"];
     $limitedacarta = $_POST["limi"];
     
     include("conect.php");

     $sql = "INSERT INTO tb_carta (s_nome_carta, s_descr_carta, s_tipo_carta,s_efeito_carta,s_nivel_carta, s_atk_carta,
     s_def_carta, s_atributo_carta,s_img_carta,i_limite_carta) VALUES    
     ('$nome', '$descricao',' $tipodacarta','$efeitodacarta','$niveldacarta', '$atakedacarta','$defesadacarta', '$atributodacarta','$imagemdacarta',
     '$limitedacarta')";
     echo($sql);
     mysqli_query($link,$sql);
     header("location: lista_carta.php");
     exit();    
    }    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cadastrocarta/esitlo.css"  rel="stylesheet" >
</head>

<body>
    <div>
        <h2>Registre aqui sua carta para montar seu deck </h2>
        <form action="cadastro_carta.php" method="POST">
            <label>Nome da Carta :</label>
            <input type="text" name="nm_carta" maxlength="40" ><br><br>

            <label>descrição da Carta:</label>
            <input type="text" name="desc" maxlength="200" ><br><br>

            <label>Tipo da Carta :</label>
            <input type="text" name="tipo" maxlength="20" ><br><br>

            <label>Efeito da Carta :</label>
            <input type="text" name="efei" maxlength="200" ><br><br>


            <label>Nível da Carta :</label>
            <input type="text" name="nivel" maxlength="14" ><br><br>

            <label>Atake da Carta :</label>
            <input type="text" name="atk" maxlength="10" ><br><br>

            <label>Defesa da Carta :</label>
            <input type="text" name="def" maxlength="10" ><br><br>
    
            <label>Atributo da Carta:</label>
            <input type="text" name="atr" maxlength="16" ><br><br>
 
            <label>Imgem da Carta</label>
            <input type="file" name="img" maxlength="40" ><br><br>
       
            <label>Limite da Carta :</label>
            <input type="number" name="limi" maxlength="1" ><br><br>

            <label>Enviar</label>
            <input type="submit" value="Gravar">
            </form>
    </div>
</body>
</html>