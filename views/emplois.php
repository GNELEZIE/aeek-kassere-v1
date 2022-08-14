<?php
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

$res = $emplois->nbEmplois();
if($nbre = $res->fetch()){
    $pages = ceil($nbre['nb']/5);
}else{
    $pages = 1;
}
$pagination_list = '';
$myPage = '/emplois';
$listeEmplois = $emplois->getEmploisActive($debut,$fin);


require_once 'layout/header.php';
?>
<section class="banner banner-blog banner-five">
    <div class="banner-overlay"></div>

    <div class="p-3 text-center position-text"><h2><span class="bg-orange px-3 mb-3 text-white"> Offres d'emploi</span></h2>
    </div>
</section>
<section class="page-header">
    <div class="container">
        <div class="content">
            <h4>Offre d'emplois</h4>
            <ul>
                <li><span><i class="fa fa-home" aria-hidden="true"></i></span> <a href="<?=$domaine?>">Acceuil</a>
                    <span>|</span></li>
                <li>Emplois</li>
            </ul>
        </div>
    </div>
</section>

<div class="container-fluid pb-5"  style="background: rgb(232 246 255 / 31%);">
    <section class="container pt-3">
        <div class="row pt-5 mt-30">
            <?php
            while($dataEmploi = $listeEmplois->fetch()){
                if($dataEmploi['type_offre'] == 1){
                    $contract = 'PAE';
                }elseif($dataEmploi['type_offre'] == 2){
                    $contract = 'CDD';
                }elseif($dataEmploi['type_offre'] == 3){
                    $contract = 'CDI';
                }elseif($dataEmploi['type_offre'] == 4){
                    $contract = 'Stage école';
                }elseif($dataEmploi['type_offre'] == 5){
                    $contract = 'CTT';
                }else{
                    $contract = 'Frulence';
                }
                ?>
                <div class="col-md-4 mb-30 pb-5" style="margin-bottom: 35px">
                    <a class="box-card h-339 p-3" href="<?=$dataEmploi['lien_detail']?>" target="_blank">
                        <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                            <img src="<?=$domaine?>/uploads/<?=$dataEmploi['logo']?>" alt="" class="head-icon offre-icon">
                        </div>
                        <div class="box-card-body text-center">
                            <h3 class="box-card-title pt-3" style="line-height: 1.3;"><?= html_entity_decode(stripslashes($dataEmploi['nom'])) ?></h3>
                            <p class="font-13 pt-2 mb-0">Publie le <?=date_fr($dataEmploi['date_debut'])?> <span>| <i class="fa fa-map"></i> </span> <?= html_entity_decode(stripslashes($dataEmploi['ville'])) ?> <span>|</span> <font color="#FF0000">Fin: <?=date_fr($dataEmploi['date_fin'])?></font> </p>
                            <p class="box-card-text"><?= html_entity_decode(stripslashes($dataEmploi['description'])) ?></p>
                            <span class=" font-weight-bold">En savoir plus&nbsp;<i class="fe-icon-arrow-right"></i></span>
                            <span class="ribban font-11"><?= $contract ?></span>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>

        </div>
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
    </section>
</div>

















<?php
require_once 'layout/footer.php';
?>
<script>




</script>