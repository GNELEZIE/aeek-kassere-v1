<?php
if(isset($_SESSION['myformkey']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    error_reporting(E_ALL ^ E_NOTICE);

        $nom = htmlentities(trim(addslashes($nom)));
        $prenom = htmlentities(trim(addslashes($prenom)));
        $phone = htmlentities(trim(addslashes(strip_tags($phone))));
        $isoPhone = htmlentities(trim(addslashes(strip_tags($isoPhone))));
        $dialPhone = htmlentities(trim(addslashes(strip_tags($dialPhone))));
        $ville = htmlentities(trim(addslashes(strip_tags($ville))));

    $slug = create_slug($_POST['prenom']);
    $propriete1 = 'nom';
    $propriete2 = 'prenom';
    $bloquer = 1;

    $verifSlug = $membre->verifMembre($propriete2,$prenom);
    $rsSlug = $verifSlug->fetch();
    $nbSlug = $verifSlug->rowCount();

    if($nbSlug > 0 ){
        $slug = $slug.'-'.$nbSlug;
    }

    $idUser = $membre->addMmebreCAN($dateGmt,$nom,$prenom,$phone,$ville);

    if ($idUser > 0) {
        header('location:' .$domaine.'/success');
    } else {
        $erro['register'] = 'Une erreur s\'est produite, veuillez réessayer.';
    }



}