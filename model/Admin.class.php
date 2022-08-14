<?php
class Admin {
    public  function  __construct(){
        $this->bdd = bdd();
    }


    // Read

    public function getAdminByEmail($email){

        $query = "SELECT * FROM admin
        WHERE email = :email";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "email" => $email
        ));

        return $rs;
    }

    public function getAdminById($id){

        $query = "SELECT * FROM admin
        WHERE id_admin = :id";
        $rs = $this->bdd->prepare($query);
        $rs->execute(array(
            "id" => $id
        ));

        return $rs;
    }

    public function getAllAdmin(){
        $query = "SELECT * FROM admin
        WHERE bloquer = 1 ORDER BY id_admin DESC";
        $rs = $this->bdd->query($query);

        return $rs;
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

$admin = new Admin();