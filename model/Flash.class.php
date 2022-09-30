<?php
class Flash{
  public function __construct() {
      $this->bdd = bdd();
  }


// Create



// Read
    public function getFlashyId($id){
        $query = "SELECT * FROM flash
        WHERE id_flash = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }
    public function getFlashySlug($slug){
        $query = "SELECT * FROM flash
        WHERE slug = :slug";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slug" => $slug
        ));
        return $rs;
    }



    public function getAllFlash($debut, $fin){
        $query = "SELECT * FROM flash
                  ORDER BY id_flash DESC LIMIT $debut, $fin";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getHomeFlash(){
        $query = "SELECT * FROM flash
                  ORDER BY id_flash DESC LIMIT 1";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    //Count
    public function getFlashBySlugNbr($slug){
        $query = "SELECT * FROM flash
        WHERE slug = :slug";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slug" => $slug
        ));
        return $rs;
    }
    public function getAllNbrFlash(){
        $query = "SELECT COUNT(*) as nb FROM flash";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    // Delete
    public function deleteFlash($id){

        $query = "DELETE  FROM flash WHERE id_flash  = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id

        ));

        $nb = $rs->rowCount();
        return $nb;

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

$flash = new Flash();