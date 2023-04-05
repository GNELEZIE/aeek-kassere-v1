<?php
$dateGmt = gmdate('Y-m-d H:i');
$date1 = str_replace('-', '/', $dateGmt);
$tomorrow = date('d-m-Y',strtotime($date1 . "+5 days"));
if(!isset($_SESSION['_valid'])){
    header('location:' .$domaine.'/sortie-detente-2023');
}
if($_SESSION['_valid']['type'] == 'Oui'){
  $txt = 'Vous devrez payer votre tee-shirt(<span class="text-danger">1 500f</span>)';
}else{
    $txt = 'Vous devrez payer votre droit de participation et votre tee-shirt(<span class="text-danger">3 000f</span>)';
}

require_once 'controller/reunion.inscription.php';

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 banner-sortie">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="ts-box wow bounceInUp center">
                   <div class="text-center">
                       <img src="<?=$asset?>/media/sss.png" class="animate__animated animate__fadeIn w-25" alt=""/>
                   </div>
                    <h1 class="text-center font-22 text-success" style="font-weight: bold;line-height: 1.5;">Sortie détente AEEK 2023</h1>
                    <h1 class="text-center font-22 text-success" style="font-weight: bold;line-height: 1.5;">Inscription effectuée  avec succès !</h1>
                    <h3 class="font-15 py-2" style="line-height: 1.5">Nb : <?=$txt?> avant le <span class="text-danger"><b><?=$tomorrow?></b></span> sinon votre inscription sera automatiquement annulée !</h3>
                    <h3 class="text-center font-17 py-2">Infoline : 07 07 61 45 61</h3>
                </div>
            </div>
        </div>
</section>
<?php
require_once 'layout/footer.php';
?>
