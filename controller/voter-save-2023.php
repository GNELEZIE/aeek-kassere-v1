<?php

if(isset($_POST['id'])){

    extract($_POST);

    $id = htmlentities(trim(addslashes($id)));
    $etat = 0;
//    echo 'ok';
//    exit;
    $cand = $candidat->getCandidatById($id)->fetch();
    $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
    $votes = $voter->getVoterByIp($ip);
     $vot = $cand['nbvote'] + 1;
    if($votes->rowCount() > 0){
        echo '1';
    }else{
        $save = $voter->voterAdd($dateGmt,$id);
        if($save >0){
            $update = $candidat->updateVote($vot,$id);
            echo 'ok';
        }
    }

}