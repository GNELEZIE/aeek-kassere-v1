<?php
if(isset($doc[1]) and !isset($doc[2]) || isset($_GET['page'])) {

    if(isset($_GET['page']) and is_numeric($_GET['page'])){
        $numPage = $_GET['page'];
        $fin = 6 * $numPage;
        $debut = $fin - 6;
    }else{
        $numPage = 1;
        $debut = 0;
        $fin = 6;
    }

    $liste = $events->getEventBySlug($doc[1]);



    if ($eventsData = $liste->fetch()) {
        $eventId =  $eventsData['id_events'];
        $res = $gallerie->nbPhotoByEvents($eventsData['id_events']);
        if($nbre = $res->fetch()){
            $pages = ceil($nbre['nb']/6);
//            echo $pages;
//            exit;
        }else{
            $pages = 1;
        }
        $pagination_list = '';
        $myPage = '/gallerie/'.$doc[1].'/';
        $liste = $gallerie->getGallerieById($eventsData['id_events'],$debut,$fin);
    } else {
        header('location:' . $domaine_admin . '/error');
        exit();
    }

}else{
    header('location:' . $domaine_admin . '/error');
    exit();
}
require_once 'layout/header.php';
?>

<section class="container-fluid head-pag" style="margin-top: 75px">
    <div class="container text-center" style="padding-top: 29px;">
        <h1><?=html_entity_decode(stripcslashes($eventsData['nom'])).' '.month_fr(date('m', strtotime($eventsData['date_events']))).','.date('Y', strtotime($eventsData['date_events']));?></h1>
    </div>
</section>
<section class="gallery gallery-two gallery-uhv padding-120">
    <div class="container">


        <div class="section-wrapper">
            <div class="gallery-items grid">
                <div class="gallery-item grid-sizer"></div>
                <?php
                while($galData = $liste->fetch()){
                    ?>


                <div class="gallery-item grid-item">
                    <div class="gallery-thumb">
                        <img src="<?=$domaine?>/uploads/<?=$galData['photo'];?>" alt="gallery image" class="img-responsive">
                        <div class="overlay"></div>
                        <a href="<?=$domaine?>/uploads/<?=$galData['photo'];?>" data-rel="lightcase:myCollection">
                            <img src="<?=$asset?>/media/galicon.png"  class="img-responsive">
                        </a>
                    </div>
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
        </div>
    </div>
</section>


<?php
require_once 'layout/footer.php';
?>


