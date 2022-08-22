<?php
class Propos{
    public function __construct() {
        $this->bdd = bdd();
    }



// Read

    public function getAllpropos(){
        $query = "SELECT * FROM propos
          ORDER BY id_propos DESC LIMIT 1 ";
        $rs = $this->bdd->query($query);
        return $rs;
    }





    // Verification valeur existant
    public function verifCategorie($propriete,$val){
        $query = "SELECT * FROM categorie WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }




}

$propos = new Propos();