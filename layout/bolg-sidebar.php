<?php
$sideArticle = $article->getAllArticleSide();
$categ = $categorie->getAllCategorie();
$lastArticl = $article->getLastArticleSide();
if($lastArticle = $lastArticl->fetch()){
    $lastArticles = reduit_text(html_entity_decode(stripslashes($lastArticle['description'])),'500','...');
}else{
    $lastArticles ='';
}
?>
<div class="sidebar">
    <div class="sidebar-item">
        <h4 class="sidebar-title pt-3">Flash info</h4>

        <div id="nt-example2-container m-3">
            <div id="flash-infos-container">
                <!--            <i class="fa fa-arrow-up" id="flash-infos-prev"></i>-->
                <ul id="flash-infos">
                    <?php

                    while($results = $sideArticle->fetch()){
                        $inf = reduit_text(html_entity_decode(stripslashes($results['titre'])),'50','...');
                        ?>
                        <li>
                            <div class="heure-box text-center">
                                <span class="font-10"><?= date_fr($results['date_article']).'| '.time_fr($results['date_article']) ?></span>
                            </div>
                            <div class="infos-bars">
                                <?=$inf?><a href="<?=$domaine?>/show/<?=$results['slug']?>" style="color: #ff4500"> Voir plus...</a>
                            </div>
                            <div class="text-center bar"></div>
                        </li>
                    <?php
                    }
                    //                ?>
                </ul>
                <!--            <i class="fa fa-arrow-down" id="flash-infos-next"></i>-->
            </div>
        </div>
    </div>
    <div class="sidebar-item">
        <?php
        //setcookie('confirm','oui',time()+3600,'/',false,true,true);
        $inputSearch = '';
        if(isset($_GET['search'])){
            $inputSearch = $_GET['search'];
        }
        ?>
        <form method="get" action="<?=$domaine?>/recherche">
            <input type="text" name="search" value="<?=$inputSearch?>" placeholder="Recherche..." style="border-right:6px !important;">
            <button style="background: #040404;color: #fff;important;font-size: 16px;border-radius: 0 6px 6px 0;"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
    <div class="sidebar-item">
        <h4 class="sidebar-title pt-3">Catégories</h4>
        <ul class="categores">
            <?php
            while($category = $categ->fetch()){
                $nbCat = $article->getNbrCatByArticle($category['id_categorie'])->fetch();
                ?>
                <li>
                    <a href="<?=$domaine?>/categorie/<?=$category['slug']?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?=html_entity_decode(stripslashes($category['nom']))?></a>
                    <span><?=$nbCat['nb']?></span>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
    <div class="sidebar-item">
        <h4 class="sidebar-title pt-3">Articles récents</h4>

        <div class="latest-posts">
            <?php
            $sideArt = $article->getCinqArticle();
            while($cinqArticle = $sideArt->fetch()){
                ?>
                <div class="blog-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <a href="<?=$domaine?>/show/<?=$cinqArticle['slug']?>"><img src="<?=$domaine?>/uploads/<?=$cinqArticle['couverture'];?>" alt="Blog image" class="img-responsive" style="object-fit: cover;height: 65px;"> </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="content">
                                <h4><a href="<?=$domaine?>/show/<?=$cinqArticle['slug']?>" class="font-15"><?=reduit_text(html_entity_decode(stripslashes($cinqArticle['titre'])),'40')?></a></h4>
                                <ul>
                                    <li><a href="<?=$domaine?>/show/<?=$cinqArticle['slug']?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=date_lettre($cinqArticle['date_article'])?> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
    <!--<div class="sidebar-item">-->
    <!--    <h4 class="sidebar-title pt-3">Tags populaires</h4>-->
    <!---->
    <!--    <ul class="tags">-->
    <!--        <li><a href="#">children</a></li>-->
    <!--        <li><a href="#">school</a></li>-->
    <!--        <li><a href="#">shop</a></li>-->
    <!--        <li><a href="#">water</a></li>-->
    <!--        <li><a href="#">charity</a></li>-->
    <!--        <li><a href="#">heaven</a></li>-->
    <!--        <li><a href="#">Blog</a></li>-->
    <!--        <li><a href="#">Contant</a></li>-->
    <!--        <li><a href="#">Design</a></li>-->
    <!--    </ul>-->
    <!---->
    <!--</div>-->
</div>