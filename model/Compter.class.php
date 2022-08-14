<?php

class Compter{
    public function  __construct(){
        $this->bdd = bdd();
    }



    //Read
    public function compter_visite(){
        $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
        $date = date('Y-m-d');
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edg') !== FALSE) {
           $navigateur = 'Edg';
        }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mise') !== FALSE){
            $navigateur = 'Mise';
        }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE){
            $navigateur = 'Chrome';
        }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE){
            $navigateur = 'Firefox';
        }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE){
            $navigateur = 'Safari';
        }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'opera') !== FALSE){
            $navigateur = 'opera';
        }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE){
            $navigateur = 'Explorer';
        }else{
            $navigateur = 'inconnu';
        }
        if (stristr($_SERVER['HTTP_USER_AGENT'], "Android") || strpos($_SERVER['HTTP_USER_AGENT'], "iPod") || strpos($_SERVER['HTTP_USER_AGENT'], "iPhone") )
        {
            $devices = 'mobile';
        }
        else {
            $devices = 'pc';
        }

        $query = "INSERT INTO stats_visite(ip , date_visite ,navigateur , devices, pages_vues)
            VALUES (:ip , :date , :navigateur, :devices , 1) ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            'ip'   => $ip,
            'date' => $date,
            'navigateur' => $navigateur,
            'devices' => $devices

        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }



}

$compter = new Compter();