<?php
if(isset($_SESSION['myformkey']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    error_reporting(E_ALL ^ E_NOTICE);
        $email = htmlentities(trim(addslashes(strip_tags($email))));
        $nom = htmlentities(trim(addslashes($nom)));
        $prenom = htmlentities(trim(addslashes($prenom)));
        $phone = htmlentities(trim(addslashes(strip_tags($phone))));
        $isoPhone = htmlentities(trim(addslashes(strip_tags($isoPhone))));
        $dialPhone = htmlentities(trim(addslashes(strip_tags($dialPhone))));
        $ville = htmlentities(trim(addslashes(strip_tags($ville))));

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
        } else {

            $idUser = $membre->addMmebreReunion($dateGmt,$nom,$prenom,$slug, $email, $phone,$isoPhone,$dialPhone,$ville);
            if ($idUser > 0) {
                header('location:' .$domaine.'/success');
            } else {
                $erro['register'] = 'Une erreur s\'est produite, veuillez réessayer.';
            }
        }


}