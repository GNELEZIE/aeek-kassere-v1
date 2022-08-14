<?php
class Categorie{
  public function __construct() {
      $this->bdd = bdd();
  }





// Read
    public function getCategorieById($id){
        $query = "SELECT * FROM categorie
        WHERE id_categorie = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }

    public function getAllCategorie(){
        $query = "SELECT * FROM categorie
          ORDER BY id_categorie  DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }



    public function getCategorieBySlug($slug){
        $query = "SELECT * FROM categorie
        WHERE slug = :slug";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slug" => $slug
        ));
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

$categorie = new Categorie();