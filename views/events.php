<?php

require_once 'layout/header.php';
?>

<section class="container-fluid head-pag" style="margin-top: 75px">
    <div class="container text-center" style="padding-top: 29px;">
        <h1>La Gallerie de nos evenements</h1>
    </div>
</section>
<section class="multi-gallery-section style2 padding-120 top-home">
    <div class="container">
        <div class="row">
            <div class="section-wrapper row">
                <?php
                $listeEven= $events->getAllEvents();
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
            </div>
        </div>
    </div>
</section>


<?php
require_once 'layout/footer.php';
?>


