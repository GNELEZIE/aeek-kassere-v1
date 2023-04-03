<?php

if(isset($_POST['nom']) and isset($_POST['aeek']) and  isset($_POST['phone']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){

    extract($_POST);

    $nom = htmlentities(trim(addslashes($nom)));
    $aeek = htmlentities(trim(addslashes($aeek)));
    $phone = htmlentities(trim(addslashes($phone)));
    $dateGmts = gmdate('Y-m-d H:i');

    $propriete = 'phone';
    $verif = $sortie->verifInscrit($propriete,$phone);

    if($dataS = $verif->fetch()){
        echo '1';
    }else{
        $save = $sortie->addSortie($dateGmts,$nom,$phone,$aeek);
        if($save > 0){
            echo 'ok';
        }
    }



}