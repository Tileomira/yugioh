<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMail/src/Exception.php';
require 'PHPMail/src/PHPMailer.php';
require 'PHPMail/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conect.php");
    $email = $_POST["email"];

    // verifica se o usuário é valido
    $sql = "SELECT COUNT(i_id_usuarios) FROM tb_usuarios WHERE 
    s_email_usuarios = '$email'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        $count = $tbl[0];
    }
    if ($count != 0) {
        $recupera = rand();
        $sql = "UPDATE tb_usuarios SET s_recupera_usuarios = '$recupera' WHERE
      s_email_usuarios = '$email'";
        mysqli_query($link, $sql);

        $to = $email;
        $subject = "Recuperação de Senha";
        $message = "Esse é seu código de recuperação $recupera. <br> Acesse <a 
      href='http://localhost/yugioh/redefine_senha.php>aqui</a> para redefinir sua senha.";

        $mail = new PHPMailer(true);

        try {
            //configurações do servidor
            $mail->SMTPDebug = 0; //Ativar saída de depuração detalhada
            $mail->isSMTP();      //Enviar usando SMTP
            $mail->Host = 'smtp.office365.com'; //Definir o servidor SMTP para enviar através
            $mail->SMTPAuth = true;  //Ativar autenticação SMTP
            $mail->Username = "lmmira2022@outlook.com";  //nome de usuário SMTP
            $mail->Password = "leregido1020";  //senha SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = "UTF-8";

            //Destinatários
            $mail->setFrom('lmmira2022@outlook.com', 'Site de Deck YuGiOh');
            $mail->addAddress($to); //Adicionar um destinatário

            //Contente
            $mail->isHTML(true); //Definir formato de email para HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            echo 'Mensagem enviada';
        } catch (Exception $e) {
            echo "Não foi possível enviar a mensagem: {$email->ErrorInfo}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="recuperasenha/estilo.css" rel="stylesheet">
    <title>Recuperar Senha</title>
</head>

<body>

    <div>
        <h2>Recupera Senha</h2><br><br>
        <form action="recupera_senha.php" method="post">
            <label>Email:</label>
            <input type="email" name="email" maxlength="50" required>
            <br><br>
            <button>Enviar</button>
        </form>
    </div>
</body>

</html>