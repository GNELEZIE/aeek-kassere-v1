<?php
class Events{
    public function __construct() {
        $this->bdd = bdd();
    }



// Read
    public function getEventById($id){
        $query = "SELECT * FROM events
        WHERE id_events = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));
        return $rs;
    }

    public function getEventBySlug($slugs){
        $query = "SELECT * FROM events
        WHERE slug = :slugs";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slugs" => $slugs
        ));
        return $rs;
    }
    public function getEventsBySlug($slugs){
        $query = "SELECT * FROM events
        WHERE slug = :slugs";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "slugs" => $slugs
        ));
        return $rs;
    }

    public function getAllEvents(){
        $query = "SELECT * FROM events
          ORDER BY id_events    DESC ";
        $rs = $this->bdd->query($query);
        return $rs;
    }
    public function getSixEvents(){
        $query = "SELECT * FROM events
          ORDER BY id_events DESC LIMIT 6";
        $rs = $this->bdd->query($query);
        return $rs;
    }

// Count
    public function nbrEvents(){
        $query = "SELECT COUNT(*) as nb FROM events";
        $rs = $this->bdd->query($query);
        return $rs;
    }

    // Delete
    public function deleteEvent($id){

        $query = "DELETE  FROM events WHERE id_events  = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id

        ));

        $nb = $rs->rowCount();
        return $nb;

    }


    // Verification valeur existant
    public function verifEvents($propriete,$val){
        $query = "SELECT * FROM events WHERE $propriete = :val";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "val" => $val
        ));

        return $rs;
    }




}

$events = new Events();