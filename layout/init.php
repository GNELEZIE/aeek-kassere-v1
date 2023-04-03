<?php
ini_set("session.cookie_httponly", True);
session_start();

// include function
include_once "function/domaine.php";
include_once "function/mailing.php";
include_once "function/function.php";
include_once "function/detectdevice/Mobile_Detect.php";
include_once "function/detectdevice/detect.php";


//Include Connexion
include_once 'model/Connexion.class.php';

// appelle des class

// appelle des class
include_once 'model/Admin.class.php';
include_once 'model/Article.class.php';
include_once 'model/Categorie.class.php';
include_once 'model/Comment.class.php';
include_once 'model/Reponse.class.php';
include_once 'model/Compter.class.php';
include_once 'model/Banniere.class.php';
include_once 'model/Tag.class.php';
include_once 'model/Article_tags.class.php';
include_once 'model/Events.class.php';
include_once 'model/Gallerie.class.php';
include_once 'model/Emplois.class.php';
include_once 'model/Membre.class.php';
include_once 'model/Propos.class.php';
include_once 'model/Flash.class.php';
include_once 'model/Voter.class.php';
include_once 'model/Candidat.class.php';
include_once 'model/Sortie.class.php';


 if(isset($_COOKIE['cookieaeek']) AND !isset($_SESSION['membreaeek'])){
    $phon = my_decrypt($_COOKIE['cookieaeek']);
    $result = $membre->getMembreByPhone($phon);
    if($data = $result->fetch()){
        if($data['bloquer'] == 0){
            $_SESSION['membreaeek'] = $data;
        }else{
            setcookie('cookieaeek',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
        }
    }else{
        setcookie('cookieaeek',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
    }
 }

 if(isset($_SESSION['membreaeek'])){
     $result = $membre->getMmembreById($_SESSION['membreaeek']['id_membre']);
     if($data = $result->fetch()){
         if($data['bloquer'] != 0){
             if(isset($_COOKIE['cookieaeek'])) {
                setcookie('cookieaeek',null,time()-60*60*24*30,'/',$cookies_domaine,true,true);
             }
            unset($_SESSION['membreaeek']);
         }
     }else{
         unset($_SESSION['membreaeek']);
     }
 }
