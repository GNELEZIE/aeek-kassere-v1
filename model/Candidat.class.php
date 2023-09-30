<?php
class Candidat {
    public  function  __construct(){
        $this->bdd = bdd();
    }


// Create

  
    // Read
    public function getCandidatBySlug($slug){

        $query = "SELECT * FROM candidat
        WHERE slug = :slug";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slug" => $slug
        ));

        return $rs;
    }
    public function getCandidatById($id){

        $query = "SELECT * FROM candidat
        WHERE id_candidat = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getAllCandidatLimit($debut, $fin){
        $query = "SELECT * FROM candidat ORDER BY  nbvote DESC LIMIT $debut, $fin";
        $rs = $this->bdd->query($query);
        return $rs;
    }

        public function getAllCandidats(){
        $query = "SELECT * FROM candidat";
        $rs = $this->bdd->query($query);
        return $rs;
    }


    public function getAllCandidat(){
        $query = "SELECT * FROM candidat ORDER BY RAND()";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    //Count
    public function getNbCandidat(){
        $query = "SELECT COUNT(*) as nb FROM candidat";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    //Update
    public function updateVote($vote,$id){
        $query = "UPDATE candidat
            SET nbvote = :vote
            WHERE id_candidat = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "vote" => $vote,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }


    // Verification valeur existant
    public function verifUtilisateur($propriete,$val){

        $query = "SELECT * FROM admin WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }




}
// Instance

$candidat = new Candidat();