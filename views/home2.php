<?php

$lisPropos = $propos->getAllpropos();
$listes = $article->getHomeAllArticle();
$artNb = $article->getAllNbrArticle();
$vus = $compter->compter_visite();
$team = $admin->getAllAdmin();
require_once 'layout/header.php';
?>

    <section class="banner-two" id="wrap-slid">
        <div id="carouselExampleCaptions" class="carousel slide h-600" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner h-600">
                <?php
                $list = $banniere->getAllBanniere();
                $counter = 1;
                while($ban = $list->fetch()){

                    ?>
                    <div class="carousel-item h-600 <?php if($counter == 1){echo " active"; } ?>">
                        <img src="<?=$domaine?>/uploads/<?=$ban['photo']?>" class="d-block w-100 w-ban animate__animated animate__lightSpeedInRight" alt="...">
                        <div class="carousel-caption d-md-block">
                            <?php if($ban['titre'] != ''){
                                $titres = '<h1 class="font-40 home-title1 animate__animated animate__zoomIn wow slideInRight"> <span > '.html_entity_decode(stripslashes($ban['titre'])).'</span> </h1>
';
                            }else{
                                $titres = '';
                            }
                            ?>
                            <?=$titres?>
                            <p class="text-white home-title2 font-30 pt-2 animate__animated animate__slideInUp wow slideInLeft"><?=html_entity_decode(stripslashes($ban['sous_titre']))?></p>
                        </div>
                    </div>
                    <?php
                    $counter++;
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="flash">
     <div class="container p-5">
         <div class="row">
             <div class="col-md-12"  style="position: relative;">
                 <div class="up-event-titile">
                     <h3>Événement à venir</h3>
                 </div>
                 <div class="box-flash">
                     <?php
                     $evt = $flash->getHomeFlash();
                     if($flashData = $evt->fetch()){
                     ?>
                     <div class="row ">
                         <div class="col-md-5 p-0" style="position: relative;">
                             <input type="hidden" id="dateEvents" value="<?=$flashData['date_event']?>">
                             <img src="<?=$domaine?>/uploads/<?=$flashData['photo']?>" class="img-flash" alt="Upcoming Event">
                             <h4 class="up-event-date"><?=date_lettre($flashData['date_event'])?></h4>
                         </div>
                         <div class="col-md-7">
                             <div class="display-table">
                                 <div class="display-table-cell">
                                     <div class="up-event-text">
                                         <div class="event-count-sect">
                                             <div class="event-countdown-counter-sec">
                                                 <div class="counter-item">
                                                     <span class="counter-label">Jours</span>
                                                     <span class="single-cont"> <i id="days">00</i> </span>
                                                 </div>
                                                 <div class="counter-item">
                                                     <span class="counter-label">heure</span>
                                                     <span class="single-cont"> <i id="hours">00</i> </span>
                                                 </div>
                                                 <div class="counter-item">
                                                     <span class="counter-label">min</span>
                                                     <span class="single-cont"> <i id="minutes">00</i> </span>
                                                 </div>
                                                 <div class="counter-item">
                                                     <span class="counter-label">S</span>
                                                     <span class="single-cont"> <i id="second"></i> </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <h3 class="py-3"><a href="#"  class="text-white flash-title"><?= html_entity_decode(stripslashes($flashData['titre']))?></a></h3>
                                         <p class="text-white"><?= html_entity_decode(stripslashes($flashData['sous_titre']))?></p>
                                         <a href="<?=$domaine?>/evenement/<?=$flashData['slug']?>" class="btns btn-white py30 font-15">En savoir plus</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <?php
                     }
                     ?>

                 </div>
             </div>
         </div>
     </div>
    </section>


    <section class="home-blog home-blog-10 side-image2" style="background-color: #f7fbff !important;">
        <div class="container p-5 padd-home">
            <div class="row">
                <div class="col-md-12 text-center pb-3">
                    <h3 class="wow bounceInUp center">Notre actualité</h3>
                </div>
                <?php
                if($dat = $listes->fetch()){
                    $commentExiste = $comment->getCommentById($dat['id_article']);
                    if($nbCom = $commentExiste->fetch()){
                        $nbComments = $comment->nbComment($dat['id_article'])->fetch();
                        $nbCom = $comment->getCommentByIdNb($dat['id_article'])->fetch();
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
                    <div class="col-md-6">
                        <div class="blog-item wow bounceInUp center">
                            <div class="blog-thumb">
                                <a href="<?=$domaine?>/show/<?=$dat['slug']?>"><img src="<?=$domaine?>/uploads/<?=$dat['couverture'];?>" style="object-fit: cover; height: 250px;" alt="thumb"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta-post style2">
                                    <li><img src="<?=$asset?>/images/12-09-18/blog/icon/share.png" alt="icon">
                                        <ul class="social-media-list">
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
<!--                                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                                            <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>-->
                                        </ul>
                                    </li>
                                    <li><img src="<?=$asset?>/images/12-09-18/blog/icon/comment.png" alt="icon"><span><?=$nbrComt?></span></li>
<!--                                    <li><img src="--><?//=$asset?><!--/images/12-09-18/blog/icon/heart.png" alt="icon"><span>25</span></li>-->
                                </ul>
                                <div class="content-part">
                                    <h4><a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="font-17 font-bold hover-orange"  style="text-transform: initial !important;"><?=reduit_text(html_entity_decode(stripslashes($dat['titre'])),'40');?></a></h4>
                                    <div class="param">
                                        <?=reduit_text(html_entity_decode(stripslashes($dat['description'])),'250','...');?>
                                    </div>
                                    <div class="link pt-3">
                                        <a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="btn-transparence-orange " style="padding: 10px 18px !important;">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                <?php
                }

                ?><?php
                if($dat = $listes->fetch()){
                    $commentExiste = $comment->getCommentById($dat['id_article']);
                    if($nbCom = $commentExiste->fetch()){
                        $nbComments = $comment->nbComment($dat['id_article'])->fetch();
                        $nbCom = $comment->getCommentByIdNb($dat['id_article'])->fetch();
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
                    <div class="col-md-6">
                        <div class="blog-item wow bounceInUp center">
                            <div class="blog-thumb">
                                <a href="<?=$domaine?>/show/<?=$dat['slug']?>"><img src="<?=$domaine?>/uploads/<?=$dat['couverture'];?>" style="object-fit: cover; height: 250px;" alt="thumb"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta-post style2">
                                    <li><img src="<?=$asset?>/images/12-09-18/blog/icon/share.png" alt="icon">
                                        <ul class="social-media-list">
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
<!--                                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                                            <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>-->
                                        </ul>
                                    </li>
                                    <li><img src="<?=$asset?>/images/12-09-18/blog/icon/comment.png" alt="icon"><span><?=$nbrComt?></span></li>
<!--                                    <li><img src="--><?//=$asset?><!--/images/12-09-18/blog/icon/heart.png" alt="icon"><span>25</span></li>-->
                                </ul>
                                <div class="content-part">
                                    <h4><a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="font-17 font-bold hover-orange"  style="text-transform: initial !important;"><?=reduit_text(html_entity_decode(stripslashes($dat['titre'])),'40');?></a></h4>
                                    <div class="param">
                                        <?=reduit_text(html_entity_decode(stripslashes($dat['description'])),'250','...');?>
                                    </div>
                                    <div class="link pt-3">
                                        <a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="btn-transparence-orange " style="padding: 10px 18px !important;">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                <?php
                }

                ?>
                <div class="col-md-12">
                    <div class="read text-center">
                        <a href="<?=$domaine?>/blog" class="btn-green-transparent p-3 wow slideInLeft" style="padding: 12px 44px !important; border-radius: 3px;">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="multi-gallery-section style2 padding-120 top-home">
        <div class="container">
            <div class="row">
                <div class="section-header style2">
                    <h3 class="wow slideInLeft">La Gallerie de nos evenements</h3>

                </div>
                <div class="section-wrapper row">
                    <?php
                    $listeEven= $events->getSixEvents();
                    while($dataEvent = $listeEven->fetch()) {
                        $gal = $gallerie->getGallerieByIdForHome($dataEvent['id_events']);
                        if($gallerieData = $gal->fetch()){
                            $couver = $gallerieData['photo'];
                        }else{
                            $couver = "gallery.jpg";
                        }
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item wow bounceInUp center">
                                <span></span>

                                <div class="gallery-item-inner">
                                    <div class="gallery-thumb">
                                        <img src="<?=$domaine?>/uploads/<?=$couver;?>" class="gal-home" alt="image">

                                        <div class="gallery-thumb-ovarlay"></div>
                                        <a href="<?=$domaine?>/galerie/<?=$dataEvent['slug'];?>" class="gallery-icon">
                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="gallery-title">
                                        <h4><a href="<?=$domaine?>/galerie/<?=$dataEvent['slug'];?>"><?=html_entity_decode(stripcslashes($dataEvent['nom'])).' '.month_fr(date('m', strtotime($dataEvent['date_events']))).','.date('Y', strtotime($dataEvent['date_events']));?></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-md-12 text-center pt-3">
                        <a href="<?=$domaine?>/events" class="btn-orange wow bounceInUp center radius-6" style="padding: 10px 18px !important;">Voir plus d'evènements <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section id="funfact-area">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="single-funfact-wrap">
                    <div class="funfact-icon">
                        <img src="<?=$asset?>/media/user.svg" alt="Funfact">
                    </div>
                    <div class="funfact-info">
                        <h5 class="funfact-count text-white">
                            <?php
                            $nbUsr = $membre->nbrMmembre();
                            if($nbrMemb = $nbUsr->fetch()){
                                echo $nbrMemb['nb'];
                            }else{
                                echo '';
                            }
                            ?>
                        </h5>
                        <p class="text-white">Membres</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-funfact-wrap">
                    <div class="funfact-icon">
                        <img src="<?=$asset?>/media/picture.svg" alt="Funfact">
                    </div>
                    <div class="funfact-info">
                        <h5 class="funfact-count text-white">
                            <?php
                            $nbGals = $gallerie->nbrGaler();
                            if($nbrGals = $nbGals->fetch()){
                                echo $nbrGals['nb'];
                            }else{
                                echo '';
                            }
                            ?>
                        </h5>
                        <p class="text-white">Nos photos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-funfact-wrap">
                    <div class="funfact-icon">
                        <img src="<?=$asset?>/media/event.svg" alt="Funfact">
                    </div>
                    <div class="funfact-info">
                        <h5><span class="funfact-count text-white">
                                <?php
                                $nbEvt = $events->nbrEvents();
                                if($nbrEvents = $nbEvt->fetch()){
                                    echo $nbrEvents['nb'];
                                }else{
                                    echo '';
                                }
                                ?>
                        </h5>
                        <p class="text-white">Evènements</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="scholership-promo">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-1 text-center">
                <div class="scholership-promo-text">
                    <h2>S'inscrire pour suivre<span> la formation </span> de l'AEEK</h2>
                    <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need academic, relocation, career, projects, mentorship, etc you can ask the community and get </p>
                    <a href="#" class="btns btn-green text-white font-15">S'inscrire maintenant</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="speakers speakers-two padding-120" style="background: #e8f6ff73 !important;">
        <div class="container">
            <div class="section ourTeam">
                <div class="section-header style2">
                    <h3 class="wow slideInRight">Notre équipe</h3>
                </div>

                <div class="row">

                    <?php
                    while($teamData = $team->fetch()){
                        ?>
                        <div class="col-md-3 i">
                            <div class="c text-center teamBox wow slideInLeft">
                                <div class="wrap">
                                    <img src="<?=$domaine?>/uploads/<?=$teamData['photo'];?>" alt="#" class="img-responsive" style="object-fit: cover; height: 248px;">
                                    <div class="info">
                                        <h3 class="name" style="font-size: 20px !important;"><?=html_entity_decode(stripcslashes($teamData['nom'])).' '.html_entity_decode(stripcslashes($teamData['prenom'])) ?></h3>
                                        <h4 class="position"  style="font-size: 17px !important;"><?=html_entity_decode(stripcslashes($teamData['fonction']))?></h4>
                                    </div>
                                </div>
                                <div class="more">
                                    <p><?=html_entity_decode(stripcslashes($teamData['biographie']))?></p>
                                    <div class="socials">
                                        <a href="<?=$teamData['facebook']?>" title="Facebook" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="<?=$teamData['twitter']?>" title="Twitter" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="<?=$teamData['linkedin']?>" title="Linkedin" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        <a href="<?=$teamData['instagram']?>" title="Instagram" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>



                </div>
            </div>
        </div>
    </section>

<?php require_once 'layout/footer.php';?>
<script>
    $(document).ready(function(){
        var dateEvents = $('#dateEvents').val();
        var countDownDate = new Date(dateEvents).getTime();

        var x = setInterval(function() {

            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $("#days").html(days);
            $("#hours").html(hours);
            $("#minutes").html(minutes);
            $("#second").html(seconds);

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    });
</script>