<?php

if(!isset($_SESSION['_valid'])){
    header('location:' .$domaine.'/error');
}


require_once 'layout/header.php';
?>
<section class="contact padding-120 banner-sortie">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="ts-box wow bounceInUp center">
                   <div class="text-center">
                       <img src="<?=$asset?>/media/times.svg" class="animate__animated animate__fadeIn w-25" alt=""/>
                   </div>
                    <h1 class="text-center font-22 text-success" style="font-weight: bold;line-height: 1.5;">Sortie détente AEEK 2025</h1>
                    <h1 class="text-center font-22 text-success" style="font-weight: bold;line-height: 1.5;">Inscription annulé  avec succès !</h1>
                    <a href="<?=$domaine?>/sortie-detente-2025">Cliquez ici pour vous inscrire à nouveau</a>
                    <h3 class="text-center font-17 py-2">Infoline : 07 07 61 45 61</h3>
                </div>
            </div>
        </div>
</section>
<?php
require_once 'layout/footer.php';
?>
