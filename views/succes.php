<?php

if(!isset($_SESSION['_valid'])){
    header('location:' .$domaine.'/caofa-2023');
    exit();
}


require_once 'layout/header.php';
?>
<section class="contact padding-120 banner-caofa">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <div class="ts-box text-center">
                    <img src="<?=$asset?>/media/sss.png" class="animate__animated animate__fadeIn w-25" alt=""/>
                    <h4 class="p-3 text-success" style="font-weight: bold;line-height: 1.5;">Félicitations <span class="" style="color: #ff4500"><?=$_SESSION['_valid']['nom']?> </span>, votre inscription a été validé  avec succès !</h4>
                    <p>Les organisateurs vont vous appeler pour la prochaine étape de la compétition.</p>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'layout/footer.php';
?>
