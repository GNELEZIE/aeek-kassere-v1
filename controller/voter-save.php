<?php
if(isset($_POST['nom']) and isset($_POST['phone']) and isset($_POST['candId']) and isset($_POST['dialPhone']) and isset($_SESSION['myformkey']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){
    extract($_POST);

    $nom = htmlentities(trim(addslashes($nom)));
    $phone = htmlentities(trim(addslashes(strip_tags($phone))));
    $candId = htmlentities(trim(addslashes($candId)));
    $dialPhone = htmlentities(trim(addslashes($dialPhone)));
    $an = 23;
    if(strlen($phone) == 10){
        $numb = $voter->getVoterByPhone($phone);
        if($dataNimb = $numb->fetch()){
            echo '2';
        }else{

            $save  = $voter->voterSave($dateGmt ,$candId,$nom,$dialPhone,$phone,$an);
            if($save > 0){
                $nbv = $candidat->getNvote($candId)->fetch();
                $val = $nbv['nbvote'] + 1;
                $nbv = $candidat->updateVote($val,$candId);
                echo 'ok';
            }
        }

    }else{
        echo '1';
    }


}
