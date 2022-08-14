<?php
if(isset($doc[1])){
    $return = $doc[0]."/".$doc[1];
}else{
    $return = $doc[0];
}
if(!isset($_SESSION['_updPwd'])){
    header('location:'.$domaine);
    exit();
}
$mailText = explode('@',html_entity_decode(stripslashes($_SESSION['_updPwd']['email'])));
$masqueMail = mb_substr($mailText[0],0,2,'UTF-8').'***@'.$mailText[1];

$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$_SESSION['myformkey'] = $token;
require_once 'layout/header.php';
?>
<section class="contact padding-120 bgimg1">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-4">
                <div class="ts-box text-center">
                    <img src="<?=$asset?>/media/infos.svg" class="w-25" alt=""/>
                    <h4 class="p-3">Modification de votre mot de passe</h4>
                    <p>Nous vous avons envoyé un email de vérification à <strong><?=$masqueMail?></strong>.</p>
                    <p>Vérifier vos spams si vous ne voyez pas le mail.</p>
                    <p>Veuillez par la suite confirmer votre modification en cliquant sur le lien "Modifier mon mot de passe".</p>
                    <p class="mt-5">je n'ai pas encore reçu le mail <a href="javascript:void(0)" class="color-orange send-link" onclick="sendMail()"> renvoyer  un nouveau mail</a></p>


                </div>
            </div>
        </div>
</section>
<?php
require_once 'layout/footer.php';
?>
<script>

    function sendMail(){
        var sendLink =  $('.send-link');
        sendLink.html('<i class="loader-btn"></i>');
        sendLink.css('pointer-events','none');
        $.ajax({
            type: 'post',
            url: '<?=$domaine?>/controle/updatePwdMail',
            success: function(data){
                if(data == 'ok'){
                    swal("Succès", "Email envoyé avec succès.", "success");
                }else{
                    swal("Oups !", "Une erreur s\'est produite, veuillez réessayer.", "error");
                }
                sendLink.css('pointer-events','auto');
                sendLink.html('renvoyer un nouveau mail');
            }
        });
    }
</script>