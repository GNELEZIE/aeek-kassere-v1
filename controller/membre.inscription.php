<?php
if(isset($_SESSION['myformkey']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['passwordC']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    error_reporting(E_ALL ^ E_NOTICE);
        $email = htmlentities(trim(addslashes(strip_tags($email))));
        $nom = htmlentities(trim(addslashes($nom)));
        $prenom = htmlentities(trim(addslashes($prenom)));
        $password = htmlentities(trim(addslashes($password)));
        $passwordC = htmlentities(trim(addslashes($passwordC)));
    $slug = create_slug($_POST['prenom']);
    $propriete1 = 'nom';
    $propriete2 = 'prenom';


    $verifSlug = $membre->verifMembre($propriete2,$prenom);
    $rsSlug = $verifSlug->fetch();
    $nbSlug = $verifSlug->rowCount();

    if($nbSlug > 0 ){
        $slug = $slug.'-'.$nbSlug;
    }
        $verifMail = $membre->getMembreByEmail($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['register'] = 'Votre adresse email n\'est pas correct';
        } elseif ($verifMail->rowCount() > 0) {
            $errors['register'] = 'Votre adresse email existe déjà';
        } elseif (strlen($_POST['password']) < 8) {
            $errors['register'] = 'Le mot de passe est trop court, il doit faire 8 caractères minimum';
        } elseif ($password != $passwordC) {
            $errors['register'] = 'Erreur lors de la confirmation du mot de passe';
        } else {
            $options = ['cost' => 12];
            $mdpCript = password_hash($password, PASSWORD_BCRYPT, $options);
            $idUser = $membre->addMmebre($dateGmt,$nom,$prenom,$slug, $email, $mdpCript);
            if ($idUser > 0) {
                $mailToken = str_replace('+', '-', my_encrypt($email));
                $subject = trim('Félicitation pour votre email.');
                include_once '../mail/valid-email.php';
                sendMailNoReply($email, $subject, $message);
                header('location:' .$domaine.'/succes');
            } else {
                $erro['register'] = 'Une erreur s\'est produite, veuillez réessayer.';
            }
        }


}