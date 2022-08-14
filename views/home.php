<?php

$listes = $article->getHomeAllArticle();
$vus = $compter->compter_visite();
$team = $admin->getAllAdmin();
require_once 'layout/header.php';
?>

    <section class=" banner-two">

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
                        <img src="<?=$domaine?>/uploads/<?=$ban['photo']?>" class="d-block w-100 animate__animated animate__lightSpeedInRight" alt="...">
                        <div class="carousel-caption d-md-block">
                            <h1 class="font-40 animate__animated animate__zoomIn mb-3" style="background: #ff4600; padding: 10px 20px;line-height:1.5;"> <span ><?=html_entity_decode(stripslashes($ban['titre']))?></span> </h1>
                            <p class="text-white font-30 pt-3 animate__animated animate__slideInUp"><?=html_entity_decode(stripslashes($ban['sous_titre']))?></p>
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

        <!--
                            <div class="banner-overlay"></div>

        >-->

    </section>


    <!--    <section class="banner banner-11">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
    <!--                <div class="banner-flex">-->
    <!--                    <div class="right-content">-->
    <!--                        <img src="--><?//=$asset?><!--/images/12-09-18/banner-home.png" alt="banner image">-->
    <!--                    </div>-->
    <!--                    <div class="left-content text-center">-->
    <!---->
    <!--                        <h2 class="title1 font-50 line-height-1-5">Sortie detente 2022</h2>-->
    <!--                        <h2 class="title2 font-45 line-height-1-5">Deuxième édition</h2>-->
    <!--                        <h2 class="title3 font-30 line-height-1-5">le 19  juin à jacqueville</h2>-->
    <!--                        <h2 class="title4 font-30 line-height-1-5">Il reste <span>35 </span>places</h2>-->
    <!--                        <a href="#" class="custom-btn">Inscription toi</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->

    <section class="about about-two py-5" style="background: rgba(232, 246, 255, 0.69)">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="image">
                        <img src="<?=$asset?>/media/aeek-2.jpeg" alt="about iamge" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <div class="section-header">
                            <h2>A propos</h2>
                            <p><em>L'Association des Elèves et Etudiants de Kasséré(AEEK)</em></p>
                        </div>
                        <p class="text-justify">Phoslorescently ntiate principle-centered networks via magnetic services a
                            Entusiastically streamline fullys tested metrics without freproof web services enabled
                            experiences bricks clicks are aparadigms Rapidiously evisculate standards compliant web
                            services are afor error-free Assertively engineer are Rapidiously evisculate standards
                            compliant fullys tested metrics without futureproof web services an fullys testedscu
                            compliant fullys tested metrics without futureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested


                        </p>
                        <ul class="about-button">
                            <li><a href="#" class="default-button btn-green-transparent" style="padding: 7px 13px !important;">En savoir plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- container -->
    </section>
    <section class="home-blog home-blog-10 side-image2" style="background-color: #f7fbff !important;">
        <div class="container p-5 padd-home">
            <div class="row">
                <div class="col-md-12 text-center pb-3">
                    <h3>Notre actualité</h3>
                </div>
                <?php

                while($dat = $listes->fetch()){
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
                    <div class="col-md-4">
                        <div class="blog-item">
                            <div class="blog-thumb">
                                <a href="<?=$domaine?>/show/<?=$dat['slug']?>"><img src="<?=$domaine?>/uploads/<?=$dat['couverture'];?>" style="object-fit: cover; height: 250px;" alt="thumb"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="meta-post style2">
                                    <li><img src="<?=$asset?>/images/12-09-18/blog/icon/share.png" alt="icon">
                                        <ul class="social-media-list">
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><img src="<?=$asset?>/images/12-09-18/blog/icon/comment.png" alt="icon"><span><?=$nbrComt?></span></li>
                                    <li><img src="<?=$asset?>/images/12-09-18/blog/icon/heart.png" alt="icon"><span>25</span></li>
                                </ul>
                                <div class="content-part">
                                    <h4><a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="font-17"  style="text-transform: initial !important;"><?=reduit_text(html_entity_decode(stripslashes($dat['titre'])),'27');?></a></h4>
                                    <div class="param">
                                        <?=reduit_text(html_entity_decode(stripslashes($dat['description'])),'250','...');?>
                                    </div>
                                    <div class="link pt-3">
                                        <a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="btn-transparence-orange" style="padding: 10px 18px !important;">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
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
                        <a href="<?=$domaine?>/blog" class="btn-green-transparent p-3" style="padding: 12px 44px !important; border-radius: 3px;">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="multi-gallery-section style2 padding-120 top-home">
        <div class="container">
            <div class="row">
                <div class="section-header style2">
                    <h3>La Gallerie de nos evenements</h3>

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
                            <div class="gallery-item">
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
                        <a href="<?=$domaine?>/events" class="btn-transparence-orange" style="padding: 10px 18px !important;">Voir plus d'evènements <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="speakers speakers-two padding-120" style="background: #e8f6ff73 !important;">
        <div class="container">
            <div class="section ourTeam">
                <div class="section-header style2">
                    <h3>Notre équipe</h3>
                </div>

                <div class="row">

                    <?php
                    while($teamData = $team->fetch()){
                        ?>
                        <div class="col-md-3 i">
                            <div class="c text-center teamBox">
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

<?php
require_once 'layout/footer.php';
?>