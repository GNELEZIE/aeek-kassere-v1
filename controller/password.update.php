<?php
if(isset($_POST['user']) and isset($_POST['password']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $password = htmlentities(trim(addslashes($password)));
    $confpassword = htmlentities(trim(addslashes($confpassword)));
    $user = htmlentities(trim(addslashes($user)));
    $result = $membre->getMembreByEmail($user);


    if($data = $result->fetch()){
        if($data['email'] == $user){
            if($password == $confpassword){
                $options = ['cost' => 12];
                $mdpCript = password_hash($password,PASSWORD_BCRYPT,$options);
                $update = $membre->updatePassword($mdpCript,$data['id_membre'] );
                if($update > 0){
                    $success['message'] = 'Votre mot de passe a été modifié avec succès !<br> <a href="'.$domaine.'/connexion">Cliquer ici pour vous connecter</a>';
                }
            }else{
                $errors['connect'] = 'Erreur de confirmation du mot de passe';
            }
        }else{
            $errors['connect'] = 'Une erreur s\'est produite lors de l\'activation du compte';
        }
    }else{
        $errors['connect'] = 'Une erreur s\'est produite lors de l\'activation du compte';
    }
}