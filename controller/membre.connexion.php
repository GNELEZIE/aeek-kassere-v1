<?php
if( isset($_SESSION['myformkey']) and isset($_POST['phone']) and isset($_POST['isoPhone']) and isset($_POST['dialPhone']) and isset($_POST['password']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']) {
    extract($_POST);

    $phone = htmlentities(trim(addslashes(strip_tags($phone))));
    $isoPhone =  htmlentities(trim(addslashes($isoPhone)));
    $dialPhone =  htmlentities(trim(addslashes($dialPhone)));
    $password = htmlentities(trim(addslashes($password)));
     $num = $phone;
    $propriete1 = 'phone';
    $propriete2 = 'dial_phone';
    $result = $membre->getData2($propriete1,$phone,$propriete2,$dialPhone);

    if ($data = $result->fetch()) {
        $errors['connec'] = '';
        if (password_verify($password, $data['mot_de_passe'])) {
            if ($data['bloquer'] == 0) {
                $_SESSION['membreaeek'] = $data;
                if (isset($_POST['remember'])) {
                    setcookie('cookieaeek', $num, time() + 60 * 60 * 24 * 30, '/', $cookies_domaine, true, true);
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



}