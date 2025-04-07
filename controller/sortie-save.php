<?php

if(isset($_POST['nom']) and  isset($_POST['phone']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){

    extract($_POST);

    $nom = htmlentities(trim(addslashes($nom)));
    $aeek = htmlentities(trim(addslashes($aeek)));
    $phone = htmlentities(trim(addslashes($phone)));
    $dateGmts = gmdate('Y-m-d H:i');
    $aeek = 'oui';
    $an = '2025';
    $propriete = 'phone';
    $verif = $sortie->verifInscrit($propriete,$phone);

    if($dataS = $verif->fetch()){
        $errors['register'] = 'Impossible de s\'inscrire, ce numéro a été déjà inscrit !';
    }else{
        $save = $sortie->addSortie25($dateGmts,$nom,$phone,$aeek,$an);
        if($save > 0){
            $tab = array(
                "type" => $aeek,
            );
//            $_SESSION['_valid'] = $tab;
            header('location: https://pay.wave.com/m/M_ci_OrcTWFAwliqL/c/ci/?amount=100');

        }else{
            $errors['register'] = 'Action Impossible une erreur s\'est produite !';
        }
    }



}