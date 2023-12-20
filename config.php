<?php
//reportar erros!
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require 'vendor/autoload.php';

//usando bibliotecas para o envio de emails!
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if($_FILES['arquivo']['size'] > (1024 * 1024)){
    echo "Tamanho de arquivo maior que 1MB.";
    exit();
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["arquivo"]["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "docx" && $imageFileType != "doc" && $imageFileType != "pdf"){
  echo "Apenas arquivos com as seguintes extensões são permitidos: PDF, DOC ou DOCX.";
  exit();
}

move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file);


$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "bergue";

//Criando conexão!
$conexao = @mysqli_connect($servidor, $usuario, $senha, $dbname);

$nome= isset($_POST['nome']) ? $_POST['nome'] : "";
$sobrenome= isset($_POST['sobrenome']) ? $_POST['sobrenome'] : "";
$email= isset($_POST['email']) ? $_POST['email'] : "";
$telefone= isset($_POST['telefone']) ? $_POST['telefone'] : "";
$cargo= isset($_POST['cargo']) ? $_POST['cargo'] : "";
$escolaridade= isset($_POST['escolaridade']) ? $_POST['escolaridade'] : "";
$observacoes= isset($_POST['observacoes']) ? $_POST['observacoes'] : "";

date_default_timezone_set("America/Fortaleza");
$dataHoraAtual = date('Y-m-d H:i:s');

$ipuser = '';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipuser = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipuser = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ipuser = $_SERVER['REMOTE_ADDR'];
}


$sql = "INSERT INTO cadastro_form (nome, sobrenome, email, telefone, cargo, escolaridade, observacoes, arquivo, ipuser, dat) 
VALUES ('$nome', '$sobrenome', '$email', '$telefone', '$cargo', '$escolaridade', '$observacoes', '$target_file', '$ipuser', '$dataHoraAtual')";

$resultado = $conexao->query($sql) or trigger_error($conexao->error);


//envio de email junto com o arquivo
try {
    //Server settings
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '090d8de9cc7d3d';
    $phpmailer->Password = '946b9779594783';

    //Recipients
    $phpmailer->setFrom('from@example.com', 'Mailer');
    $phpmailer->addAddress('berguedutra23@gmail.com', 'Bergue');     //Add a recipient
    
    $phpmailer->addAttachment($target_file, 'Arquivo.pdf');    //Optional name

    //Content
    $phpmailer->isHTML(true);                                  //Set email format to HTML
    $phpmailer->Subject = 'Novo cadastro';
    $mailBody = 'Novo cadastro efetuado! <br>';
    $mailBody .= 'Nome: ' . $_POST['nome'] . '<br>';
    $mailBody .= 'Sobrenome: '. $_POST['sobrenome'] . '<br>';
    $mailBody .= 'E-mail: ' . $_POST['email'] . '<br>';
    $mailBody .= 'Telefone: ' . $_POST['telefone'] . '<br>'; 
    $mailBody .= 'Cargo desejado: ' . $_POST['cargo'] . '<br>'; 
    $mailBody .= 'Escolaridade: ' . $_POST['escolaridade'] . '<br>';
    $mailBody .= 'Observações: ' . $_POST['observacoes'] . '<br>';

   

    $phpmailer->Body = $mailBody;

     
                           

    $phpmailer->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

if($resultado==true){
    echo("Dados enviados com sucesso.");
}else{
    echo("Erro ao enviar dados!");
}
$conexao ->close();
?>