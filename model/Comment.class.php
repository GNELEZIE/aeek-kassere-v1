<?php

class Comment{
    public function  __construct(){
        $this->bdd = bdd();
    }


    //Create
    public function addComment($date_comment,$nom,$email,$message,$article_id){
        $query = "INSERT INTO comment(date_comment,nom,email,message,article_id)
            VALUES (:date_comment,:nom,:email,:message,:article_id)";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "date_comment" => $date_comment,
            "nom" => $nom,
            "email" => $email,
            "message" => $message,
            "article_id" => $article_id
        ));
        $nb = $rs->rowCount();
        if($nb > 0){
            $r = $this->bdd->lastInsertId();
            return $r;
        }
    }

    //Read
    public function getAllComment(){
        $query = "SELECT * FROM comment
          WHERE statut =!0  ORDER BY id_comment DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    public function getCommentById($id){
        $query = "SELECT * FROM comment
        WHERE  statut =!0  AND article_id = :id ORDER BY id_comment DESC";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }
    public function getCommentBSyId($id){
        $query = "SELECT * FROM comment
        WHERE  statut =!0  AND  article_id = :id ORDER BY id_comment DESC";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }
    public function getCommentByIdNb($id){
        $query = "SELECT * FROM comment
        WHERE article_id = :id AND statut =!0 ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }

//Count
    public function nbComments(){

        $query = "SELECT COUNT(*) as nb FROM comment
                  WHERE  statut =!0 ";
        $rs = $this->bdd->query($query);

        return $rs;
    }
    public function nbComment($id){
        $query = "SELECT  COUNT(*) as nb FROM comment
        WHERE article_id = :id AND   statut =!0 ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }
//Update



    public function updateCouverturePhoto($couverture,$id){
        $query = "UPDATE article
            SET couverture = :couverture
            WHERE id_article = :id ";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "couverture" => $couverture,
            "id" => $id
        ));

        $nb = $rs->rowCount();
        return $nb;

    }


}

$comment = new Comment();