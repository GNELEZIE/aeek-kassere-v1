<?php
$listes = $article->getHomeAllArticle();
require_once 'layout/header.php';
?>

    <section class="banner banner-two">
        <ul class="cb-slideshow">
            <li>
                <span>
                    <img src="<?=$asset?>/media/sl1.jpg" alt="thumb" style="width: 100%;height: 100%;">
                </span>
                <div></div>
            </li>
            <li>
                <span>
                  <img src="<?=$asset?>/media/sl.jpg" alt="thumb" style="width: 100%;height: 100%;">
                </span>
                <div></div>
            </li>
            <li>
                <span>
                  <img src="<?=$asset?>/media/sl2.jpg" alt="thumb" style="width: 100%;height: 100%;">
                </span>
                <div></div>
         </li>
        </ul>
        <div class="banner-overlay">
            <div class="banner-content p-3"><h2><span class="bg-orange p-2 mb-3">Sortie détente 2022 deuxième édition</span></h2>
                <ul class="mt-4">
                    <li><span class="flaticon-tool"></span>Le 19 Juin 2022</li>
                    <li><span class="flaticon-signs"></span>Plage de Jacqueville</li>
                </ul>
            </div>
        </div>
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
                        <p>Phoslorescently ntiate principle-centered networks via magnetic services a
                            Entusiastically streamline fullys tested metrics without freproof web services enabled
                            experiences bricks clicks are aparadigms Rapidiously evisculate standards compliant web
                            services are afor error-free Assertively engineer are Rapidiously evisculate standards
                            compliant fullys tested metrics without futureproof web services an fullys testedscu
                            compliant fullys tested metrics without futureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                           webfutureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                            metrics without futureproof webfutureproof web services an fullys tested
                        </p>
                        <ul class="about-button">
                            <li><a href="#" class="default-button btn-green-transparent">En savoir plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- container -->
    </section>
    <section class="home-blog home-blog-10 side-image2" style="background-color: #f7fbff !important;">
        <div class="container p-5">
            <div class="row">
                <div class="section-header style2">
                    <h3>Notre actualité</h3>
                    <p>Synergistically Visualize Competitive Action Ttems For Open Source Opportunities Professionaly
                        Develop Vertical Oportunities Rather Than</p>
                </div>

                <div class="section-wrapper row">
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
                        <div class="col-lg-4">
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
                                        <h4><a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="font-20"  style="text-transform: initial !important;"><?=reduit_text(html_entity_decode(stripslashes($dat['titre'])),'20');?></a></h4>
                                        <div class="cont">
                                            <?=reduit_text(html_entity_decode(stripslashes($dat['description'])),'250');?>
                                        </div>
                                        <a href="<?=$domaine?>/show/<?=$dat['slug']?>" class="btn-transparence-orange" style="padding: 10px 18px !important;">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                   <div class="read text-center">
                       <a href="<?=$domaine?>/blog" class="btn-green-transparent p-3" style="padding: 12px 44px !important; border-radius: 3px;">Lire plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                   </div>

                </div>
            </div>
        </div>
    </section>


    <section class="multi-gallery-section style2 padding-120">
        <div class="container">
            <div class="row">
                <div class="section-header style2">
                    <h3>La Gallerie de nos evenements</h3>
                    <p>Synergistically Visualize Competitive Action Ttems For Open Source Opportunities Professionaly
                        Develop Vertical Oportunities Rather Than</p>
                </div>
                <div class="section-wrapper row">
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <span></span>
                            <div class="gallery-item-inner">
                                <div class="gallery-thumb">
                                    <img src="<?=$asset?>/images/12-09-18/photo-gallery/image1.jpg" alt="image">
                                    <div class="gallery-thumb-ovarlay"></div>
                                    <a href="" class="gallery-icon">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="gallery-title">
                                    <h4>Theater Conference 2014</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <span></span>
                            <div class="gallery-item-inner">
                                <div class="gallery-thumb">
                                    <img src="<?=$asset?>/images/12-09-18/photo-gallery/image2.jpg" alt="image">
                                    <div class="gallery-thumb-ovarlay"></div>
                                    <a href="" class="gallery-icon">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="gallery-title">
                                    <h4>Business Conference 2015</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <span></span>
                            <div class="gallery-item-inner">
                                <div class="gallery-thumb">
                                    <img src="<?=$asset?>/images/12-09-18/photo-gallery/image3.jpg" alt="image">
                                    <div class="gallery-thumb-ovarlay"></div>
                                    <a href="" class="gallery-icon">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="gallery-title">
                                    <h4>Music Fastival 2016</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <span></span>
                            <div class="gallery-item-inner">
                                <div class="gallery-thumb">
                                    <img src="<?=$asset?>/images/12-09-18/photo-gallery/image4.jpg" alt="image">
                                    <div class="gallery-thumb-ovarlay"></div>
                                    <a href="" class="gallery-icon">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="gallery-title">
                                    <h4>Wedding Ceremony 2021</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <span></span>
                            <div class="gallery-item-inner">
                                <div class="gallery-thumb">
                                    <img src="<?=$asset?>/images/12-09-18/photo-gallery/image5.jpg" alt="image">
                                    <div class="gallery-thumb-ovarlay"></div>
                                    <a href="" class="gallery-icon">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="gallery-title">
                                    <h4>Sports Conference 2021</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <span></span>
                            <div class="gallery-item-inner">
                                <div class="gallery-thumb">
                                    <img src="<?=$asset?>/images/12-09-18/photo-gallery/image6.jpg" alt="image">
                                    <div class="gallery-thumb-ovarlay"></div>
                                    <a href="" class="gallery-icon">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="gallery-title">
                                    <h4>Travel Conference 2021</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="speakers speakers-two padding-120">
        <div class="container">
            <div class="section-header text-center">
                <h3>Membres du bureau</h3>
                <p><em>Quickly harness dynamic thinking through value added models.</em></p>
            </div>
            <div class="speaker-items">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">robot smith</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">janaton smith</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">WILLIAM JOHN</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">Raisen Aero</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">Raisen Aero</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">robot smith</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">janaton smith</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="speaker-item">
                            <div class="speaker-image">
                                <img src="<?=$asset?>/media/me.jpg" alt="speaker image"
                                     class="img-responsive">
                            </div>
                            <!-- speaker-image -->
                            <div class="speaker-content">
                                <span class="icon"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <div class="details">
                                    <h4><a href="speaker-details.html">WILLIAM JOHN</a></h4>
                                    <span>Founder</span>
                                </div>
                            </div>
                            <!-- speaker-content -->
                        </div>
                        <!-- speaker-item -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- speaker-items -->
        </div>
        <!-- container -->
    </section>

<?php
require_once 'layout/footer.php';
?>