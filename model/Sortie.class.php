<?php
class Sortie {
    public  function  __construct(){
        $this->bdd = bdd();
    }


// Create

    public function addSortie($dateSortie,$nom,$phone,$mbre){
        $query = "INSERT INTO sortie(date_sortie,nom,phone,membre)
            VALUES (:dateSortie,:nom,:phone,:mbre)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "dateSortie" => $dateSortie,
            "nom" => $nom,
            "phone" => $phone,
            "mbre" => $mbre
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }
    // Read




    //Count
    public function getNbrSortie(){
        $query = "SELECT COUNT(*) as nb FROM sortie";
        $rs = $this->bdd->query($query);

        return $rs;
    }

    // Verification valeur existant
    public function verifInscrit($propriete,$val){

        $query = "SELECT * FROM sortie WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }



}
// Instance

$sortie = new Sortie();