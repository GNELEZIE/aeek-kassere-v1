<?php



require_once 'controller/membre.inscription.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 bgimg1">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-4">
                <div class="ts-box text-center">
                    <img src="<?=$asset?>/media/sss.png" class="animate__animated animate__fadeIn w-25" alt=""/>
                    <h4 class="p-3">Votre compte à été enregistré avec succes</h4>
                    <p>Vous pouvez maintenant vous connectez en cliquant sur le bouton se connecter</p>
                    <a href="<?=$domaine?>/connexion" class="btn-orange" style="border-radius: 5px;padding: 10px 20px !important;">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'layout/footer.php';
?>
