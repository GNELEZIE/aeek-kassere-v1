<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}

if(isset($doc[1]) and !isset($doc[2])) {

    $list = $article->getArticleBySlug($doc[1]);
    $listeNbr = $article->getArticleBySlugNbr($doc[1])->fetch();

    if ($data = $list->fetch()){
        $authors = $admin->getAdminById($data['user_id'])->fetch();
        $comments = $comment->getCommentById($data['id_article']);
        $comm = $comment->getCommentBSyId($data['id_article']);
        $commentsNb = $comment->getCommentByIdNb($data['id_article'])->fetch();
        if($nbCom = $comm->fetch()){
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
}else{
    if(isset($_GET['page']) and is_numeric($_GET['page'])){
        $numPage = $_GET['page'];
        $fin = 6 * $numPage;
        $debut = $fin - 6;
    }else{
        $numPage = 1;
        $debut = 0;
        $fin = 6;
    }

    $res = $article->getAllNbrArticle();

    if($nbre = $res->fetch()){
        $pages = ceil($nbre['nb']/6);
    }else{
        $pages = 1;
    }
    $pagination_list = '';
    $myPage = '/blog';
    $liste = $article->getAllNbrArticles($debut,$fin);
}


$vus = $compter->compter_visite();

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;

require_once 'layout/header.php';
?>
<section class="banner banner-blog banner-five">
    <div class="banner-overlay"></div>

    <div class="p-3 text-center position-text"><h2><span class="bg-orange px-3 mb-3 text-white"> Actualité</span></h2>
    </div>
</section>
<section class="page-header">
    <div class="container">
        <div class="content">
            <h4>Pongala info</h4>
            <ul>
                <li><span><i class="fa fa-home" aria-hidden="true"></i></span> <a href="<?=$domaine?>">Acceuil</a>
                    <span>|</span></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-page padding-120" style="background-color: #fafafa !important;">
<div class="container">
<div class="row">
<?php
if(isset($doc[1]) and !isset($doc[2])) {
    ?>
    <div class="col-lg-8 col-md-12 col-xs-12 sticky-widget">
        <div class="blog-item single">
            <div class="image wow bounceInUp center">
                <img src="<?=$domaine?>/uploads/<?=$data['couverture'];?>" alt="Blog image" class="img-responsive">
            </div>
            <!-- image -->
            <div class="blog-content wow bounceInUp center">
                <div>
                    <ul class="post-meta">
                        <li><a href="#"><span><?=(date('N', strtotime($data['date_article'])))?></span><?=month_fr(date('m', strtotime($data['date_article']))).','.date('Y', strtotime($data['date_article']))?></a></li>
                        <li><span class="icon flaticon-user"></span><a href="#">Par <?=$authors['nom']?></a></li>
                        <!--                            <li><span class="icon flaticon-like"></span><a href="#">12 Like</a></li>-->
                        <li><span class="icon flaticon-chat"></span>
                            <a href="<?=$domaine?>/blog/<?=$data['slug']?>">
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
            <div class="post-bottom wow bounceInUp center">
                <ul class="tags">
                    <li><span style="text-transform: inherit !important;">Tags :</span></li>
                    <?php
                    $artTg = $article_tags->getArticle_tagsByArtId($data['id_article']);
                    while($artT = $artTg->fetch()) {
                        $tags = $tag->getitagById($artT['tag_id'])->fetch();
                        ?>
                        <li><a href="#" style="background: #ffa5003b; color: #ff6809; border-radius: 6px; padding: 5px; margin: 5px;"><?=$tags['nom'];?></a></li>
                    <?php
                    }
                    ?>


                </ul>
                <ul class="share event-social wow bounceInUp center">
                    <!--                        <li><span style="text-transform: inherit !important;">12 Like :</span></li>-->
                    <li><span>Partager :</span></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://wa.me/002250546859936?text=<?=$data['slug']?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- blog item -->

        <div class="comments"  id="refresComt">
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
                    <li class="comment-item wow ">
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
                                                <div class="col-md-12">
                                                    <input type="text" name="nomR" id="nomR" placeholder="Nom é Prénom" class="comment-input input-style" required>
                                                    <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                                                    <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                                                    <input type="hidden" class="form-control " name="com_id" id="com_id" value="<?=$com['id_comment']?>">
                                                </div>
                                            </div>
                                            <textarea rows="3" name="messageR" id="messageR" class="comment-input input-style" placeholder="Message"></textarea>
                                            <button type="submit" name="submit" class="comment-submit btn-transparence-orange mb-3" style="text-transform: inherit !important;font-weight: inherit !important;"> <i class="loadRepondre"></i> Répondre</button>
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
                                                        <button type="submit" name="submit" class="comment-submit btn-transparence-orange mb-3" style="text-transform: inherit !important;font-weight: inherit !important;"> <i class="load"></i> Répondre</button>
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
        <div class="comment-form wow bounceInUp center">
            <h4>Commenter</h4>

            <form method="post" id="formComment">
                <div class="succes"></div>
                <div class="erros"></div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="nom" id="nom" placeholder="Nom & Prénom" class="comment-input input-style" required>
                        <input type="hidden" class="form-control " name="formkey" value="<?= $token ?>">
                        <input type="hidden" class="form-control " name="article_id" value="<?= $data['id_article'] ?>">
                    </div>
                </div>
                <textarea rows="6" name="message" id="message" class="comment-input input-style" placeholder="Message"></textarea>
                <button type="submit" name="submit" class="comment-submit" style="text-transform: inherit !important;font-weight: inherit !important;"> <i class="loadComment"></i> Commenter</button>
            </form>
        </div>
        <!-- comment-form -->

    </div>
<?php
}else{
    ?>
    <div class="col-lg-8 col-md-12 col-xs-12 sticky-widget">
    <?php
    while($data = $liste->fetch()){
        $authors = $admin->getAdminById($data['user_id'])->fetch();
        $commentExiste = $comment->getCommentById($data['id_article']);
        if($nbCom = $commentExiste->fetch()){
            $nbComments = $comment->nbComment($data['id_article'])->fetch();
            $nbCom = $comment->getCommentByIdNb($data['id_article'])->fetch();
            $nbRepon = $reponse->nbReponses($nbCom['id_comment']);
            if($nbReponses = $nbRepon->fetch()) {
                $nbreps = $nbReponses['nb'];
            }else{
                $nbreps = 0;
            }
            $nbrComt = $nbComments['nb'] + $nbreps ;
        }else{
            $nbrComt = 0;
        }

        ?>
        <div class="blog-item wow bounceInUp center">
            <div class="image">
                <a href="<?=$domaine?>/blog/<?=$data['slug']?>"><img src="<?=$domaine?>/uploads/<?=$data['couverture'];?>" alt="Blog image" class="img-responsive"></a>
            </div>
            <div class="blog-content">
                <div>
                    <ul class="post-meta">
                        <li><a href="#"><span><?=(date('N', strtotime($data['date_article'])))?></span><?=month_fr(date('m', strtotime($data['date_article']))).','.date('Y', strtotime($data['date_article']))?></a></li>
                        <li><span class="icon flaticon-user"></span><a href="#">Par <?=$authors['nom']?></a></li>
                        <!--                    <li><span class="icon flaticon-like"></span><a href="#">12 Like</a></li>-->
                        <li><span class="icon flaticon-chat"></span>
                            <a href="<?=$domaine?>/blog/<?=$data['slug']?>">
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
                    <div class="content">
                        <h4><a href="<?=$domaine?>/show/<?=$data['slug']?>"><?=reduit_text(html_entity_decode(stripslashes($data['titre'])),'70');?></a></h4>
                        <div class="cont pt-3"> <?=reduit_text(html_entity_decode(stripslashes($data['description'])),'500');?></div>
                        <div class="read"><a href="<?=$domaine?>/blog/<?=$data['slug']?>" class="btn-transparence-orange" style="border-radius: 3px; padding: 10px 20px;">Lire la suite <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


    <div class="text-center wow bounceInUp center">
        <ul class="pagination" style="display: inherit !important;">
            <?php
            if(isset($_GET['page']) and is_numeric($_GET['page'])){
                if($pages < 2 ){
                    $pagination_list = '
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0)"  class="active">1</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                }else{
                    if($_GET['page'] > 1 ){
                        $prec = $_GET['page']-1;
                        $pagination_list .= '
                                           <li> <a href="'.$domaine.$myPage.'?page='.$prec.'"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                    }else{
                        $prec = 1;
                        $pagination_list .= '
                                           <li><a href="javascript:void(0)" style="cursor: not-allowed"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                    }

                    if($pages > 5){
                        for($i = 1; $i <= $pages ; $i++){
                            if($_GET['page'] > 2){
                                if($i > $_GET['page']-2 and $i < $_GET['page']+2){
                                    if($i != $pages){
                                        if($i == $_GET['page']){
                                            $pagination_list .='
                                                                 <li class="active"><a href="javascript:void(0)">'.$i.'</a></li>
                                                            ';
                                        }else{
                                            if($i < 3){
                                                $pagination_list .='
                                                                 <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                            ';
                                            }else{
                                                $pagination_list .='
                                                                 <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                            ';
                                            }
                                        }
                                    }
                                }
                            }else{
                                if($i < 6){
                                    if($i == $_GET['page']){
                                        $pagination_list .='
                                                             <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                        ';
                                    }else{
                                        if($i < 3){
                                            $pagination_list .='
                                                             <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                        }else{
                                            $pagination_list .='
                                                             <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                        }
                                    }
                                }
                            }
                        }
                        if($_GET['page'] < $pages-2){
                            $pagination_list .='
                                                    <li class="hidden-xs"><a href="javascript:void(0)">...</a></li>
                                                ';
                        }
                        if($_GET['page'] == $pages){
                            $pagination_list .='
                                                    <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                ';
                        }else{
                            $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$pages.'">'.$pages.'</a></li>
                                                ';
                        }
                    }else{
                        for($i = 1; $i <= $pages ; $i++){
                            if($i == $_GET['page']){
                                $pagination_list .='
                                                        <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                ';
                            }else{
                                if($i < 3){
                                    $pagination_list .='
                                                    <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                ';
                                }else{
                                    $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                ';
                                }
                            }
                        }
                    }

                    if($_GET['page'] < $pages ){
                        $suiv = $_GET['page']+1;
                        $pagination_list .= '
                                            <li><a href="'.$domaine.$myPage.'?page='.$suiv.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                    }else{
                        $suiv = $pages;
                        $pagination_list .= '
                                            <li><a href="javascript:void(0)" style="cursor: not-allowed"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                    }

                }
            }else{
                if($pages < 2 ){
                    $pagination_list = '
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                            <li><a href="javascript:void(0)"  class="active">1</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                }else{
                    $pagination_list .= '
                                            <li><a href="javascript:void(0)" style="cursor: not-allowed"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                                        ';
                    if($pages > 5){
                        for($i = 1; $i <= $pages ; $i++){
                            if($i < 6){
                                if($i == 1){
                                    $pagination_list .='
                                                            <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                        ';
                                }else{
                                    if($i < 3){
                                        $pagination_list .='
                                                            <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                    }else{
                                        $pagination_list .='
                                                            <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                        ';
                                    }
                                }
                            }
                        }
                        $pagination_list .='
                                                    <li class="hidden-xs"><a href="javascript:void(0)">...</a></li>
                                            ';
                        $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$pages.'">'.$pages.'</a></li>
                                            ';
                    }else{
                        for($i = 1; $i <= $pages ; $i++){
                            if($i == 1){
                                $pagination_list .='
                                                        <li><a href="javascript:void(0)"  class="active">'.$i.'</a></li>
                                                    ';
                            }else{
                                if($i < 3){
                                    $pagination_list .='
                                                    <li><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                    ';
                                }else{
                                    $pagination_list .='
                                                    <li class="hidden-xs"><a href="'.$domaine.$myPage.'?page='.$i.'">'.$i.'</a></li>
                                                    ';
                                }
                            }
                        }
                    }
                    $pagination_list .= '
                                            <li><a href="'.$domaine.$myPage.'?page='.(1+1).'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                                        ';
                }
            }
            ?>
            <?=$pagination_list?>
        </ul>
    </div>

    </div>
<?php
}
?>







<div class="col-md-4 sticky-widget">
    <?php include_once "layout/bolg-sidebar.php"; ?>
</div>
</div>

</div>
</section>

















<?php
require_once 'layout/footer.php';
?>
<script src="<?=$asset?>/plugins/ticker/js/jquery.newsTicker.js"></script>
<script>
    $(document).ready(function(){
        var nt_example1 = $('#flash-infos').newsTicker({
            row_height: 80,
            max_rows: 3,
            duration: 4000,
            prevButton: $('#nt-example1-prev'),
            nextButton: $('#nt-example1-next')
        });

        $('#formComment').submit(function(e){
            e.preventDefault();
            $('.loadComment').html('<i class="loader-btn"></i>');
            var value = document.getElementById('formComment');
            var form = new FormData(value);

            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/save.comment',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                dataType: 'json',
                success: function(data){
//                alert(data.data_info);
                    if(data.data_info == "ok"){
                        $('#message').val('');
                        $('.loadComment').html('');
                        swal("Commentaire ajouté!", "Votre commentaire a été ajouté avec succès !", "success");
                        $("#refresComt").load(window.location.href + " #refresComt" );
                    }else {
                        $('#message').val('');
                        $('.loadComment').html('');
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
            $('.loadRepondre').html('<i class="loader-btn"></i>');
            var value = document.getElementById('formRepondre');
            var form = new FormData(value);

            $.ajax({
                method: 'post',
                url: '<?=$domaine?>/controle/save.reponse',
                data: form,
                contentType:false,
                cache:false,
                processData:false,
                dataType: 'json',
                success: function(data){
//                alert(data.data_info);
                    if(data.data_info == "ok"){
                        $("#rep").load(location.href + " #rep");
                        $('#messageR').val('');
                        $('.loadRepondre').html('');
                        swal("Réponse ajoutée!", "Votre réponse a été ajouté avec succès !", "success")
                        $("#refresComt").load(window.location.href + " #refresComt" );
                    }else {
                        $('#message').val('');
                        $('.loadRepondre').html('');
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
            $('.load').html('<i class="loader-btn"></i>');
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
                        $("#rep").load(location.href + " #rep");
                        $('#messageR').val('');
                        $('.load').html('');
                        swal("Réponse ajoutée!", "Votre réponse a été ajouté avec succès !", "success")
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
</script>