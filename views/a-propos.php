<?php
$lisPropos = $propos->getAllpropos();
require_once 'layout/header.php';
?>

<section class="container-fluid head-pag" style="margin-top: 75px">
    <div class="container text-center" style="padding-top: 29px;">
        <h1>A propos</h1>
    </div>
</section>
<section class="about about-two">
    <div class="container">
        <div class="row pt-5 pb-5">
            <?php
            if($propData = $lisPropos->fetch()){
            ?>
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="image">
                    <img src="<?=$domaine?>/uploads/<?=$propData['photo']?>" alt="about iamge" class="img-responsive">
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-xs-12">
                <div class="content about-padding">
                    <div class="section-header">
                        <h2><?=html_entity_decode(stripslashes($propData['titre']))?></h2>
                        <p><em><?=html_entity_decode(stripslashes($propData['sous_titre']));?></em></p>
                    </div>
                    <p>
                        <?=html_entity_decode(stripslashes($propData['description']))?>
                    </p>
<!--                    <ul class="about-button">-->
<!--                        <li><a href="#" class="default-button">read more</a></li>-->
<!--                        <li><a href="#" class="default-button">buy ticket</a></li>-->
<!--                    </ul>-->
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>
    <!-- container -->
</section>



<?php
require_once 'layout/footer.php';
?>


