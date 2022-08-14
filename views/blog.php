<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}

$vus = $compter->compter_visite();

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
                    <h4><a href="<?=$domaine?>/show/<?=$data['slug']?>"><?=reduit_text(html_entity_decode(stripslashes($data['titre'])),'70');?></a></h4>
                    <div class="cont pt-3"> <?=reduit_text(html_entity_decode(stripslashes($data['description'])),'500');?></div>
                    <div class="read"><a href="<?=$domaine?>/show/<?=$data['slug']?>" class="btn-transparence-orange" style="border-radius: 3px; padding: 10px 20px;">Lire la suite <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>


<div class="text-center">
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
    var nt_example1 = $('#flash-infos').newsTicker({
        row_height: 80,
        max_rows: 3,
        duration: 4000,
        prevButton: $('#nt-example1-prev'),
        nextButton: $('#nt-example1-next')
    });
</script>