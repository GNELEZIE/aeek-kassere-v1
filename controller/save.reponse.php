<?php

$info = '';
if(isset($_POST['nomR']) and isset($_POST['messageR']) and isset($_POST['com_id']) and isset($_POST['article_id']) and isset($_SESSION['myformkey']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){
    extract($_POST);

    $nomR = htmlentities(trim(addslashes($nomR)));
    $messageR = htmlentities(trim(addslashes($messageR)));
    $com_id = htmlentities(trim(addslashes($com_id)));
    $article_id = htmlentities(trim(addslashes($article_id)));
    $save= $reponse->addReponse($dateGmt,$nomR,$messageR,$com_id,$article_id);

    if($save > 0){
        $info = 'ok';
    }
}

$output = array(
    'data_info' => $info
);
echo json_encode($output);