<?php

class Emplois{
    public function  __construct(){
        $this->bdd = bdd();
    }


    //Read

    public function getAllEmplois(){
        $query = "SELECT * FROM emplois
          ORDER BY id_emplois DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getAllEmploisActive(){
        $query = "SELECT * FROM emplois
                  WHERE statut =!1 ORDER BY id_emplois DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getEmploisActive($debut, $fin){
        $query = "SELECT * FROM emplois
                  WHERE statut =!1 ORDER BY id_emplois DESC LIMIT $debut, $fin";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    //Count
    public function nbEmplois(){

        $query = "SELECT COUNT(*) as nb FROM emplois
                  WHERE statut =!1 ";
        $rs = $this->bdd->query($query);

        return $rs;
    }
    // Verification valeur existant
    public function verifEmplois($propriete,$val){
        $query = "SELECT * FROM emplois WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }

    // Delete
    public function deleteArticle($id){

        $query = "DELETE  FROM article WHERE id_article  = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id

        ));

        $nb = $rs->rowCount();
        return $nb;

    }









}

$emplois = new Emplois();