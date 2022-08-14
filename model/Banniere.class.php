<?php
class Banniere{
    public function __construct() {
        $this->bdd = bdd();
    }



// Read
    public function getBanById($id){
        $query = "SELECT * FROM banniere
        WHERE id_banniere = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }

    public function getAllBanniere(){
        $query = "SELECT * FROM banniere
          ORDER BY id_banniere   DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function nbBan(){

        $query = "SELECT COUNT(*) as nb FROM banniere";
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

$banniere = new Banniere();