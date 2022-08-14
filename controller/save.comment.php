<?php
session_start();
$info = '';
if(isset($_POST['nom']) and isset($_POST['email']) and isset($_POST['message']) and isset($_POST['article_id']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);
    //Include function
    include_once "../function/function.php";
//Include Connexion
    include_once '../model/Connexion.class.php';

// appelle des class
    include_once '../model/Comment.class.php';

    $nom = htmlentities(trim(addslashes($nom)));
    $email = htmlentities(trim(addslashes($email)));
    $message = htmlentities(trim(addslashes($message)));
    $article_id = htmlentities(trim(addslashes($article_id)));
    $save= $comment->addComment($dateGmt,$nom,$email,$message,$article_id);

    if($save > 0){
        $info = 'ok';
    }
}

$output = array(
    'data_info' => $info
);
echo json_encode($output);