<?php
//if(isset($doc[1])){
//    $return = $doc[0]."/".$doc[1];
//}else{
//    $return = $doc[0];
//}
//
//$vus = $compter->compter_visite();
//
//if(isset($_GET['page']) and is_numeric($_GET['page'])){
//    $numPage = $_GET['page'];
//    $fin = 4 * $numPage;
//    $debut = $fin - 4;
//}else{
//    $numPage = 1;
//    $debut = 0;
//    $fin = 4;
//}
//
//$res = $article->getAllNbrArticle();
//
//if($nbre = $res->fetch()){
//    $pages = $nbre['nb']/4;
//}else{
//    $pages = 1;
//}
//$myPage = '/blog';
//$liste = $article->getAllNbrArticles($debut,$fin);


require_once 'layout/header.php';
?>
<section class="banner banner-blog banner-five">
    <div class="banner-overlay"></div>

    <div class="p-3 text-center position-text"><h2><span class="bg-orange px-3 mb-3 text-white"> Curriculum vitae  </span></h2>
    </div>
</section>
<section class="page-header">
    <div class="container">
        <div class="content">
            <h4>Postulant</h4>
            <ul>
                <li><span><i class="fa fa-home" aria-hidden="true"></i></span> <a href="<?=$domaine?>">Acceuil</a>
                    <span>|</span></li>
                <li>Les cv</li>
            </ul>
        </div>
    </div>
</section>

<div class="container-fluid pb-5"  style="background: rgb(232 246 255 / 31%);">
    <section class="container pt-3">
        <div class="row pt-5 mt-30">
            <div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
<!--                <span class="ribban">New</span>-->
            </div>
            <div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div><div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div><div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div><div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div><div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div><div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div><div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div><div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                <a class="box-card p-3" href="#">
                    <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                        <img src="<?=$asset?>/media/jeune.png" alt="" class="head-icon">
                    </div>
                    <div class="box-card-body text-center">
                        <h3 class="box-card-title pt-1">Auxiliaire en pharmacie</h3>
                        <p class="font-13 pt-2 mb-0">Publie le 02/06/2022 <span>|</span> N'DOUCI <span>|</span> <font color="#FF0000">Fin: 09/06/2022</font> </p>
                        <p class="box-card-text">Assister le pharmacien dans: - l'approvisionnement en m2dicaments; - le suivi des stocks de m2dicaments; - la gestion des stocks de medicaments et autres produits pharmaceutiques</p>
                        <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>

















<?php
require_once 'layout/footer.php';
?>
<script>




</script>