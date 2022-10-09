<?php
require_once 'layout/header.php';

$result = $membre->getMembreByEmail("zie.nanien@gmail.com");
if ($data = $result->fetch()) {
    $_SESSION['membreaeek'] = $data;
    echo $data['email'];
}
?>


<?php
require_once 'layout/footer.php';
?>
<section class="about about-two" style="background: rgba(232, 246, 255, 0.69)">
    <div class="container py-5">
        <div class="row">
            <?php
            if($propData = $lisPropos->fetch()){
                ?>
                <div class="col-md-6">
                    <div class="image wow slideInLeft">
                        <img src="<?=$domaine?>/uploads/<?=$propData['photo']?>" alt="about iamge" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content wow slideInRight">

                        <div class="section-header">
                            <h2 class=""> <?=html_entity_decode(stripslashes($propData['titre']))?></h2>
                            <p> <?=html_entity_decode(stripslashes($propData['sous_titre']));?></p>
                        </div>
                        <p class="text-justify"> <?=reduit_text(html_entity_decode(stripslashes($propData['description'])),'250','...');?>  </p>

                        <ul class="about-button">
                            <li><a href="<?=$domaine?>/a-propos" class="default-button btn-green-transparent" style="padding: 7px 13px !important;">En savoir plus <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
    <!-- container -->
</section>