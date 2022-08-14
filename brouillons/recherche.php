<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}



if(isset($_GET['page']) and is_numeric($_GET['page'])){
    $numPage = $_GET['page'];
    $fin = 4 * $numPage;
    $debut = $fin - 4;
}else{
    $numPage = 1;
    $debut = 0;
    $fin = 4;
}
$search = htmlentities(trim(addslashes(strip_tags($_GET['search']))));
$res = $article->getArticleBySearchNbr($search);

if($nbre = $res->fetch()){
    $pages = $nbre['nb']/4;
}else{
    $pages = 1;
}
$myPage = '/blog';
$liste = $article->getArticleBySearch($search);


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
            <h4>Resultat pour : <span class="font-weight-normal"><?=$_GET['search']?></span></h4>
            <ul>
                <li><span><i class="fa fa-home" aria-hidden="true"></i></span> <a href="<?=$domaine?>">Acceuil</a>
                    <span>|</span></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-page padding-120">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-12 col-xs-12 sticky-widget">

    <?php
    while($data = $liste->fetch()){
    $authors = $admin->getAdminById($data['user_id'])->fetch();
        $nbComments = $comment->nbComment($data['id_article'])->fetch();
        $nbCom = $comment->getCommentByIdNb($data['id_article'])->fetch();
        $nbRepon = $reponse->nbReponses($nbCom['id_comment']);
      if($nbReponses = $nbRepon->fetch()) {
          $nbreps = $nbReponses['nb'];
      }else{
          $nbreps = 0;
      }
        $nbrComt = $nbComments['nb'] + $nbreps ;
    ?>
        <div class="blog-item">
            <div class="image">
                <a href="<?=$domaine?>/show/<?=$data['slug']?>"><img src="<?=$domaine?>/uploads/<?=$data['couverture'];?>" alt="Blog image" class="img-responsive"></a>
            </div>
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
                    <div class="content">
                        <h4><a href="<?=$domaine?>/show/<?=$data['slug']?>"><?=html_entity_decode(stripslashes($data['titre']));?></a></h4>
                      <div class="cont pt-3"> <?=reduit_text(html_entity_decode(stripslashes($data['description'])),'500');?></div>
                        <a href="<?=$domaine?>/show/<?=$data['slug']?>" class="default-button">Lire la suite</a>
                    </div>
                </div>
            </div>
        </div>
    <?php

    }
    ?>


    <div class="text-center">
        <ul class="pagination">
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


<!--    <ul class="pagination">-->
<!--        <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>-->
<!--        <li><a href="#">1</a></li>-->
<!--        <li><a href="#">2</a></li>-->
<!--        <li><a href="#">3</a></li>-->
<!--        <li><a href="#"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a></li>-->
<!--        <li><a href="#">10</a></li>-->
<!--        <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>-->
<!--    </ul>-->









</div>
<div class="col-lg-4 col-md-12 col-xs-12 sticky-widget">
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