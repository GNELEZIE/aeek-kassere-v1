<?php
if(isset($_SESSION['myformkey']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['phone']) and isset($_POST['password']) and isset($_POST['passwordC']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    error_reporting(E_ALL ^ E_NOTICE);
    $nom = htmlentities(trim(addslashes($nom)));
    $prenom = htmlentities(trim(addslashes($prenom)));
    $phone = htmlentities(trim(addslashes(strip_tags($phone))));
    $isoPhone =  htmlentities(trim(addslashes($isoPhone)));
    $dialPhone =  htmlentities(trim(addslashes($dialPhone)));
    $ville = htmlentities(trim(addslashes($ville)));
    $password = htmlentities(trim(addslashes($password)));
    $passwordC = htmlentities(trim(addslashes($passwordC)));

    $slug = create_slug($_POST['prenom']);
    $propriete1 = 'nom';
    $propriete2 = 'prenom';
    $propriete3 = 'phone';
    $propriete4 = 'dial_phone';


    $verifSlug = $membre->verifMembre($propriete2,$prenom);
    $rsSlug = $verifSlug->fetch();
    $nbSlug = $verifSlug->rowCount();

    if($nbSlug > 0 ){
        $slug = $slug.'-'.$nbSlug;
    }
    $verifUser = $membre->getData2($propriete3,$phone,$propriete4,$dialPhone);
    $extensionValide = array('jpeg', 'jpg', 'png');
    $piece_ext = explode('.',$_FILES['piece']['name']);
    $piece_ext = strtolower(end($piece_ext));

    if (in_array($piece_ext, $extensionValide)) {
        $piece = uniqid().'.'.$piece_ext;
        $destination ='uploads/' . $piece;
        $tmp_name = $_FILES['piece']['tmp_name'];
        move_uploaded_file($tmp_name, $destination);
    }


    $extensionValide = array('jpeg', 'jpg', 'png');
    $photo_ext = explode('.',$_FILES['photo']['name']);
    $photo_ext = strtolower(end($photo_ext));

    if (in_array($photo_ext, $extensionValide)) {
        $photo = uniqid().'.'.$photo_ext;
        $destination ='uploads/' . $photo;
        $tmp_name = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp_name, $destination);
    }
    if ($verifUser->rowCount() > 0) {
        $errors['register'] = 'Votre numéro de téléphone existe déjà';
    } elseif (strlen($_POST['password']) < 8) {
        $errors['register'] = 'Le mot de passe est trop court, il doit faire 8 caractères minimum';
    } elseif ($password != $passwordC) {
        $errors['register'] = 'Erreur lors de la confirmation du mot de passe';
    } else {
        $options = ['cost' => 12];
        $mdpCript = password_hash($password, PASSWORD_BCRYPT, $options);
        $idUser = $membre->addMmebres($dateGmt,$nom,$prenom,$slug, $phone,$isoPhone,$dialPhone,$ville,$mdpCript,$photo,$piece);
        if ($idUser > 0) {
            $mailToken = str_replace('+', '-', my_encrypt($email));
            $subject = trim('Félicitation pour votre inscription.');
            include_once '../mail/valid-email.php';
            sendMailNoReply($email, $subject, $message);
            header('location:' .$domaine.'/succes');
        } else {
            $erro['register'] = 'Une erreur s\'est produite, veuillez réessayer.';
        }
    }


}