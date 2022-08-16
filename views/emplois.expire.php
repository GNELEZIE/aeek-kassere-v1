<?php


$etat = 1;

$list = $emplois->getAllEmplois();
while($expire = $list->fetch()){
    $expDate = date_fr($expire['date_fin']);
    $toDate = date_fr($dateGmt);
//      echo $expDate .' = '.$toDate;
    if($expDate == $toDate){
        $upd = $emplois->updateEmplois($etat,$expire['id_emplois']);
    }
}


