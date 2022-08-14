<?php
if( isset($_SESSION['myformkey']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']) {
    extract($_POST);

        $email = htmlentities(trim(addslashes(strip_tags($email))));
        $password = htmlentities(trim(addslashes($password)));
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = $membre->getMembreByEmail($email);
            if ($data = $result->fetch()) {
                $errors['connec'] = '';
                if (password_verify($password, $data['mot_de_passe'])) {
                    if ($data['bloquer'] == 0) {
                        $_SESSION['membreaeek'] = $data;
                        if (isset($_POST['remember'])) {
                            setcookie('cookieaeek', $data['email'], time() + 60 * 60 * 24 * 30, '/', $cookies_domaine, false, false);
                        }
                        if (isset($_GET['return'])) {
                            header('location:' . str_replace('-', '+', my_decrypt($_GET['return'])));
                        } else {
                            header('location:' . $domaine . '/compte/dashboard');
                        }
                    } else {
                        $errors['connec'] = 'Votre compte a été bloqué';
                    }
                } else {
                    $errors['connec'] = 'Email ou mot de passe incorrecte';
                }
            } else {
                $errors['connec'] = 'Email ou mot de passe incorrecte';
            }
        } else {
            $errors['connec'] = 'Votre adresse email n\'est pas correcte.';
        }


}