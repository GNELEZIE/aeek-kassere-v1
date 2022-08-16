<?php
session_start();
$info = '';
if(isset($_POST['email']) and isset($_POST['nom']) and isset($_POST['sujet']) and isset($_POST['message']) and  isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    error_reporting(E_ALL ^ E_NOTICE);
    $date = gmdate('Y-m-d H:i');
    include_once "../function/mailing.php";
    $nom = htmlentities(trim(addslashes(strip_tags($nom))));
    $sujet = htmlentities(trim(addslashes(strip_tags($sujet))));
    $email = htmlentities(trim(addslashes(strip_tags($email))));
    $message = htmlentities(trim(addslashes(strip_tags($message))));

    $messages = 'Bonjour, <br/><br/> Vous avez un nouveau message ! <br/><br/>Nom : '.$nom.'<br/>Email : '.$email.'<br/><br/>'. $message;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $info = '1';
    }else{
        sendMailToMe($email,$nom,$sujet,$messages);
        $info = 'ok';
    }

}
$output = array(
    'data_info' => $info
);
echo json_encode($output);