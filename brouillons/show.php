<?php
if(isset($doc[1]) and !isset($doc[2])) {

    $liste = $article->getArticleBySlug($doc[1]);
    $listeNbr = $article->getArticleBySlugNbr($doc[1])->fetch();

    if ($data = $liste->fetch()){
        $authors = $admin->getAdminById($data['user_id'])->fetch();
        $comments = $comment->getCommentById($data['id_article']);
        $commentsNb = $comment->getCommentByIdNb($data['id_article'])->fetch();
        if($nbCom = $comments->fetch()){
            $nbComments = $comment->nbComment($data['id_article'])->fetch();
            $nbReponses = $reponse->nbReponses($commentsNb['id_comment'])->fetch();
            $nbrComt = $nbComments['nb'] + $nbReponses['nb'];
        }else{
            $nbrComt = 0;
        }
    }else {
        header('location:' . $domaine . '/error');
        exit();
    }
}


//$comments = $comment->getAllComment();

//$comt = $comments->fetch();



//require_once 'controller/save.comment.php';
//require_once 'controller/save.reponse.php';
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;

require_once 'layout/header.php';
?>

<section class="blog-page padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12 sticky-widget">
                <div class="blog-item single">
                    <div class="image">
                        <img src="<?=$domaine?>/uploads/<?=$data['couverture'];?>" alt="Blog image" class="img-responsive">
                    </div>
                    <!-- image -->
                    <div class="blog-content">
                        <div>
                            <ul class="post-meta">
                                <li><a href="#"><span><?=(date('N', strtotime($data['date_article'])))?></span><?=month_fr(date('m', strtotime($data['date_article']))).','.date('Y', strtotime($data['date_article']))?></a></li>
                                <li><span class="icon flaticon-user"></span><a href="#">Par <?=$authors['nom']?></a></li>
                                <li><span class="icon flaticon-like"></span><a href="#">12 Like</a></li>
                                <li><span class="icon flaticon-chat"></span>
                                    <a href="<?=$domaine?>/show/<?=$data['slug']?>">
                                        <?=$nbrComt?>
                                        <?php
                                        if($nbrComt > 1){
                                            echo 'Commentaires';
                                        }else{
                                            echo 'Commentaire';
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                            <!-- post-meta -->
                            <div class="content">
                                <h4 style="line-height: 1.5;"><?=html_entity_decode(stripslashes($data['titre']));?></h4>
                                <div class="cont"><?=html_entity_decode(stripslashes($data['description']));?></div>
                            </div>
                            <!-- content -->
                        </div>
                    </div>
                    <!-- blog-content -->
                    <div class="post-bottom">
                        <ul class="tags">
                            <li><span style="text-transform: inherit !important;">Tags :</span></li>
                            <li><a href="#">Business,</a></li>
                            <li><a href="#">Event,</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>
                        <ul class="share event-social">
                            <li><span style="text-transform: inherit !important;">Partager sur :</span></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- blog item -->

                <div class="comments">
                    <h4>
                        <?=$nbrComt?>
                        <?php
                        if($nbrComt > 1){

                            echo 'Commentaires';
                        }else{
                            echo 'Commentaire';
                        }
                        ?>
                    </h4>

                    <ul>
                        <?php
                        while($com = $comments->fetch()){

                            $rps = $reponse->getReponseById($com['id_comment'],$data['id_article']);
                            if($com['nom'] == ''){
                                $nom ='Anonyme';
                            }else{
                                $nom =$com['nom'];
                            }
                            ?>
                            <li class="comment-item">
                                <div class="image"><img src="<?=$asset?>/media/anonym.png" alt="Blog image" class="img-responsive"></div>
                                <div class="com-content">
                                    <h4><?=html_entity_decode(stripslashes($nom))?></h4>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i> <?=date_lettre($com['date_comment']);?> </span>
                                    <p><?=html_entity_decode(stripslashes($com['message']))?></p>
                                    <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$com['id_comment']?>" aria-expanded="false" aria-controls="flush-collapse<?=$com['id_comment']?>"><i class="fa fa-reply" aria-hidden="true"></i> Répondre</a>
                                </div>
                                <div class="accordion accordion-flush" id="reponse<?=$com['id_comment']?>">
                                    <div class="accordion-item">
                                        <div id="flush-collapse<?=$com['id_comment']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$com['id_comment']?>" data-bs-parent="#reponse<?=$com['id_comment']?>">
                                            <div class="comment-form">
                                                <form method="post" id="formRepondre">
                                                    <div class="succesR"></div>
                                                    <div class="errosR"></div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                                            <input type="text" name="nomR" id="nomR" placeholder="Nom*" class="comment-input input-style" required>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                                            <input type="email" name="emailR" id="emailR" placeholder="Email*" class="comment-input input-style" required>
                                                            <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                                                            <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                                                            <input type="hidden" class="form-control " name="com_id" id="com_id" value="<?=$com['id_comment']?>">
                                                        </div>
                                                    </div>
                                                    <textarea rows="3" name="messageR" id="messageR" class="comment-input input-style" placeholder="Message"></textarea>
                                                    <button type="submit" name="submit" class="comment-submit btn-transparence-orange mb-3" style="text-transform: inherit !important;font-weight: inherit !important;">Répondre</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <?php
                                    while($respon = $rps->fetch()) {
                                        if($respon['nom'] == ''){
                                            $nomR ='Anonyme';
                                        }else{
                                            $nomR =$respon['nom'];
                                        }
                                        ?>
                                        <li class="comment-item">
                                            <div class="image"><img src="<?=$asset?>/media/anonym.png" alt="Blog image" class="img-responsive"></div>
                                            <div class="com-content">
                                                <h4><?=html_entity_decode(stripslashes($nomR))?></h4>
                                                <span><i class="fa fa-circle" aria-hidden="true"></i><?=date_lettre($respon['date_reponse']);?></span>
                                                <p><?=html_entity_decode(stripslashes($respon['message']))?></p>
                                                <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$com['id_comment'].'_'.$respon['id_reponse']?>" aria-expanded="false" aria-controls="flush-collapse<?=$com['id_comment'].'_'.$respon['id_reponse']?>"><i class="fa fa-reply" aria-hidden="true"></i> Répondre</a>
                                            </div>
                                            <div class="accordion accordion-flush" id="reponse<?=$com['id_comment'].'_'.$respon['id_reponse']?>">
                                                <div class="accordion-item">
                                                    <div id="flush-collapse<?=$com['id_comment'].'_'.$respon['id_reponse']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$com['id_comment'].'_'.$respon['id_reponse']?>" data-bs-parent="#reponse<?=$com['id_comment'].'_'.$respon['id_reponse']?>">
                                                        <div class="comment-form">
                                                            <form method="post" id="formRepondreR">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                                                        <input type="text" name="nomR" id="nomR" placeholder="Nom*" class="comment-input input-style" required>
                                                                        <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                                                        <input type="email" name="emailR" id="emailR" placeholder="Email*" class="comment-input input-style" required>
                                                                        <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                                                                        <input type="hidden" class="form-control " name="com_id" id="com_id" value="<?=$com['id_comment']?>">
                                                                        <input type="hidden" class="form-control " name="article_id" id="article_id" value="<?=$data['id_article']?>">
                                                                    </div>
                                                                </div>
                                                                <textarea rows="3" name="messageR" id="messageR" class="comment-input input-style" placeholder="Message"></textarea>
                                                                <button type="submit" name="submit" class="comment-submit btn-transparence-orange mb-3" style="text-transform: inherit !important;font-weight: inherit !important;">Répondre</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>

                        <?php

                        }
                        ?>

                    </ul>
                </div>
                <!-- comment -->
                <div class="comment-form">
                    <h4>Commenter</h4>

                    <form method="post" id="formComment">
                       <div class="succes"></div>
                       <div class="erros"></div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <input type="text" name="nom" id="nom" placeholder="Nom*" class="comment-input input-style" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <input type="email" name="email" id="email" placeholder="Email*" class="comment-input input-style" required>
                                <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                                <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                            </div>
                        </div>
                        <textarea rows="6" name="message" id="message" class="comment-input input-style" placeholder="Message"></textarea>
                        <button type="submit" name="submit" class="comment-submit" style="text-transform: inherit !important;font-weight: inherit !important;">Commenter</button>
                    </form>
                </div>
                <!-- comment-form -->

            </div>
            <div class="col-lg-4 col-md-12 col-xs-12 sticky-widget">
                <?php include_once "layout/bolg-sidebar.php"; ?>
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>









<?php
require_once 'layout/footer.php';
?>

<script src="<?=$asset?>/plugins/ticker/js/jquery.newsTicker.js"></script>
<script>

$(document).ready(function(){
    $('#formComment').submit(function(e){
        e.preventDefault();
        var value = document.getElementById('formComment');
        var form = new FormData(value);

        $.ajax({
            method: 'post',
            url: '<?=$domaine?>/controller/save.comment.php',
            data: form,
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            success: function(data){
//                alert(data.data_info);
                if(data.data_info == "ok"){
                    $('#message').val('');
                    swal("Commentaire ajouté!", "Votre commentaire a été ajouté avec succès et est en attente d\'aprobation par les administrateurs !", "success");
                }else {
                    $('#message').val('');
                    swal("Impossible!", "Une erreur s\'est produite lors de l\'ajoiut de votre commentaire", "error");
                }
            },
            error: function (error, ajaxOptions, thrownError) {
                alert(error.responseText);
            }
        });
    });

    $('#formRepondre').submit(function(e){
        e.preventDefault();
        var value = document.getElementById('formRepondre');
        var form = new FormData(value);

        $.ajax({
            method: 'post',
            url: '<?=$domaine?>/controller/save.reponse.php',
            data: form,
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            success: function(data){
//                alert(data.data_info);
                if(data.data_info == "ok"){
                    $('#messageR').val('');
                    swal("Réponse ajoutée!", "Votre réponse a été ajouté avec succès et est en attente d\'aprobation par les administrateurs !", "success")
                }else {
                    $('#message').val('');
                    swal("Impossible!", "Une erreur s\'est produite lors de l\'ajoiut de votre réponse", "error");
                }
            },
            error: function (error, ajaxOptions, thrownError) {
                alert(error.responseText);
            }
        });
    });
    $('#formRepondreR').submit(function(e){
        e.preventDefault();
        var value = document.getElementById('formRepondreR');
        var form = new FormData(value);

        $.ajax({
            method: 'post',
            url: '<?=$domaine?>/controller/save.reponse.php',
            data: form,
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            success: function(data){
//                alert(data.data_info);
                if(data.data_info == "ok"){
                    $('#messageR').val('');
                    swal("Réponse ajoutée!", "Votre réponse a été ajouté avec succès et est en attente d\'aprobation par les administrateurs !", "success")
                }else {
                    $('#message').val('');
                    swal("Impossible!", "Une erreur s\'est produite lors de l\'ajoiut de votre réponse", "error");
                }
            },
            error: function (error, ajaxOptions, thrownError) {
                alert(error.responseText);
            }
        });
    });
});





    var nt_example2 = $('#nt-example2').newsTicker({
        row_height: 60,
        max_rows: 1,
        speed: 300,
        duration: 6000,
        prevButton: $('#nt-example2-prev'),
        nextButton: $('#nt-example2-next'),
        hasMoved: function() {
            $('#nt-example2-infos-container').fadeOut(200, function(){
                $('#nt-example2-infos .infos-hour').text($('#nt-example2 li:first span').text());
                $('#nt-example2-infos .infos-text').text($('#nt-example2 li:first').data('infos'));
                $(this).fadeIn(400);
            });
        },
        pause: function() {
            $('#nt-example2 li i').removeClass('fa-play').addClass('fa-pause');
        },
        unpause: function() {
            $('#nt-example2 li i').removeClass('fa-pause').addClass('fa-play');
        }
    });
    $('#nt-example2-infos').hover(function() {
        nt_example2.newsTicker('pause');
    }, function() {
        nt_example2.newsTicker('unpause');
    });
    var state = 'stopped';
    var speed;
    var add;



</script>