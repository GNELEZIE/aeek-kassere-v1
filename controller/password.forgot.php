<?php
if(!empty($_POST['email']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']) {
    extract($_POST);

    $email = htmlentities(trim(addslashes($email)));
    $result = $membre->getMembreByEmail($email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['register'] = 'Votre adresse email n\'est pas correct';
    }elseif($data = $result->fetch()){
        $mailToken = str_replace('+','-',my_encrypt($email));
        $subject = trim('Modification de mot de passe.');
        include_once 'mail/upd-pwd.php';
        sendMailNoReply($email,$subject,$message);
        $tab = array(
            "email" => $email,
        );
        $_SESSION['_updPwd'] = $tab;
        header('location:' .$domaine.'/update-pw/?token='.$mailToken);
        exit();
    }else{
        $errors['message'] = 'Cette adresse email n\'existe pas';
    }

}