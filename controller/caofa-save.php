<?php

if(isset($_POST['nom']) and isset($_POST['niveau']) and  isset($_POST['phone']) and  isset($_POST['message']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){

    extract($_POST);

    $nom = htmlentities(trim(addslashes($nom)));
    $phone = htmlentities(trim(addslashes($phone)));
    $niveau = htmlentities(trim(addslashes($niveau)));
    $message = htmlentities(trim(addslashes($message)));

    $dateGmts = gmdate('Y-m-d H:i');

    $propriete = 'phone';
    $verif = $sortie->verifCaofa($propriete,$phone);

    if($dataS = $verif->fetch()){
        $errors['register'] = 'Impossible de s\'inscrire, ce numéro a été déjà inscrit !';
    }else{
        $save = $sortie->addCAOFA($dateGmts,$nom,$phone,$niveau,$message);
        if($save > 0){
            $tab = array(
                "nom" => $nom,
            );
            $_SESSION['_valid'] = $tab;
            header('location:' .$domaine.'/succes');
            exit();
        }else{
            $errors['register'] = 'Action Impossible une erreur s\'est produite !';
        }
    }



}