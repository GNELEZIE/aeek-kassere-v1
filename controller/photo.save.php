<?php
session_start();
include_once '../model/Connexion.class.php';
include_once '../model/Membre.class.php';
include_once "../function/domaine.php";
$data_info = '';
$data_photo = '';

if(isset($_SESSION['membreaeek'])){

    extract($_POST);

    $res = $membre->getMmembreById($_SESSION['membreaeek']['id_membre'])->fetch();

    $ex_photo = $res['photo'];
    if(empty($_FILES['userImg']['name'])){
        $photo = $res['photo'];
    }else{
        $extensionValide = array('jpeg', 'jpg', 'png');
        $photo_ext = explode('.',$_FILES['userImg']['name']);
        $photo_ext = strtolower(end($photo_ext));

        if (in_array($photo_ext, $extensionValide)) {
            $photo = uniqid().'.'.$photo_ext;
            $destination = '../assets/media/users/'.$photo;
            $tmp_name = $_FILES['userImg']['tmp_name'];

            if(move_uploaded_file($tmp_name,$destination)){
                if($ex_photo  != ''){
                    $fichier ='../assets/media/users/'.$ex_photo;
                    if(file_exists($fichier)){
                        unlink($fichier);
                    }
                }
            }
        }
    }
    $update = $membre->updateMembrePhoto($photo,$_SESSION['membreaeek']['id_membre']);
    if($update >0){
        $data = $membre->getMmembreById($_SESSION['membreaeek']['id_membre'])->fetch();
        $data_info = 'ok';
        $data_photo = $asset.'/media/users/'.$data['photo'];
    }
    $output = array(
        'data_info' => $data_info,
        'data_photo' => $data_photo
    );
    echo json_encode($output);
}
