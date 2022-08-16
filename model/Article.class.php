<?php

class Article{
    public function  __construct(){
        $this->bdd = bdd();
    }



    //Read
    public function compter_visite(){
        $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
        $date = date('Y-m-d');
        $query = "INSERT INTO article(ip , date_visite , pages_vues)
            VALUES (:ip , :date , 1)
            ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            ':ip'   => $ip,
            ':date' => $date

        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }


    public function getAllArticle(){
        $query = "SELECT * FROM article
          ORDER BY id_article DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getHomeAllArticle(){
        $query = "SELECT * FROM article
          WHERE statut = 0 ORDER BY id_article DESC LIMIT 3";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getCinqArticle(){
        $query = "SELECT * FROM article
          ORDER BY id_article DESC LIMIT 10";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getAllArticleSide(){
        $query = "SELECT * FROM article
          ORDER BY id_article DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getLastArticleSide(){
        $query = "SELECT * FROM article
          ORDER BY id_article DESC LIMIT 1";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getArticleById($id){
        $query = "SELECT * FROM article
        WHERE id_article = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }

   public function getArticleByCategorie($id){
        $query = "SELECT * FROM article
        WHERE id_article = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }

    public function getArticleBySlug($slug){
        $query = "SELECT * FROM article
        WHERE slug = :slug";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slug" => $slug
        ));
        return $rs;
    }

    public function getArticleBySlugNbr($slug){
        $query = "SELECT * FROM article
        WHERE slug = :slug";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slug" => $slug
        ));
        return $rs;
    }
    public function getArticleBySearch($search){

        $query = "SELECT * FROM article
        WHERE description LIKE '%$search%' OR titre LIKE '%$search%'";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getArticleBySearchNbr($search){

        $query = "SELECT COUNT(*) as nb FROM article
        WHERE description LIKE '%$search%' OR titre LIKE '%$search%'";
        $rs = $this->bdd->query($query);
        return $rs;
    }

//Count

    public function getAllNbrArticle(){
        $query = "SELECT COUNT(*) as nb FROM article
          WHERE statut = 0  ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getNbrCatByArticle($categorie_id){
        $query = "SELECT COUNT(*) as nb FROM article
        WHERE categorie_id = :categorie_id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "categorie_id" => $categorie_id
        ));
        return $rs;
    }
    public function getAllNbrArticles($debut, $fin){
        $query = "SELECT * FROM article
        WHERE statut = 0 ORDER BY id_article DESC LIMIT $debut, $fin";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getAllNbrArticlesCat($debut, $fin, $catId){
        $query = "SELECT * FROM article
        WHERE categorie_id = :catId
        ORDER BY id_article DESC LIMIT $debut, $fin";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "catId" => $catId
        ));
        return $rs;
    }

    // Verification valeur existant
    public function verifArticle($propriete,$val){
        $query = "SELECT * FROM article WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }

}

$article = new Article();