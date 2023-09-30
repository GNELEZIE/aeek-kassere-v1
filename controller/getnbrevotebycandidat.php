<?php
$getnbrevotebycand ='';
if(isset($_SESSION['myformkey']) and isset($_POST['slg']) and isset($_POST['token']) and $_SESSION['myformkey'] == $_POST['token']){
   extract($_POST);
    $slg = htmlentities(trim(addslashes(strip_tags($slg))));

    $cand = $candidat->getCandidatBySlug($slg);
    if($cand_data = $cand->fetch()){
            $nbrebyCand = $voter->getNbrVoteByCandidat($cand_data['id_candidat'])->fetch();
            $getnbrevotebycand = $nbrebyCand['nb'];
    }else{
        $getnbrevotebycand ='';
    }



}
$output = array(
    'getnbrevotebycand' => $getnbrevotebycand
);
echo json_encode($output);